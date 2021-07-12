jQuery( 'body' ).on( 'updated_checkout', ()=> {
var mme_ep = jQuery("#mme-endpoint").val();
var svg = '<svg style="width:120px;position:relative;top:8px;" id="fff9af63-41b9-4e40-af70-9c93f2604cbe" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 833.5 210.3"><defs><style>.f1613420-44e5-4c47-8df0-6243ff0d67a0 {fill: #00d1cf;}.b7bb43b0-7c24-43fd-bddb-ba06c7787c59 {fill: #04ff8e;}.af87bc22-b2a0-4ed7-bce9-6964d3f0a8ab {fill: #fff;}</style></defs><path class="f1613420-44e5-4c47-8df0-6243ff0d67a0" d="M429.74,397.39h0c0,10.4,2.2,18.5,6.4,23.9,4.4,5.6,10.6,8.4,18.2,8.4a24.11,24.11,0,0,0,18.8-8.3c4.8-5.4,7.2-13.5,7.2-24s-2.1-18.4-6.3-23.8c-4.4-5.6-10.5-8.4-18.2-8.4a24.46,24.46,0,0,0-18.9,8.3c-4.8,5.3-7.2,13.4-7.2,23.9m25.4,46.3c-12.4,0-22.6-3.8-30.1-11.4-8.2-8.2-12.4-19.9-12.4-34.7,0-15.1,4.1-26.9,12.4-35.1,7.4-7.4,17.6-11.2,30.1-11.2a47.65,47.65,0,0,1,16.7,2.8,33.92,33.92,0,0,1,13,8.4c8.2,8.3,12.4,20.2,12.4,35.1,0,14.7-4.2,26.4-12.4,34.7q-11.1,11.4-29.7,11.4" transform="translate(-266.24 -278.79)"></path><path class="f1613420-44e5-4c47-8df0-6243ff0d67a0" d="M576.14,443.89a8.26,8.26,0,0,1-8.2-8v-44.7a46.85,46.85,0,0,0-.7-8.4,23.74,23.74,0,0,0-2.2-6.5,16.29,16.29,0,0,0-7.6-7.3,24.86,24.86,0,0,0-11.1-2.3,24,24,0,0,0-11.5,2.6,17.28,17.28,0,0,0-7.7,8.1c-1.6,3.3-2.4,7.7-2.4,13.5v44.8l.1.4a8.21,8.21,0,0,1-16.4,0l-.1-1.9v-47.8c0-6.9,1.2-12.7,3.5-17.3a29.38,29.38,0,0,1,5-7.1,30.44,30.44,0,0,1,7.3-5.5,42.69,42.69,0,0,1,9.8-3.6,57.39,57.39,0,0,1,12.4-1.3c8.6,0,15.7,1.4,21.3,4.3a30.26,30.26,0,0,1,12.4,11.4,31.94,31.94,0,0,1,3.3,8.4,47.12,47.12,0,0,1,1.1,10.6v49.8a8.18,8.18,0,0,1-8.3,7.8" transform="translate(-266.24 -278.79)"></path><path class="f1613420-44e5-4c47-8df0-6243ff0d67a0" d="M691.34,489.09c-1.4,0-2.8-.1-4.1-.2l-2.8-.3a40.42,40.42,0,0,1-8.3-2.1H676l-.5-.2a6.12,6.12,0,0,1-3.7-7.9,6.24,6.24,0,0,1,5.7-4.1c.3,0,.9.1,1.7.1l5.5.6h.7c.4,0,.7.1,1.1.1a16.16,16.16,0,0,0,13.2-6.4,46.47,46.47,0,0,0,7.5-14.9l3.2-10-32.2-80.2v-.2l-.1-.5a8.52,8.52,0,0,1-.3-2.3,8.81,8.81,0,0,1,8.8-8.8,8.7,8.7,0,0,1,8.3,6.1l.7,2.2h.1l22.5,64.7,19.5-64.3h0l.8-2.7a8,8,0,0,1,15.7,2.2,9.85,9.85,0,0,1-.2,1.7l-.1.5-31.7,97.5c-3.5,10.5-7.8,18.2-12.7,22.7s-10.7,6.7-18.2,6.7" transform="translate(-266.24 -278.79)"></path><path class="f1613420-44e5-4c47-8df0-6243ff0d67a0" d="M612.44,388.29h0l32-.1h7.1c2.7,0,5.4-1.6,5.4-6.2a12.75,12.75,0,0,0-.1-1.9,25.14,25.14,0,0,0-3-7.6,19,19,0,0,0-7.1-6.7,20.72,20.72,0,0,0-10.1-2.2c-7.2,0-13,2.4-17.1,7.2-4,4.6-6.3,10.5-7.1,17.5m24,55.4a37.46,37.46,0,0,1-28.7-12.5c-8-8.7-12-20.1-12-33.8,0-14.1,4-25.5,12-34,7.7-8.1,17.1-12.1,28.7-12.1,12.1,0,21.1,4.1,27.8,12.5a40.92,40.92,0,0,1,6.6,13.2c.6,1.9,1,3.8,1.4,5.6a1.88,1.88,0,0,0,.2.8,19.42,19.42,0,0,1,.2,2.4,14.17,14.17,0,0,1-14.1,14.2h-46.3l.1,3c.3,8,2.3,14.8,6.1,19.9,4,5.5,10,8.2,18,8.2,5.1,0,9.4-.9,15-5.3a13.63,13.63,0,0,0,2.4-2.4c.5-.5.9-1,1.3-1.4l.2-.2.1-.2a7.07,7.07,0,0,1,10-1.5,7.15,7.15,0,0,1,2.9,5.7,6.65,6.65,0,0,1-.9,3.4l-.1.2-.6.9a25.14,25.14,0,0,1-5.4,5.4c-6.7,5.2-15.1,7.8-24.8,7.8" transform="translate(-266.24 -278.79)"></path><path class="f1613420-44e5-4c47-8df0-6243ff0d67a0" d="M393.24,444.29a8.07,8.07,0,0,1-8.1-7.8v-45.1a46.85,46.85,0,0,0-.7-8.4,25.63,25.63,0,0,0-2.2-6.6,17.29,17.29,0,0,0-7.6-7.3,27.54,27.54,0,0,0-22.7.3,17.28,17.28,0,0,0-7.7,8.1c-1.2,2.4-1.8,6.1-2.1,11.6v46.3l-.1,1.1a8.22,8.22,0,0,1-16.4,0l-.1-1.4v-46c0-.4-.2-5-.4-6.1a25.63,25.63,0,0,0-2.2-6.6,16.77,16.77,0,0,0-7.6-7.3,24.86,24.86,0,0,0-11.1-2.3,24,24,0,0,0-11.5,2.6,17.28,17.28,0,0,0-7.7,8.1c-1.6,3.3-2.4,7.7-2.4,13.5v45.6a8.15,8.15,0,0,1-16.3,0l-.1-1.3v-48.8c0-6.9,1.2-12.7,3.5-17.3a27.23,27.23,0,0,1,5.1-7.1,29.4,29.4,0,0,1,7.3-5.4,42.69,42.69,0,0,1,9.8-3.6,57.39,57.39,0,0,1,12.4-1.3c8.6,0,15.8,1.4,21.3,4.3a29.63,29.63,0,0,1,6.6,4.5l1.8,1.6,1.9-1.6a31.16,31.16,0,0,1,5.6-3.9,42.69,42.69,0,0,1,9.8-3.6,57.39,57.39,0,0,1,12.4-1.3c8.6,0,15.7,1.4,21.3,4.3a30.26,30.26,0,0,1,12.4,11.4,31.94,31.94,0,0,1,3.3,8.4,47.12,47.12,0,0,1,1.1,10.6v49.3l-.1.8a8.89,8.89,0,0,1-8.5,7.7" transform="translate(-266.24 -278.79)"></path><path class="b7bb43b0-7c24-43fd-bddb-ba06c7787c59" d="M923.74,388.29h0l32-.1h7.1c2.7,0,5.4-1.6,5.4-6.2a12.75,12.75,0,0,0-.1-1.9,25.14,25.14,0,0,0-3-7.6,19,19,0,0,0-7.1-6.7,21.46,21.46,0,0,0-10.2-2.3c-7.2,0-13,2.4-17.1,7.2s-6.3,10.6-7,17.6m23.8,55.4a37.46,37.46,0,0,1-28.7-12.5c-8-8.7-12-20.1-12-33.8,0-14.1,4-25.5,12-34,7.7-8.1,17.1-12.1,28.7-12.1,12.1,0,21.1,4.1,27.8,12.5A40.17,40.17,0,0,1,982,377c.6,1.9,1,3.8,1.4,5.6a1.88,1.88,0,0,0,.2.8,19.42,19.42,0,0,1,.2,2.4,14.19,14.19,0,0,1-14.2,14.2h-46.3l.1,3c.3,8,2.3,14.8,6.1,19.9,4,5.5,10,8.2,18,8.2,5.1,0,9.3-.9,15-5.3a13.63,13.63,0,0,0,2.4-2.4c.5-.5.9-1,1.3-1.4l.2-.2.1-.2a7.07,7.07,0,0,1,10-1.5,7.15,7.15,0,0,1,2.9,5.7,6.65,6.65,0,0,1-.9,3.4l-.1.2-.6.9a25.14,25.14,0,0,1-5.4,5.4c-6.8,5.4-15.2,8-24.9,8" transform="translate(-266.24 -278.79)"></path><path class="b7bb43b0-7c24-43fd-bddb-ba06c7787c59" d="M887.34,444.29a8.14,8.14,0,0,1-8.1-7.8v-45.1a46.85,46.85,0,0,0-.7-8.4,25.63,25.63,0,0,0-2.2-6.6,17.29,17.29,0,0,0-7.6-7.3,27.31,27.31,0,0,0-22.6.3,17,17,0,0,0-7.6,8.1c-1.2,2.4-1.8,6.1-2.1,11.6v46.3l-.1,1.1a8.22,8.22,0,0,1-16.4,0l-.1-1.4v-46c0-.4-.2-5-.4-6.1a25.63,25.63,0,0,0-2.2-6.6,16.77,16.77,0,0,0-7.6-7.3,27.54,27.54,0,0,0-22.7.3,17.28,17.28,0,0,0-7.7,8.1c-1.6,3.3-2.4,7.7-2.4,13.5v45.6a8.21,8.21,0,0,1-16.4,0l-.1-1.3v-48.8c0-6.9,1.2-12.7,3.5-17.3a27.85,27.85,0,0,1,12.3-12.5,41.92,41.92,0,0,1,9.7-3.6,57.39,57.39,0,0,1,12.4-1.3c8.6,0,15.8,1.4,21.3,4.3a29.63,29.63,0,0,1,6.6,4.5l1.9,1.6,1.9-1.6a31.16,31.16,0,0,1,5.6-3.9,42.69,42.69,0,0,1,9.8-3.6,57.39,57.39,0,0,1,12.4-1.3c8.6,0,15.7,1.4,21.3,4.3a30.26,30.26,0,0,1,12.4,11.4,31.94,31.94,0,0,1,3.3,8.4,47.12,47.12,0,0,1,1.1,10.6v49.3l-.1.8a8.7,8.7,0,0,1-8.4,7.7" transform="translate(-266.24 -278.79)"></path><path d="M1099.74,330.19a51.42,51.42,0,0,0-102.5-5.9h0l-.4,57.3,54.4-.1h0A51.55,51.55,0,0,0,1099.74,330.19Z" transform="translate(-266.24 -278.79)"></path><path class="af87bc22-b2a0-4ed7-bce9-6964d3f0a8ab" d="M1078,337.49h-24.8v26h-12.8v-26h-24.6V326h24.6v-25.9h12.8V326H1078Z" transform="translate(-266.24 -278.79)"></path></svg>';
jQuery("#payment_method_mme_gateway ~ label").html('Pay with '+svg);

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
    console.log(fields);
    return false;
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
    jQuery("#place_order").on( 'click', ()=> {
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