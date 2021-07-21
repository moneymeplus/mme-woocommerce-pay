<?php 
require_once("MMECore.php");

class MMECustomer extends MMECore
{
    /**
     * @params array client_id and client_secret
     * 
     */
    public function __construct($config = [])
    {
        self::$USERNAME = $config['mme_username'];
        self::$PWD = $config['mme_password'];
        self::isAuthorized();
    }
    /**
     * Login using the
     */
    public function login($post){
        $arr = ['Username' => stripslashes($post['username']), 'Password' => stripslashes($post['password']), 'BrandId' => 0];
        return self::__authorize($arr);
    }

    public function createAccount($post){
        $header[] = "Content-Type: application/json";
        $content = json_encode(['TitleTypeId' => $post["mme_billing_title"], 'FirstName' => $post["mme_billing_first_name"], 'LastName' => $post["mme_billing_last_name"], 'MobileNumber' => $post["mme_billing_phone"], 'CheckoutUrl' => $post['checkout_url'], "CheckoutDescription" => $post["CheckoutDescription"], "CheckoutAmount" => $post["CheckoutAmount"], "EmailAddress"=> $post["mme_billing_email"]]);
        return self::call(self::$SERVICE_URL.'/api/MmePlusEcommerceAccount/SignUp', $header, 'post', $content, true);
     }

    /**
     * @param 
     * @return
     */
    public function requestPayment($post, $customer = false){
        global $woocommerce;
        $total = $woocommerce->cart->total;
        $header[] = "Content-Type: application/json";
        $query = http_build_query($post);
        if($customer){
            //$header[] = "Authorization: Bearer {$customer->AccessToken}";  
            $content = json_encode(['Amount' => $total, 'ApplicationId' => $customer->ApplicationId, 'MerchantId' => $customer->MerchantId, 'CustomerId' => $customer->CustomerId]);
        }
        $response = self::call(self::$SERVICE_URL.'/api/MmePlusEcommercePay/GetMmePlusRepayment', $header, 'post', $content, true);
        if($response->RepaymentSchedule){
            return (array) $response->RepaymentSchedule;
        }else{
            return ['status' => 'failed', 'message' => $response->Message];
        }
    }

    public function processPayment($post, $customer = false){
        $header[] = "Content-Type: application/json";
        $query = json_encode($post);

        if($customer){
            $header[] = "Authorization: Bearer {$customer->AccessToken}"; 
            $content = json_encode(['RequestedAmount' => $post['amount'], 'ApplicationId' => $customer->ApplicationId, 'MerchantId' => $customer->MerchantId, 'CheckoutDescription' => $customer->CheckoutDescription, 'CheckoutUrl' => $customer->CheckoutUrl]); 
        }
        $response = self::call(self::$SERVICE_URL.'/api/MmePlusEcommercePay/CreateMMEPlusTransaction', $header, 'post', $content);
        return $response;
    }

    public function sendForgotPinEmail($post){
        $header[] = "Content-Type: application/json";
        $content = json_encode(['BrandId' => 1, 'Username' => $post['email']]);
        return self::call(self::$SERVICE_URL.'/api/Pin/SendForgotPasscodeEmail', $header, 'post', $content);
    }

    public function checkAccountExists($post){
        $header[] = "Content-Type: application/json";
        $content = json_encode(['LastName' => $post['mme_billing_last_name'], 'MobileNumber' => $post['mme_billing_phone'], 'EmailAddress' => $post['mme_billing_email']]);
        
        return self::call(self::$SERVICE_URL.'/api/MmePlusEcommerceAccount/CheckAccountExists', $header, 'post', $content, true);
    }

    public function verifyForgotPasswordCode($post){
        $header[] = "Content-Type: application/json";
        $content = json_encode(['BrandId' => 1, 'VerificationCode' => $post['code'], 'CustomerId' => $post['customer_id'], 'PushServiceId' => 1]);
        return self::call(self::$SERVICE_URL.'/api/Pin/VerifyCodeAndResetPin', $header, 'post', $content);
    }

    public function changePasswordCode($post, $token){
        $header[] = "Content-Type: application/json";
        $header[] = "Authorization: Bearer {$token}";
        $content = json_encode(['BrandId' => 1, 'CustomerId' => $post['customer_id'], 'NewPin' => $post['new_pin'], 'ConfirmNewPin' => $post['confirm_pin']]);
        return self::call(self::$SERVICE_URL.'/api/Pin/ForgotPasswordChangePin', $header, 'post', $content);
    }
    
}