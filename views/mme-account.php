<div class="modal-dialog" role="document">
    <div class="modal-content modal-content-inner">
        <div class="modal-header">
            <h5 class="modal-title" id=""></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="mme-customer-id" value="<?php echo $customer->CustomerId;?>" />
            <div class="checkout-header user-account-header">
                <div class="mme-logo-wrap">
                    <img src="<?php echo esc_url($img.'/mme_logo.svg');?>" />
                </div>
                <div class="info-wrap">
                    <span class="name">Welcome <?php echo esc_attr($customer->CustomerFirstName) ?></span>
                </div>
            </div>

            <?php if(!$customer->IsEligible):?>
                <?php if($customer->MmePlusLoginStatusId == 3): ?>
                    <div class="user-account-alert user-account-overdue">
                        <img class="warning" src="<?php echo esc_url($img.'/icon-warning.png');?>" /> Your account is overdue
                    </div>
                <?php elseif($customer->MmePlusLoginStatusId == 4): ?>
                    <div class="user-account-alert user-account-credit user-account-payment-plan">
                        <img class="warning" src="<?php echo esc_url($img.'/icon-warning.png');?>" alt="Warning Icon" /> Your account is overdue
                    </div>
                <?php else:?>
                    <div class="user-account-alert user-account-credit">
                        <div class="label">
                            <svg style="width:15px;position:relative;right:5px;" id="a7e9d8d6-d21d-4a47-a7a9-80113582f586" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18.01 13.51">
                                <defs>
                                    <style>
                                        .b5ce5212-a0e6-42d6-a6f3-7c2ecbd011e8 {
                                            fill: none;
                                            stroke: #fff;
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                            stroke-width: 1.5px;
                                        }
                                    </style>
                                </defs>
                                <g id="eee341fc-c345-4cbe-8165-e190295b64a1" data-name="Icon feather-credit-card">
                                    <path id="b3221a08-8454-499c-9ab2-6bb071e3e7fe" data-name="Path 30265" class="b5ce5212-a0e6-42d6-a6f3-7c2ecbd011e8" d="M676.23,377.94h13.51a1.5,1.5,0,0,1,1.5,1.5v9a1.5,1.5,0,0,1-1.5,1.5H676.23a1.5,1.5,0,0,1-1.5-1.5v-9A1.5,1.5,0,0,1,676.23,377.94Z" transform="translate(-673.98 -377.19)"></path>
                                    <path id="a318eb8e-b88e-43ff-a3a3-1c6da1e5408c" data-name="Path 30266" class="b5ce5212-a0e6-42d6-a6f3-7c2ecbd011e8" d="M674.73,382.44h16.51" transform="translate(-673.98 -377.19)"></path>
                                </g>
                            </svg>
                            Available credit
                        </div>
                        <div class="amount">
                            <?php 
                            $credit = explode('.', $customer->RemainingCreditDisplayText); 
                            echo esc_attr($credit[0]);
                            ?>
                            <span class="mme-credit-decimal">.<?php $value = isset($credit[1]) ? $credit[1] : "00"; echo esc_attr($value);?></span>
                        </div>
                    </div>    
                <?php endif;?>    
            <?php endif;
                $items = $woocommerce->cart->get_cart(); 
            ?>
            <div class="checkout-wrap account-purchase-wrap account-overdue">  
                <div class="row modal-form purchase-form">
                    <div class="col-md-6 col-sm-6 col-6">
                        <p><strong><?php echo esc_attr($payment['MerchantName']); ?></strong></p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 text-right">
                        <p><strong>Total: </strong><span class="mme-whole-amt">$<?php
                        $amt_format = number_format($payment['PurchaseAmount'], 2, '.', ',');
                        $amt = explode('.', $amt_format); 
                        echo esc_attr($amt[0]);
                        ?></span><span class="decimal mme-whole-amt">.<?php echo isset($amt[1]) ? esc_attr($amt[1]) : "00";?></span></p>
                    </div>
                </div>
                <hr class="divider">  
                <div class="row modal-form purchase-form mme-cart-item">
                    <?php foreach($items as $item => $values):
                    $_product =  wc_get_product( $values['data']->get_id()); 
                    $variation = count($values['variation'])>0 ? " - ".implode(", ",$values['variation']) : "";
                    $price =  $values['data']->get_price();
                    $full_title = $_product->get_title().$variation;
                    $title = strlen($full_title) > 57 ? substr($full_title,0, 57).'...' : $full_title;
                    ?>
                    <div class="col-md-7 col-sm-4 col-4">
                        <p class="mb-0 mme-item" <?php echo count($values['variation'])>0 ? "title='".esc_attr($full_title)."'" : "";?>><?php echo esc_attr($title).'<span class="mme-qty"> x'.esc_attr($values['quantity']).'</span>';?></p>
                    </div>
                    <div class="col-md-5 col-sm-8 col-8 text-right">
                        <p class="mb-0">$<?php echo esc_attr(number_format($price, 2, '.', ','));?></p>
                    </div>
                    <?php endforeach;?>
                </div> 
                <div class="row modal-form purchase-form"> 
                    <div class="col-md-12 col-sm-12 col-12 text-center">
                        <p class="mb-0 mme-interest-wrap"><img src="<?php echo esc_url($img.'/fire_icon.png');?>" alt="" /><?php echo esc_attr($payment['InterestFreePeriod']); ?> interest free on this purchase</p>
                    </div>
                </div>
                <div class="row modal-form purchase-form">     
                    <div class="col-md-12 text-center">
                        <small>Minimum monthly repayment of $<?php echo esc_attr(number_format($payment['MinimumMonthlyRepayments'], 2, '.', ',')); ?> for this purchase which includes an admin fee of $<?php echo esc_attr(number_format($payment['AdminFee'], 2, '.', ','));?></small>
                    </div>
                </div>

                <?php if($customer->MmePlusLoginStatusId != 1):?>
                    <?php if($customer->MmePlusLoginStatusId == 3 || $customer->MmePlusLoginStatusId == 4): ?>
                        <div class="text-center button-wrap pb-4 pt-4">
                            <button class="btn button-default semi-bold btn-block btn-disabled" type="button">
                                Cannot complete purchase
                            </button>
                        </div>
                    <?php elseif($customer->MmePlusLoginStatusId == 2): ?>
                        <div class="text-center button-wrap pb-4 pt-4">
                            <button class="btn button-default semi-bold btn-block btn-disabled" type="button">
                                You have insufficient funds
                            </button>
                        </div>
                    <?php else:?>
                        <div class="text-center button-wrap pb-4 pt-4">
                            <button disabled class="mme-noneligible-btn btn button-default semi-bold btn-block" type="button">
                                Cannot complete purchase
                            </button>
                        </div>
                        <div class="text-center">
                            <small class="text-danger"><?php echo esc_attr($eligible->NonEligiblityCause); ?></small>
                        </div>    
                    <?php endif;?>
                <?php else:
                    if($customer->Eligibility->SlidingLimit < $payment['PurchaseAmount']): ?>
                    <div class="text-center button-wrap pb-4 pt-4">
                            <button disabled class="mme-noneligible-btn btn button-default semi-bold btn-block" type="button">
                                You have insufficient funds
                            </button>
                        </div>
                    <?php else:?>
                    <div class="text-center button-wrap pt-4 pb-4">
                        <input type="hidden" name="mme-ok" value="1" id="mme-ok" />
                        <input type="hidden" name="mme_cart_added"  id="mme-cart-added" />
                        <input type="hidden" name="_mme_token" value="<?php echo esc_attr($customer->AccessToken);?>" id="mme-token" />
                        <input type="hidden" name="_mme_merchant_id" value="<?php echo esc_attr($customer->MerchantId);?>" />
                        <input type="hidden" name="_mme_application_id" value="<?php echo esc_attr($customer->ApplicationId);?>" />
                        <button class="btn button-default btn-green semi-bold btn-block confirm-purchase" type="button" id="mme-btn-confirm">
                            <strong>Confirm Purchase </strong>
                            <svg class="cnfm-default-icon" style="width: 13px;" id="ee1a273b-8129-466d-8ea7-56abc9dac8fc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.28 13.92">
                                <defs>
                                    <style>
                                        .aaf32895-5a89-4ae5-913b-673ab52e29e4 {
                                            fill: #000;
                                        }
                                    </style>
                                </defs>
                                <path id="a6e5a97d-b111-480f-92b7-6e08e755b3f3" data-name="Icon awesome-arrow-right" class="aaf32895-5a89-4ae5-913b-673ab52e29e4" d="M681.88,377.91l.71-.7a.76.76,0,0,1,1.07,0h0l6.2,6.19a.77.77,0,0,1,0,1.08h0l-6.2,6.2a.76.76,0,0,1-1.08,0h0l-.71-.71a.76.76,0,0,1,0-1.08h0l3.84-3.66h-9.16a.76.76,0,0,1-.76-.76h0v-1a.76.76,0,0,1,.76-.77h9.16L681.89,379a.77.77,0,0,1,0-1.08Z" transform="translate(-675.81 -376.98)"></path>
                            </svg>
                            <img src="<?php echo esc_url($img.'/new-spinner-light.svg')?>" class="cnfm-spinner-icon"/>
                        </button>
                    </div>
                    <?php endif;?>
                <?php endif;?>
                <input type="hidden" name="mme_checkout_url" id="mme_checkout_url" />
            </div>
        
        </div>
    </div>    
</div>    