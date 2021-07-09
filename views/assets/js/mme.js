jQuery( 'body' ).on( 'updated_checkout', ()=> {
var mme_ep = jQuery("#mme-endpoint").val();
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
jQuery(document).on("keydown", (e)=>{
    if(e.keyCode == "13"){
        if(jQuery('.modal').hasClass("show")) e.preventDefault();
    }
});
/* Signup Customer Account */
jQuery("#mme-btn-submit").click(function(){
    let fields = {};
    let err = 0;
    var regexp =new RegExp("^[A-Za-z-\\s]+$");
    var number_only = new RegExp("^[0-9]+$");

    jQuery(".mme-err-status").html("");
    jQuery(".woocommerce-billing-fields input, .woocommerce-billing-fields select").each((i, r)=>{
        var id = jQuery(r).attr("id");
        fields[id] = jQuery(r).val();
    });
    jQuery("#mme-signup-container input, #mme-signup-container select").each((i, r)=>{
        var id = jQuery(r).attr("id");
        var name = jQuery(r).attr("placeholder");
        var value = jQuery(r).val();
        if(value == ""){
            err ++;
            jQuery("#"+id+" ~ .mme-err-status").text("Please enter valid "+name).removeClass("hidden");
        }
        if(id == "mme_billing_first_name" || id == "mme_billing_last_name"){
            if(!regexp.test(value) || value.length < 2 || value.length > 50){
                err ++;
                jQuery("#"+id+" ~ .mme-err-status").text("Please enter 2-50 characters. Letters, spaces and hyphens permitted").removeClass("hidden");
            }
        }
        if(id == "mme_billing_email"){
            if(!validateEmail(value)){
                err ++;
                jQuery("#"+id+" ~ .mme-err-status").text("Please enter a valid email address").removeClass("hidden");
            }
        }
        if(id == "mme_billing_phone"){
            if(!number_only.test(value) || !value.startsWith("04") || value.length != 10){
                err ++;
                jQuery("#"+id+" ~ .mme-err-status").text("Please enter valid mobile phone number starting with 04").removeClass("hidden");
            }
        }
        fields[id] = jQuery(r).val();
        
    });
    fields['checkout_url'] = window.location.href;
    jQuery("#signup-status").html("");
    if(err > 0){
        //jQuery("#signup-status").html("All fields are required. Please check.");
        return false;
    }
    jQuery.ajax({ // you can also use $.post here
        url : mme_ep+"?action=signup_mme_customer", // AJAX handler
        data : fields,
        type : 'POST',
        beforeSend : function ( xhr ) {
           jQuery("#user-sms").modal("toggle");
           jQuery("#sms-content-continue").hide();
           jQuery("#sms-content-loading").show();
           jQuery("#mme-signup-container").modal("toggle");
           jQuery("#mme-seconds").text(3);
        },
        complete: ()=>{
        },
        success : function( data ){
            if(data.status == "ok"){
                var ctr = 3;
                var countdown = setInterval(()=>{
                    
                    if(ctr <= 0){
                        jQuery("#sms-content-loading").hide();
                        jQuery("#sms-content-continue").show();
                        jQuery("#mme_continue_link").attr("href", data.continueUrl);
                        clearInterval(countdown);
                    }
                    jQuery("#mme-seconds").text(ctr);
                    ctr --;
                }, 1000);
               window.open(data.continueUrl);
            }else if(data.status == "exists"){
                jQuery("#user-sms").modal("toggle");
                jQuery("#mme-signup-container").modal("toggle");
                jQuery(".mme-existing-account").show();
                jQuery(".mme-have-account").hide();
                jQuery("#mme-btn-submit").addClass("mme-btn-disabled").prop( "disabled", true );
            } else{
                jQuery("#user-sms").modal("toggle");
                jQuery("#mme-signup-container").modal("toggle");
                jQuery("#signup-status").html(data.message);
                jQuery(".mme-existing-account").hide();
                jQuery(".mme-have-account").show();
            }
        }
    });
    return false;
});
jQuery("#mme-btn-signup-select").on("click", ()=>{
    jQuery(".mme-existing-account").hide();
    jQuery(".mme-have-account").show();
    jQuery("#mme-btn-submit").removeClass("mme-btn-disabled").prop( "disabled", false );
});

/* Select Pin*/
jQuery(".mme-input, .mme-input-temp, .mme-input-new, .mme-input-conf").on("focus", (e)=>{
    jQuery(e.currentTarget).select();
});

/* Login Method */
jQuery(".mme-input").on("keyup", (e)=> {

    //dedicated to login
    if(jQuery(e.currentTarget).parents("#mme-login-container").length > 0){
        let password = '';
        let old_pass = jQuery(e.currentTarget).val();
        let err = 0;
        jQuery(e.currentTarget).data("pass", old_pass);
        if(e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 9) return false;
        let i = jQuery(e.currentTarget).data("pin") + 1;
        jQuery(".mme-input[data-pin="+i+"]").focus();
        jQuery(e.currentTarget).val('*');
        if(i == 5){
            jQuery("#mme-login-container .mme-input").each((i, r) => {
                if(jQuery(r).data("pass") !== undefined){
                    if(jQuery(r).data("pass").trim() == "") {
                        err++;
                    }
                    password += jQuery(r).data("pass").trim();
                }else{
                    err++;
                }
                
            })
            if(err){
                return false;
            }
            let username = jQuery('#mme-username').val();
            if(!validateEmail(username)){
                jQuery("#status").html("Please enter a valid email address.");
                return false;
            }
            if(username == "" || password == ""){
                jQuery("#status").html("Username and password is required.");
                return false;
            }
            jQuery.ajax({ // you can also use $.post here
                url : mme_ep, // AJAX handler
                data : {'action': 'login_mme_customer', 'username': username, 'password': password},
                type : 'POST',
                beforeSend : function ( xhr ) {
                    jQuery(".mme-login-loading").show();
                },
                complete: ()=>{
                    jQuery(".mme-login-loading").hide();
                },
                success : function( data ){
                    if(data.error){
                        if(data.error_id == 6){
                            jQuery("#mme-username").val("");
                            jQuery(".mme-input").val("");
                            jQuery("#mme-username").focus();
                            jQuery(".for-remember-wrap").hide();
                            jQuery(".mme-existing-client").show();
                            jQuery(".mme-existing-client .mme-message").html(data.error);
                            jQuery("#mme-btn-signup-select-validate .txt_label").html("View application progress").attr("data-target", "#mme-login-container").on("click", ()=>{
                                    if(data.testmode){
                                        window.open("https://qa-www.moneyme.net/eca/eca-landing");
                                    }else{
                                        window.open("https://www.moneyme.com.au/eca/eca-landing");
                                    }
                            });
                        }else if(data.error_id == 5){
                            jQuery("#mme-username").val("");
                            jQuery(".mme-input").val("");
                            jQuery("#mme-username").focus();
                            jQuery(".for-remember-wrap").hide();
                            jQuery(".mme-existing-client").show();
                            jQuery(".mme-existing-client .mme-message").html(data.error);
                            jQuery("#mme-btn-signup-select-validate .txt_label").html("Sign up now").attr("data-target", "#mme-signup-container");
                        }else{
                            jQuery(".mme-input").val("");
                            jQuery(".mme-input:eq(0)").focus();
                            jQuery("#status").html(data.error);
                        }
                        jQuery("#mme-btn-login").html('Login');
                    }else{
                        jQuery("#mme-login-container").modal("toggle");
                        jQuery("#mme-account-modal").html(data).modal("toggle");
                        if(jQuery("#mme-cart-added-temp").length > 0){
                            jQuery("#mme-cart-added").val(jQuery("#mme-cart-added-temp").val());
                        }
                        /* Set Method for Repayment Redirection or other Login Status */
                        if(jQuery("#mme-btn-confirm")){
                            jQuery("#mme-btn-confirm").on("click", ()=> {
                                    jQuery("#mme_checkout_url").val(window.location.href);
                                    jQuery(".woocommerce-error").remove();
                                    let ctr = 3;
                                    jQuery(".cnfm-default-icon").show();
                                    jQuery(".entry-content img.cnfm-spinner-icon").hide();
                                    jQuery("#app-payment-success").modal("toggle");
                                    jQuery("#mme-account-modal").modal("toggle");
                                    let s = setInterval(()=>{
                                        ctr --;
                                        jQuery("#mme-seconds").text(ctr);
                                        if(ctr === 1){
                                            clearInterval(s);
                                            jQuery(".entry-content img.cnfm-spinner-icon").hide();
                                            jQuery(".woocommerce-checkout").trigger("submit");
                                            var err = setInterval(()=>{
                                                if(jQuery(".woocommerce-error").length > 0){
                                                    clearInterval(err);
                                                    var woo_error = jQuery(".woocommerce-error li").text().trim();
                                                    if(woo_error == 'Authorization has been denied for this request.'){
                                                        jQuery("#status").text('Oops, something went wrong. Please login again');
                                                    }else{
                                                        jQuery("#status").text('Something went wrong. Please login again');
                                                    }
                                                    jQuery(".mme-pin input").val("");
                                                    jQuery("#app-payment-success").modal("toggle");
                                                    //jQuery("#mme-account-modal").modal("toggle");
                                                    jQuery("#mme-login-container").modal("toggle");
                                                    jQuery("#mme-seconds").text('3');
                                                    //jQuery(".woocommerce-error").append("<li>Something went wrong. Please check the checkout info and try again.</li>");
                                                }
                                            }, 1000);
                                        }
                                    }, 1000);
                            });
                        }
                    }
                }
            });
        }
    }

});

function confirmRedraw(){
    jQuery("#mme_checkout_url").val(window.location.href);
    jQuery(".woocommerce-error").remove();
    let ctr = 3;
    jQuery(".cnfm-default-icon").show();
    jQuery(".entry-content img.cnfm-spinner-icon").hide();
    jQuery("#app-payment-success").modal("toggle");
    jQuery("#mme-account-modal").modal("toggle");
    let s = setInterval(()=>{
        ctr --;
        jQuery("#mme-seconds").text(ctr);
        if(ctr === 1){
            clearInterval(s);
            jQuery(".entry-content img.cnfm-spinner-icon").hide();
            jQuery(".woocommerce-checkout").trigger("submit");
            var err = setInterval(()=>{
                if(jQuery(".woocommerce-error").length > 0){
                    clearInterval(err);
                    var woo_error = jQuery(".woocommerce-error li").text().trim();
                    if(woo_error == 'Authorization has been denied for this request.'){
                        jQuery("#status").text('Oops, something went wrong. Please login again');
                    }else{
                        jQuery("#status").text('Something went wrong. Please login again');
                    }
                    jQuery(".mme-pin input").val("");
                    jQuery("#app-payment-success").modal("toggle");
                    //jQuery("#mme-account-modal").modal("toggle");
                    jQuery("#mme-login-container").modal("toggle");
                    jQuery("#mme-seconds").text('3');
                    //jQuery(".woocommerce-error").append("<li>Something went wrong. Please check the checkout info and try again.</li>");
                }
            }, 1000);
            
        }
    }, 1000);
}
jQuery("#btn-mme-recover").on("click", ()=>{
    var username = jQuery("#mme-forgot-username").val();
    if(username == ""){
        jQuery("#forgot-request-status").html("Please enter a valid email address.");
        return false;
    }
    if(!validateEmail(username)){
        jQuery("#forgot-request-status").html("Please enter a valid email address.");
        return false;
    }
    jQuery("#forgot-request-status").html("");
    jQuery.ajax({ // you can also use $.post here
        url : mme_ep, // AJAX handler
        data : {'action': 'request_forgot_pin', 'email': username},
        type : 'POST',
        beforeSend : function ( xhr ) {
            jQuery(".mme-login-loading").show();
        },
        complete: ()=>{
            jQuery(".mme-login-loading").hide();
        },
        success : function( data ){
           if(data.status == "ok"){
               //check also if customer_id = 0
               if(data.customer_id == "0"){
                    jQuery("#forgot-request-status").html("Please enter an existing MoneyMe+ account.");
               }else{
                    jQuery("#mme-temp-customer").val(data.customer_id);
                    jQuery("#mme-forgot-container").modal("toggle");
                    jQuery("#mme-set-pass-container").modal("toggle");
                    jQuery(".mme-input-temp:eq(0)").focus();

                    jQuery(".inputPin").val("");
                    jQuery("#temp-pass-box").show();
                    jQuery("#new-pass-box").hide();
                    jQuery("#confirm-pass-box").hide();
                }
           }else{
                jQuery("#forgot-request-status").html(data.message);
           }
        }
    });
});
jQuery("#mme-resend-email").on("click", ()=>{
    var username = jQuery("#mme-forgot-username").val();
    jQuery.ajax({ // you can also use $.post here
        url : mme_ep, // AJAX handler
        data : {'action': 'request_forgot_pin', 'email': username},
        type : 'POST',
        beforeSend : function ( xhr ) {
            jQuery(".mme-login-loading").show();
        },
        complete: ()=>{
            jQuery(".mme-login-loading").hide();
        },
        success : function( data ){
           if(data.status == "ok"){
               //check also if customer_id = 0
               if(data.customer_id == "0"){
                    jQuery("#mme-temp-status").html("Please enter an existing MoneyMe+ account.");
               }else{
                    jQuery("#mme-temp-customer").val(data.customer_id);
                    jQuery("#mme-temp-status").html("<span style='color: blue;'>Resend confirmation emailed to <strong>"+username+"</strong>.</span>");
                    jQuery(".mme-input-temp:eq(0)").focus();
                }
           }else{
                jQuery("#mme-temp-status").html(data.message);
           }
        }
    });
});
jQuery(".mme-input-temp").on("keyup", (e)=> {
    if(e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 9) return false;
        let i = jQuery(e.currentTarget).data("pin") + 1;
        jQuery(".mme-input-temp[data-pin="+i+"]").focus();
        let password = '';
        let old_pass = jQuery(e.currentTarget).val();
        var customer_id = jQuery("#mme-temp-customer").val();
        jQuery(e.currentTarget).data("pass", old_pass);
        jQuery(e.currentTarget).val('*');
        if(i == 5){
            jQuery(".mme-input-temp").each((i, r) => {
                password += jQuery(r).data("pass").trim();
            })
            jQuery("#mme-temp-status").html("");
            jQuery.ajax({ // you can also use $.post here
                url : mme_ep, // AJAX handler
                data : {'action': 'verify_forgot_pin', 'code': password, 'customer_id': customer_id},
                type : 'POST',
                beforeSend : function ( xhr ) {
                    jQuery(".mme-login-loading").show();
                },
                complete: ()=>{
                    jQuery(".mme-login-loading").hide();
                },
                success : function( data ){

                    if(data.status == "error"){
                        jQuery("#mme-temp-status").html(data.message);
                        jQuery(".mme-input-new:eq(0)").focus();
                    }else{
                        jQuery("#mme-access-token").val(data.access_token);
                        jQuery("#temp-pass-box").hide();
                        jQuery("#new-pass-box").show();
                        jQuery(".mme-input-new:eq(0)").focus();
                    }
                }
            });

        }
});
jQuery(".mme-input-new").on("keyup", (e)=> {
    if(e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 9) return false;
        let i = jQuery(e.currentTarget).data("pin") + 1;
        jQuery(".mme-input-new[data-pin="+i+"]").focus();
        let password = '';
        let old_pass = jQuery(e.currentTarget).val();
        jQuery(e.currentTarget).data("pass", old_pass);
        jQuery(e.currentTarget).val('*');
        if(i == 5){
            jQuery(".mme-input-new").each((i, r) => {
                password += jQuery(r).data("pass").trim();
            })
            jQuery("#confirm-pass-box").show();
            jQuery("#new-pass-box").hide();  
            jQuery("#mme-new-password ").val(password);   
            jQuery(".mme-input-conf:eq(0)").focus();
        }
});
jQuery("#mme-btn-back").on("click", () => {
    jQuery(".mme-err-status").html("");
    jQuery("#confirm-pass-box").hide();
    jQuery("#new-pass-box").show();
    jQuery(".mme-input-new:eq(0)").focus();
});
jQuery(".mme-input-conf").on("keyup", (e)=> {
    if(e.keyCode == 8 || e.keyCode == 46 || e.keyCode == 9) return false;
        let i = jQuery(e.currentTarget).data("pin") + 1;
        jQuery(".mme-input-conf[data-pin="+i+"]").focus();
        let password = '';
        let old_pass = jQuery(e.currentTarget).val();
        var access_token = jQuery("#mme-access-token").val();
        var customer_id = jQuery("#mme-temp-customer").val();
        var new_pin = jQuery("#mme-new-password").val();
        var username = jQuery("#mme-forgot-username").val();
        jQuery(e.currentTarget).data("pass", old_pass);
        jQuery(e.currentTarget).val('*');
        if(i == 5){
            jQuery(".mme-input-conf").each((i, r) => {
                password += jQuery(r).data("pass").trim();
            })

            if(password !== new_pin){
                jQuery("#mme-confirm-status").html("Passcode did not match.");
                return false;
            }
            jQuery("#mme-confirm-status").html("");
            jQuery.ajax({ // you can also use $.post here
                url : mme_ep, // AJAX handler
                data : {'action': 'change_passcode', 'access_token': access_token, 'customer_id': customer_id, 'new_pin': new_pin, 'confirm_pin': password},
                type : 'POST',
                beforeSend : function ( xhr ) {
                    jQuery(".mme-login-loading").show();
                },
                complete: ()=>{
                    jQuery(".mme-login-loading").hide();
                },
                success : function( data ){
                    if(data.status == "error"){
                        jQuery("#mme-confirm-status").html(data.message);
                    }else{
                        jQuery("#mme-set-pass-container").modal("toggle");
                        jQuery("#mme-passcode-updated").modal("toggle");
                        //do login
                        jQuery.ajax({ // you can also use $.post here
                            url : mme_ep, // AJAX handler
                            data : {'action': 'login_mme_customer', 'username': username, 'password': password},
                            type : 'POST',
                            success : function( data ){
                                if(data.error){
                                    jQuery("#status").html(data.error);
                                    jQuery("#mme-btn-login").html('Login');
                                }else{
                                    jQuery("#mme-passcode-updated").modal("toggle"); //passcode updated
                                    jQuery("#mme-account-modal").html(data).modal("toggle");
                                    if(jQuery("#mme-btn-confirm")){
                                        jQuery("#mme-btn-confirm").on("click", confirmRedraw);
                                    }
                                }
                            }
                        });
                    }
                }
            });
           
        }
});

jQuery('#mme-login-container').on('shown.bs.modal', function (e) {
    jQuery("#mme-username").val('');
    if(jQuery("#mme-username").val().trim() != ""){
        setTimeout(()=>{
        jQuery(".mme-input:eq(0)").focus();
        }, 500)
    }else{
        setTimeout(()=>{
            jQuery("#mme-username").focus();
        }, 500)
    }
})
jQuery('#mme-forgot-container').on('shown.bs.modal', function (e) {
    jQuery("#mme-forgot-username").focus().val("");
})
/* Open Modal */
jQuery('.modal ').on('shown.bs.modal', function (e) {
    if(jQuery("#status").html() != "Oops, something went wrong. Please login again") {
        jQuery(".mme-err-status").html("");
    }
    jQuery("body").addClass("modal-open");

    jQuery(".for-remember-wrap").show();
    jQuery(".mme-existing-client").hide();
})


    var urlParams = new URLSearchParams(window.location.search);
    var mme_redirect = urlParams.get('mme_redirect_data');
    if(mme_redirect){
        var customer = JSON.parse(atob(mme_redirect));
        for (var key in customer) {
            jQuery(`#${key}`).val(customer[key]);
        }
        jQuery('input:radio[name=payment_method]').filter('[value="mme_gateway"]').prop('checked', true);
        jQuery('#mme-login-container').modal("toggle");
    }
    


    //mus specific code
    jQuery('.modal').on('shown.bs.modal', function (e) {
        jQuery('.content').css('z-index', '120');
        jQuery('.title').css('z-index', '90'); //101
    });

    jQuery('.modal').on('hidden.bs.modal', function (e) {
        jQuery('.content').css('z-index', '100');
        jQuery('.title').css('z-index', '101'); //101
    });

    jQuery("[data-target=#mme-signup-container]").on("click", ()=> {
        jQuery("#mme-signup-container").modal('toggle');
    });
    jQuery("[data-target=#mme-login-container]").on("click", ()=> {
        jQuery("#mme-login-container").modal('show');
    });
    jQuery("[data-target=#mme-forgot-container]").on("click", ()=> {
        jQuery("#mme-forgot-container").modal('toggle');
    });
    jQuery( 'body' ).on( 'validate', ()=> {
        let payment_gateway = jQuery("#payment_method_mme_gateway").val();
        if(payment_gateway == "mme_gateway"){
            if(jQuery("#mme-proceed-pay").length > 0){
                let fields = {};
                let err = 0;
                jQuery(".validate-required input").each((i, r)=>{
                    if(jQuery(r).attr("type") != "password"){
                        if(jQuery(r).val().trim() == ""){
                            err ++;
                        }
                    }
                    if(jQuery(r).attr("type") == "email" || jQuery(r).attr("id") == "billing_email"){
                        if(!validateEmail(jQuery(r).val().trim())){
                            err ++;
                        }
                    }
                    fields[jQuery(r).attr("id")] = jQuery(r).val();
                    if(jQuery("#mme_"+jQuery(r).attr("id"))){
                        jQuery("#mme_"+jQuery(r).attr("id")).val(jQuery(r).val());
                    }
                    
                    
                });
                if(err == 0){
                    jQuery("#mme-select-container").modal('show');
                    jQuery("#mme-account-modal").html("");
                    jQuery(".mme-pin input").val("");
                }
            }
        }
    });
});
//end