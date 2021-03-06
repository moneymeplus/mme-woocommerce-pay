<?php if($woocommerce->cart->total >= 1000): ?>
    <span id="mme-proceed-pay"></span>
<?php endif;?>
<div id="container-mme" class="m-442218 mme-gateway">
    <input type="hidden" id="mme-endpoint" value="<?php echo esc_url($site_ep);?>" />
    <div class="mme-border">
        <h3 class="mme-h3">Shop now & pay later</h3>
        <p><?php echo esc_html($description);?></p>
    </div>
    
    <div id="mme-select-container" class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"  data-backdrop="false" data-modal-name="select">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="checkout-wrap user-wrap">
                        <div class="mme-logo-wrap text-center">
                            <img src="<?php echo esc_url($img.'/mme_logo-login.svg');?>" alt="Moneyme Logo" />
                        </div>
                        <div class="button-wrap pb-4">
                            <button id="mme-btn-signup-select" class="btn button-default btn-green semi-bold btn-block btn-signup" data-dismiss="modal" data-toggle="modal" data-target="#mme-signup-container">Sign up now
                                <svg style="width: 13px;" id="ee1a273b-8129-466d-8ea7-56abc9dac8fc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 14.28 13.92">
                                    <defs>
                                        <style>
                                            .aaf32895-5a89-4ae5-913b-673ab52e29e4 {
                                                fill: #000;
                                            }
                                        </style>
                                    </defs>
                                    <path id="a6e5a97d-b111-480f-92b7-6e08e755b3f3" data-name="Icon awesome-arrow-right"
                                        class="aaf32895-5a89-4ae5-913b-673ab52e29e4"
                                        d="M681.88,377.91l.71-.7a.76.76,0,0,1,1.07,0h0l6.2,6.19a.77.77,0,0,1,0,1.08h0l-6.2,6.2a.76.76,0,0,1-1.08,0h0l-.71-.71a.76.76,0,0,1,0-1.08h0l3.84-3.66h-9.16a.76.76,0,0,1-.76-.76h0v-1a.76.76,0,0,1,.76-.77h9.16L681.89,379a.77.77,0,0,1,0-1.08Z"
                                        transform="translate(-675.81 -376.98)" />
                                </svg>
                            </button>
                        </div>
                        <div class="button-wrap">
                            <button id="mme-btn-login-select" type="button" class="btn button-default btn-blue semi-bold btn-block btn-main-login" data-dismiss="modal" data-toggle="modal" data-target="#mme-login-container">Login
                                <svg style="width: 13px;" id="a1a5ecaa-2bc8-4c9b-a42f-51d55e02280e" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 12.43 12.44">
                                    <defs>
                                        <style>
                                            .b2839b62-9d81-42d4-aecb-18ad9ba80bee {
                                                fill: #fff;
                                            }
                                        </style>
                                    </defs>
                                    <path id="e6c21fbd-9afc-4917-b5aa-074ea6da2294" data-name="Icon awesome-user-alt"
                                        class="b2839b62-9d81-42d4-aecb-18ad9ba80bee"
                                        d="M681.89,387.55a3.5,3.5,0,1,0-3.5-3.5A3.5,3.5,0,0,0,681.89,387.55Zm3.1.78h-1.33a4.21,4.21,0,0,1-3.54,0h-1.34a3.1,3.1,0,0,0-3.11,3.1v.39a1.17,1.17,0,0,0,1.17,1.17h10.1a1.16,1.16,0,0,0,1.16-1.17v-.39a3.1,3.1,0,0,0-3.1-3.1Z"
                                        transform="translate(-675.67 -380.55)" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>
    </div>  
    
    <!-- User signup -->
    <div id="mme-signup-container" class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="false" data-modal-name="signup">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content modal-content-inner">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="checkout-header signup-header">
                        <div class="mme-logo-wrap">
                            <img src="<?php echo esc_url($img.'/mme_logo.svg');?>" />
                        </div>
                        <div class="info-wrap">
                            <span class="help">Need help?</span> <br />
                            <a href="tel:1300435547">
                                <svg style="width: 11px;" id="a16e02dc-f08c-45b4-b6d4-d85dd92cdbc1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 10.4 11.15">
                                    <defs>
                                        <style>
                                            .bab3fd6c-8d69-4dcb-994a-d5095e149c25 {
                                                fill: #fff;
                                            }
                                        </style>
                                    </defs>
                                    <g id="a9007ba7-def9-4655-a7c7-675b75f7f06f" data-name="s9jls2">
                                        <g id="bed8aafb-cc8a-4404-8dde-98015372717c" data-name="Group 30">
                                            <g id="aed3fca1-a475-4d85-85b4-5d386ca8babc" data-name="Group 29">
                                                <path id="a01d098d-55d4-4012-a6cd-b512e86e991e" data-name="Path 15"
                                                    class="bab3fd6c-8d69-4dcb-994a-d5095e149c25"
                                                    d="M677.77,381.75a3.6,3.6,0,0,1,.28-1.45,3.43,3.43,0,0,1,.83-1.17c.22-.2.45-.38.68-.57a.89.89,0,0,1,.38-.18.68.68,0,0,1,.46.09,1.55,1.55,0,0,1,.48.44,7.38,7.38,0,0,1,.5.74,3.86,3.86,0,0,1,.32.56,2,2,0,0,1,.2.62,1,1,0,0,1-.26.81c-.12.13-.26.24-.38.36a4,4,0,0,1-.41.31.89.89,0,0,0-.35.48,1,1,0,0,0,0,.51,2.1,2.1,0,0,0,.26.64,7.22,7.22,0,0,0,.72,1,10.85,10.85,0,0,0,.8.86,3.79,3.79,0,0,0,.85.64,1.18,1.18,0,0,0,.55.17.79.79,0,0,0,.6-.21l.11-.1a4.29,4.29,0,0,1,.49-.46,1.33,1.33,0,0,1,.3-.23,1.08,1.08,0,0,1,.86-.09,2,2,0,0,1,.66.37l.71.59a3.33,3.33,0,0,1,.46.46,1.47,1.47,0,0,1,.24.4.65.65,0,0,1-.13.68,3.19,3.19,0,0,1-.26.26l-.44.39a3,3,0,0,1-.9.56,3.58,3.58,0,0,1-1,.25,4.13,4.13,0,0,1-.93,0,4.86,4.86,0,0,1-1.62-.55,7.33,7.33,0,0,1-1.32-.9,12,12,0,0,1-1.26-1.21c-.35-.39-.69-.8-1-1.22a9.74,9.74,0,0,1-.95-1.55,6.46,6.46,0,0,1-.47-1.34A4.49,4.49,0,0,1,677.77,381.75Z"
                                                    transform="translate(-677.77 -378.37)" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                Call us now
                            </a>
                        </div>
                    </div>
                    <div class="checkout-wrap signup-wrap">
                        <h2>Let's get started</h2>
                        <h3>
                            <svg style="width:18px;position:relative;top:3px;right:3px;" id="bdf904f7-26f2-40f0-a836-a8026eb51da0" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 18.77 18.77">
                                <defs>
                                    <style>
                                        .b9d7348a-d1ea-4092-8c26-f1dc5c7be865 {
                                            fill: #00d1d0;
                                            stroke: #00d1d0;
                                            stroke-miterlimit: 10;
                                            stroke-width: 0.5px;
                                        }
                                    </style>
                                </defs>
                                <g id="f1876644-c8b2-4f58-b908-67fc8e5e68d1" data-name="Group 42">
                                    <path id="ae65ac01-3578-48a4-a80f-349efac0fd4c" data-name="Path 13"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865"
                                        d="M678,402.44a9.13,9.13,0,0,1-8.66-6.21l.47-.16a8.65,8.65,0,1,0,13.4-9.66l.3-.39A9.13,9.13,0,0,1,678,402.44Z"
                                        transform="translate(-668.63 -383.92)" />
                                    <path id="adb5650b-e971-4218-81e0-9ccfd2642098" data-name="Path 14"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865"
                                        d="M669.07,395.15a9.14,9.14,0,0,1,7.12-10.79,9.39,9.39,0,0,1,1.83-.19,9.14,9.14,0,0,1,4.7,1.3l-.25.42a8.64,8.64,0,0,0-13.1,7.41,9.35,9.35,0,0,0,.17,1.75Z"
                                        transform="translate(-668.63 -383.92)" />
                                    <path id="bc0f69d0-a5ab-464b-a65d-00ce849d8b3f" data-name="Path 15"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" d="M681.51,393.56h-3.73v-5.28h.49v4.79h3.24Z"
                                        transform="translate(-668.63 -383.92)" />
                                    <rect id="b0d2373f-17d2-4124-98f6-7ca47541864d" data-name="Rectangle 19"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="9.14" y="1.24" width="0.49" height="0.83" />
                                    <rect id="e9e76404-7e04-4ada-91d2-4947b618c2b4" data-name="Rectangle 20"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="9.14" y="16.82" width="0.49" height="0.83" />
                                    <rect id="ed6093c6-2de9-4247-8134-ef9ac1b3dc93" data-name="Rectangle 21"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="16.76" y="9.2" width="0.83" height="0.49" />
                                    <rect id="a03cc938-87f2-47a6-92d8-0878396ed532" data-name="Rectangle 22"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="1.18" y="9.2" width="0.83" height="0.49" />
                                    <rect id="a69c23ff-d0c3-406a-9374-8d68e133168c" data-name="Rectangle 23"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="9.14" y="1.24" width="0.49" height="0.83" />
                                    <rect id="a215d21a-986a-4337-945d-836686602673" data-name="Rectangle 24"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="9.14" y="16.82" width="0.49" height="0.83" />
                                    <rect id="a809d738-88d3-4321-9fc9-8ee97ee0c215" data-name="Rectangle 25"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="16.76" y="9.2" width="0.83" height="0.49" />
                                    <rect id="abf388a9-d67b-4217-b5d1-3491dd5bb4ba" data-name="Rectangle 26"
                                        class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" x="1.18" y="9.2" width="0.83" height="0.49" />
                                    <g id="a3dff871-5346-4e53-986a-5d78d9e3e25d" data-name="Group 11">
                                        <circle id="e1e6479a-ce58-41ad-b682-f66eafce6269" data-name="Ellipse 1"
                                            class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865" cx="9.39" cy="9.39" r="0.55" />
                                        <path id="a3e1a71e-7550-444b-a453-f0a6b65a3a83" data-name="Path 16"
                                            class="b9d7348a-d1ea-4092-8c26-f1dc5c7be865"
                                            d="M678,394.1a.79.79,0,1,1,.79-.86h0a.8.8,0,0,1-.72.86Zm0-1.09h0a.3.3,0,0,0-.28.31.29.29,0,0,0,.31.29.32.32,0,0,0,.29-.31A.31.31,0,0,0,678,393Z"
                                            transform="translate(-668.63 -383.92)" />
                                    </g>
                                </g>
                            </svg>    
                            Apply in minutes
                        </h3>
                        <div class="mme-signup-loading text-center">
                            <img src="<?php echo esc_url($img.'/spinner_large.svg');?>" class="pre-loader-icon" alt="Loading.."/>
                        </div>
                        <div id="signup-status" class="mme-err-status"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-element-select">
                                    <div class="field-wrapper">
                                        <span class="floating-label2" for="Title">Title</span>
                                        <select class="inputSelect" required="" id="mme_billing_title">
                                            <option value="19001">Mr.</option>
                                            <option value="19002">Ms.</option>
                                            <option value="19003">Mrs.</option>
                                            <option value="19004">Miss</option>
                                        </select>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        <div class="mme-err-status hidden" role="alert" style="margin-top:10px;"><span class="field-validation-valid" data-valmsg-for="EmailSubject" data-valmsg-replace="true"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-element">
                                    <input class="inputText" placeholder="First name" type="text" id="mme_billing_first_name" autocomplete="off">
                                    <span class="floating-label" for="mme_billing_first_name">First name</span>
                                    <div class="mme-err-status hidden" role="alert"></div>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-element">
                                    <input class="inputText" placeholder="Last name" type="text" id="mme_billing_last_name">
                                    <span class="floating-label" for="mme_billing_last_name">Last name</span>
                                    <div class="mme-err-status hidden" role="alert"></div>
                                </div>
                            </div>
                        
                            <div class="col-md-12">
                                <div class="form-element">
                                    <input class="inputText" placeholder="Mobile number" type="text" id="mme_billing_phone" maxlength="10">
                                    <span class="floating-label" for="Mobile number">Mobile number</span>
                                    <div class="mme-err-status hidden" role="alert"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-element">
                                    <input class="inputText" placeholder="Email address" type="text" id="mme_billing_email">
                                    <span class="floating-label" for="Email address">Email address</span>
                                    <div class="mme-err-status hidden" role="alert"></div>
                                </div>
                            </div>
                        </div>
                        <div class="button-wrap pb-4 pt-4">
                            <button id="mme-btn-submit" class="btn button-default btn-green semi-bold btn-block btn-signup" data-dismiss="modal" data-toggle="modal" data-target="#user-sms">
                                Continue
                                <svg style="width: 13px;" id="ee1a273b-8129-466d-8ea7-56abc9dac8fc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 14.28 13.92">
                                    <defs>
                                        <style>
                                            .aaf32895-5a89-4ae5-913b-673ab52e29e4 {
                                                fill: #000;
                                            }
                                        </style>
                                    </defs>
                                    <path id="a6e5a97d-b111-480f-92b7-6e08e755b3f3" data-name="Icon awesome-arrow-right"
                                        class="aaf32895-5a89-4ae5-913b-673ab52e29e4"
                                        d="M681.88,377.91l.71-.7a.76.76,0,0,1,1.07,0h0l6.2,6.19a.77.77,0,0,1,0,1.08h0l-6.2,6.2a.76.76,0,0,1-1.08,0h0l-.71-.71a.76.76,0,0,1,0-1.08h0l3.84-3.66h-9.16a.76.76,0,0,1-.76-.76h0v-1a.76.76,0,0,1,.76-.77h9.16L681.89,379a.77.77,0,0,1,0-1.08Z"
                                        transform="translate(-675.81 -376.98)" />
                                </svg>
                            </button>
                        </div>
                        <div class="text-center mme-existing-account">
                            <img src="<?php echo esc_url($img.'/user_icon.png');?>" alt="">
                           <p>Existing account detected</p>
                           <div class="button-wrap">
                                <button id="mme-btn-submit" class="btn button-default btn-green semi-bold btn-block btn-signup" data-dismiss="modal" data-toggle="modal" data-target="#mme-login-container">
                                    Log in to continue
                                    <svg style="width: 13px;" id="ee1a273b-8129-466d-8ea7-56abc9dac8fc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 14.28 13.92">
                                        <defs>
                                            <style>
                                                .aaf32895-5a89-4ae5-913b-673ab52e29e9 {
                                                    fill: #fff;
                                                }
                                            </style>
                                        </defs>
                                        <path id="a6e5a97d-b111-480f-92b7-6e08e755b3f3" data-name="Icon awesome-arrow-right"
                                            class="aaf32895-5a89-4ae5-913b-673ab52e29e9"
                                            d="M681.88,377.91l.71-.7a.76.76,0,0,1,1.07,0h0l6.2,6.19a.77.77,0,0,1,0,1.08h0l-6.2,6.2a.76.76,0,0,1-1.08,0h0l-.71-.71a.76.76,0,0,1,0-1.08h0l3.84-3.66h-9.16a.76.76,0,0,1-.76-.76h0v-1a.76.76,0,0,1,.76-.77h9.16L681.89,379a.77.77,0,0,1,0-1.08Z"
                                            transform="translate(-675.81 -376.98)" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                         <div class="text-center mme-have-account">Have an account? <a href="javascript:;" data-dismiss="modal" data-toggle="modal" data-target="#mme-login-container">Log in here</a></div>                       
                    </div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>
    </div>

    <!-- User login -->
    <div id="mme-login-container" class="modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"  data-backdrop="false" data-modal-name="login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="checkout-wrap login-wrap">
                        <div class="mme-logo-wrap text-center">
                            <img src="<?php echo esc_url($img.'/mme_logo-login.svg');?>" alt="MME Pay logo" />
                        </div>
                        <div class="loading pin-loading text-center mme-login-loading">
                            <img src="<?php echo esc_url($img.'/spinner_large.svg');?>" class="pre-loader-icon"/>
                        </div>
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <h2 class="white-text">Log in</h2>
                        <div id="status" class="mme-err-status"></div>
                        <div class="form-element">
                            <input class="inputText" type="text" placeholder="Email address" id="mme-username">
                            <span class="floating-label" for="Email">Email address</span>
                            <div class="alert alert-danger hidden" role="alert"></div>
                        </div>
                        <div class="mme-pin-wrap">
                            <span class="show mme-pinlabel">Your 4-digit passcode</span>
                            <div class="mme-pin">
                                <input type="text" class="inputPin mme-input" data-pin=1 maxlength="1" />
                                <input type="text" class="inputPin mme-input" data-pin=2 maxlength="1" />
                                <input type="text" class="inputPin mme-input" data-pin=3 maxlength="1" />
                                <input type="text" class="inputPin mme-input" data-pin=4 maxlength="1" />
                            </div>  
                        </div>
                        
                        <div class="for-remember-wrap pt-3">
                            <a href="javascript:;" class="forgot-passcode" data-toggle="modal" data-target="#mme-forgot-container" data-dismiss="modal" data-backdrop="static">
                                Forgot passcode
                            </a>
                            <div class="btn-signup float-right">
                                <span class="d-inline white-text">No account?</span>
                                <a href="" class="btn button-default btn-sm btn-green semi-bold" data-dismiss="modal" data-toggle="modal" data-target="#mme-signup-container">
                                    Sign up now
                                </a>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="mme-existing-client"><p class="mme-message">Looks like you're a MoneyMe customer but <br />don't have a MoneyMe+ account.</p>
                        <div class="button-wrap">
                            <button id="mme-btn-signup-select-validate" class="btn button-default btn-green semi-bold btn-block btn-signup" data-dismiss="modal" data-toggle="modal" data-target="#mme-signup-container"><span class="txt_label">Sign up now</span>
                                <svg style="width: 13px;" id="ee1a273b-8129-466d-8ea7-56abc9dac8fc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 14.28 13.92">
                                    <defs>
                                        <style>
                                            .aaf32895-5a89-4ae5-913b-673ab52e29e4 {
                                                fill: #000;
                                            }
                                        </style>
                                    </defs>
                                    <path id="a6e5a97d-b111-480f-92b7-6e08e755b3f3" data-name="Icon awesome-arrow-right"
                                        class="aaf32895-5a89-4ae5-913b-673ab52e29e4"
                                        d="M681.88,377.91l.71-.7a.76.76,0,0,1,1.07,0h0l6.2,6.19a.77.77,0,0,1,0,1.08h0l-6.2,6.2a.76.76,0,0,1-1.08,0h0l-.71-.71a.76.76,0,0,1,0-1.08h0l3.84-3.66h-9.16a.76.76,0,0,1-.76-.76h0v-1a.76.76,0,0,1,.76-.77h9.16L681.89,379a.77.77,0,0,1,0-1.08Z"
                                        transform="translate(-675.81 -376.98)" />
                                </svg>
                            </button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>
    </div>

    <!--- forgot password --->
    <div id="mme-forgot-container" class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"  data-backdrop="false" data-modal-name="forgot passcode">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="checkout-wrap login-wrap">
                        <div class="mme-logo-wrap text-center">
                            <svg id="b4033fc1-e8ce-413d-8894-3d6024ed2368" data-name="b6c6eaac-8af6-426f-8553-4241a16d74f0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 834.25 308.08"><defs><style>.fe4c64f3-07f2-4f17-bcb2-28eae1c7aff0{fill:#00d1cf;}.a394fcc8-a00f-49bd-86ff-0e1c9d6bed03{fill:#04ff8e;}.ae95fbcf-fe61-40ef-a26d-014f6fa2ede8{fill:#fff;}</style></defs><path class="fe4c64f3-07f2-4f17-bcb2-28eae1c7aff0" d="M164.09,118.56h0c0,10.45,2.16,18.48,6.44,23.88,4.45,5.61,10.58,8.45,18.22,8.45a24,24,0,0,0,18.78-8.34c4.8-5.41,7.24-13.49,7.24-24s-2.14-18.44-6.35-23.84c-4.38-5.63-10.51-8.47-18.24-8.47a24.13,24.13,0,0,0-18.87,8.33c-4.8,5.42-7.22,13.5-7.22,24m25.43,46.3c-12.42,0-22.55-3.83-30.11-11.4-8.21-8.2-12.37-19.87-12.37-34.7,0-15.08,4.16-26.89,12.37-35.09,7.44-7.44,17.57-11.21,30.11-11.21a48.82,48.82,0,0,1,16.63,2.8,34.05,34.05,0,0,1,13.06,8.38c8.23,8.35,12.4,20.16,12.4,35.12,0,14.7-4.17,26.38-12.38,34.72-7.29,7.54-17.29,11.37-29.71,11.37"/><path class="fe4c64f3-07f2-4f17-bcb2-28eae1c7aff0" d="M310.54,165.11a8.16,8.16,0,0,1-8.17-8v-44.8a43.57,43.57,0,0,0-.71-8.45,23.36,23.36,0,0,0-2.25-6.54A17,17,0,0,0,291.8,90a25.27,25.27,0,0,0-11.06-2.29,24.51,24.51,0,0,0-11.56,2.57,17.33,17.33,0,0,0-7.66,8.12c-1.62,3.32-2.42,7.74-2.42,13.47v44.8l.07.44a8.21,8.21,0,0,1-16.42,0h0l-.06-1.93V107.35c0-6.87,1.19-12.69,3.53-17.31a28.52,28.52,0,0,1,5.05-7,29.68,29.68,0,0,1,7.33-5.46A40.88,40.88,0,0,1,268.36,74a55.44,55.44,0,0,1,12.38-1.28c8.59,0,15.75,1.44,21.29,4.3a29.58,29.58,0,0,1,12.38,11.36,30.64,30.64,0,0,1,3.28,8.45,47,47,0,0,1,1.09,10.57v49.79a8.17,8.17,0,0,1-8.19,8"/><path class="fe4c64f3-07f2-4f17-bcb2-28eae1c7aff0" d="M425.78,210.32a41.07,41.07,0,0,1-4.15-.24l-2.75-.27a41.51,41.51,0,0,1-8.27-2.12l-.07-.06-.47-.16a6.19,6.19,0,0,1,2-12c.27,0,.92.08,1.67.16l5.42.64h.68c.37,0,.74.06,1.13.06A16.34,16.34,0,0,0,434.2,190a45,45,0,0,0,7.51-15l3.23-10L412.76,84.84v-.2l-.12-.46a8.19,8.19,0,0,1-.34-2.26,8.79,8.79,0,0,1,17.16-2.68l.7,2.18h.12l22.5,64.69,19.47-64.29h0l.79-2.67a8,8,0,0,1,15.74,2.18,8.63,8.63,0,0,1-.17,1.68l-.13.53-31.74,97.57c-3.52,10.55-7.81,18.19-12.7,22.69s-10.77,6.52-18.26,6.52"/><path class="fe4c64f3-07f2-4f17-bcb2-28eae1c7aff0" d="M346.88,109.49h0l32-.08H386c2.71,0,5.43-1.55,5.44-6.21a16.61,16.61,0,0,0-.13-1.86,24.41,24.41,0,0,0-3.05-7.63A18.65,18.65,0,0,0,381.17,87a21.72,21.72,0,0,0-10.23-2.27c-7.22,0-13,2.42-17.08,7.2-4,4.59-6.31,10.5-7,17.57m23.88,55.37A37.29,37.29,0,0,1,342,152.38c-8-8.7-12-20.08-12-33.82,0-14.09,4-25.53,12-34,7.68-8.15,17.07-12.11,28.71-12.11,12.07,0,21.15,4.09,27.79,12.48a39.89,39.89,0,0,1,6.68,13.21c.58,1.93,1,3.79,1.38,5.6a4.92,4.92,0,0,0,.17.85A16.31,16.31,0,0,1,407,107a14.2,14.2,0,0,1-14.08,14.19H346.57l.1,3c.28,8,2.33,14.77,6.09,19.93,4,5.49,10.06,8.26,18,8.26,5.08,0,9.36-.89,15.05-5.32a21.49,21.49,0,0,0,2.38-2.39c.46-.5.91-1,1.33-1.42l.17-.16.13-.19a7.14,7.14,0,0,1,12.89,4.2,6.82,6.82,0,0,1-.93,3.38l-.09.19a6.9,6.9,0,0,1-.64.89,26.66,26.66,0,0,1-5.43,5.44c-6.73,5.2-15.1,7.83-24.86,7.83"/><path class="fe4c64f3-07f2-4f17-bcb2-28eae1c7aff0" d="M127.62,165.44a8.19,8.19,0,0,1-8.15-7.78V112.51a44.37,44.37,0,0,0-.71-8.45,23.75,23.75,0,0,0-2.25-6.55,17.07,17.07,0,0,0-7.62-7.32,25,25,0,0,0-11.06-2.3,24.51,24.51,0,0,0-11.56,2.57,17.29,17.29,0,0,0-7.65,8.13c-1.16,2.37-1.79,6.07-2.12,11.58v46.34l-.12,1.13a8.26,8.26,0,0,1-16.5,0l-.09-1.44v-46c0-.42-.2-5-.41-6.1a23.36,23.36,0,0,0-2.24-6.56,17.17,17.17,0,0,0-7.62-7.32,25,25,0,0,0-11.07-2.3,24.51,24.51,0,0,0-11.56,2.57,17.29,17.29,0,0,0-7.65,8.13c-1.62,3.32-2.43,7.73-2.43,13.46V157.7a8.17,8.17,0,0,1-16.32,0l-.06-1.29V107.55c0-6.87,1.19-12.68,3.52-17.3A28.58,28.58,0,0,1,9,83.15a30.24,30.24,0,0,1,7.32-5.44,39.81,39.81,0,0,1,9.76-3.57,56,56,0,0,1,12.38-1.28c8.59,0,15.76,1.45,21.3,4.31a33.66,33.66,0,0,1,6.6,4.48l1.87,1.63,1.88-1.63a30.38,30.38,0,0,1,5.6-3.94,39.08,39.08,0,0,1,9.75-3.57,56.64,56.64,0,0,1,12.38-1.28c8.59,0,15.75,1.45,21.29,4.31a29.56,29.56,0,0,1,12.39,11.37A30,30,0,0,1,134.81,97a47.55,47.55,0,0,1,1.09,10.57v49.29l-.07.82a8.19,8.19,0,0,1-8.16,7.78"/><path class="a394fcc8-a00f-49bd-86ff-0e1c9d6bed03" d="M658.2,109.49h0l32-.08h7.14c2.72,0,5.44-1.55,5.44-6.21a14.54,14.54,0,0,0-.13-1.86,24.07,24.07,0,0,0-3-7.63,18.71,18.71,0,0,0-7.1-6.72,21.62,21.62,0,0,0-10.15-2.25c-7.22,0-13,2.42-17.09,7.2-4,4.59-6.3,10.5-7,17.57m23.89,55.37a37.28,37.28,0,0,1-28.7-12.48c-8-8.7-12-20.08-12-33.82,0-14.09,4-25.53,12-34,7.69-8.15,17.08-12.11,28.72-12.11,12.07,0,21.14,4.09,27.79,12.48a39.87,39.87,0,0,1,6.67,13.21c.58,1.93,1,3.79,1.38,5.6a4.15,4.15,0,0,0,.18.85,14.42,14.42,0,0,1,.24,2.45,14.18,14.18,0,0,1-14.12,14.18H657.94l.1,3c.28,8,2.33,14.77,6.08,19.93,4,5.49,10.06,8.26,18,8.26,5.07,0,9.35-.89,15-5.32a21.49,21.49,0,0,0,2.38-2.39c.46-.5.91-1,1.32-1.42l.17-.16.14-.19a7.14,7.14,0,0,1,12.89,4.2,6.93,6.93,0,0,1-.94,3.38l-.09.19a6.9,6.9,0,0,1-.64.89,26.71,26.71,0,0,1-5.46,5.42c-6.73,5.2-15.09,7.83-24.85,7.83"/><path class="a394fcc8-a00f-49bd-86ff-0e1c9d6bed03" d="M621.87,165.44a8.19,8.19,0,0,1-8.15-7.78V112.51a44.68,44.68,0,0,0-.78-8.48,23.75,23.75,0,0,0-2.25-6.55,17.12,17.12,0,0,0-7.62-7.32A25,25,0,0,0,592,87.86a24.51,24.51,0,0,0-11.56,2.57,17.15,17.15,0,0,0-7.65,8.13c-1.16,2.37-1.79,6.07-2.12,11.58v46.34l-.12,1.13a8.26,8.26,0,0,1-16.5,0l-.09-1.44v-46c0-.42-.2-5-.41-6.1a22.76,22.76,0,0,0-2.25-6.56,17.07,17.07,0,0,0-7.62-7.32,25,25,0,0,0-11.06-2.3,24.51,24.51,0,0,0-11.56,2.57,17.15,17.15,0,0,0-7.65,8.13c-1.62,3.32-2.43,7.73-2.43,13.46v45.62a8.17,8.17,0,0,1-16.32,0l-.07-1.29V107.55c0-6.87,1.2-12.68,3.53-17.3a28.44,28.44,0,0,1,5.06-7.1,30.24,30.24,0,0,1,7.32-5.44,39.81,39.81,0,0,1,9.76-3.57,56,56,0,0,1,12.38-1.28c8.59,0,15.76,1.45,21.3,4.31a33.66,33.66,0,0,1,6.6,4.48l1.87,1.63,1.88-1.63a30.3,30.3,0,0,1,5.59-3.94,39.81,39.81,0,0,1,9.76-3.57A56.46,56.46,0,0,1,592,72.86c8.59,0,15.75,1.45,21.29,4.31a29.56,29.56,0,0,1,12.39,11.37A30.67,30.67,0,0,1,629,97a47.55,47.55,0,0,1,1.09,10.57v49.29l-.07.82a8.19,8.19,0,0,1-8.16,7.78"/><path d="M834.25,51.35a51.41,51.41,0,0,0-102.47-5.93h0l-.37,57.35,54.41-.15h0A51.37,51.37,0,0,0,834.25,51.35Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M812.64,58.68H787.87v26H775v-26H750.39V47.11H775V21.2h12.83V47.11H812.6Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M32.88,248a3,3,0,0,1-.75.87,1.68,1.68,0,0,1-1,.29,2.71,2.71,0,0,1-1.55-.66c-.59-.44-1.34-.92-2.22-1.45a18.15,18.15,0,0,0-3.21-1.45,13.74,13.74,0,0,0-4.55-.6,13.35,13.35,0,0,0-4.43.67,9.54,9.54,0,0,0-3.23,1.85,7.78,7.78,0,0,0-2,2.72,8.79,8.79,0,0,0-.66,3.39,6.3,6.3,0,0,0,1.14,3.85,9.63,9.63,0,0,0,3,2.61A22.83,22.83,0,0,0,17.67,262l4.88,1.64c1.66.57,3.29,1.2,4.87,1.92a17.19,17.19,0,0,1,4.26,2.68,12.53,12.53,0,0,1,3,4A13.18,13.18,0,0,1,35.94,278a19,19,0,0,1-1.24,6.83,15.65,15.65,0,0,1-3.62,5.55A16.71,16.71,0,0,1,25.24,294a21.38,21.38,0,0,1-7.87,1.35,23.72,23.72,0,0,1-9.83-2A23,23,0,0,1,0,288.15l2.16-3.56a3.25,3.25,0,0,1,.76-.72,2,2,0,0,1,1-.28,2.34,2.34,0,0,1,1.14.4c.43.27.9.61,1.45,1s1.16.86,1.85,1.35a14.77,14.77,0,0,0,2.38,1.36,15.77,15.77,0,0,0,3,1,16.46,16.46,0,0,0,3.83.41,14,14,0,0,0,4.76-.74,10,10,0,0,0,3.61-2,9,9,0,0,0,2.22-3.2,10.62,10.62,0,0,0,.78-4.17,7,7,0,0,0-1.14-4.12,9.66,9.66,0,0,0-3-2.69,20.5,20.5,0,0,0-4.25-1.83l-4.88-1.55A42.51,42.51,0,0,1,10.8,267a15.68,15.68,0,0,1-4.25-2.71,12.38,12.38,0,0,1-3-4.16,16,16,0,0,1,0-11.86,14.67,14.67,0,0,1,3.33-4.87,16.43,16.43,0,0,1,5.33-3.4,19.68,19.68,0,0,1,7.32-1.28,23.23,23.23,0,0,1,8.41,1.48,20.24,20.24,0,0,1,6.72,4.25Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M51.13,260.85a21.26,21.26,0,0,1,5.58-4.26,15,15,0,0,1,7-1.59,14.25,14.25,0,0,1,5.66,1.07,11,11,0,0,1,4.11,3A13.67,13.67,0,0,1,76,263.78a20.15,20.15,0,0,1,.85,6.07V294.8H69.94V269.86a10.71,10.71,0,0,0-2-6.91q-2-2.46-6.17-2.46A11.55,11.55,0,0,0,56.06,262a18.54,18.54,0,0,0-4.9,4v28.86H44.24v-57h6.92Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M103.94,255a20,20,0,0,1,7.73,1.43,16.64,16.64,0,0,1,5.88,4.06,17.84,17.84,0,0,1,3.74,6.37,27.64,27.64,0,0,1,0,16.69,18.14,18.14,0,0,1-3.74,6.35,16.36,16.36,0,0,1-5.88,4,22.06,22.06,0,0,1-15.52,0,16.31,16.31,0,0,1-5.9-4,18.14,18.14,0,0,1-3.74-6.35,27.64,27.64,0,0,1,0-16.69,17.84,17.84,0,0,1,3.74-6.37,16.72,16.72,0,0,1,5.9-4.06A20.35,20.35,0,0,1,103.94,255Zm0,35q5.81,0,8.66-3.88t2.86-10.86q0-7-2.86-10.9t-8.66-4a12.23,12.23,0,0,0-5.13,1,9.51,9.51,0,0,0-3.63,2.9A12.86,12.86,0,0,0,92.94,269a24.76,24.76,0,0,0-.72,6.24q0,7,2.89,10.86t8.83,3.84Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M137.82,261.7a20.49,20.49,0,0,1,5.73-4.92,14.7,14.7,0,0,1,7.39-1.85,14.33,14.33,0,0,1,6.15,1.29,12.64,12.64,0,0,1,4.69,3.83,18.44,18.44,0,0,1,3,6.29,32.07,32.07,0,0,1,1,8.62,26.9,26.9,0,0,1-1.17,8.07,19.21,19.21,0,0,1-3.34,6.46,15.47,15.47,0,0,1-12.33,5.86,14.1,14.1,0,0,1-6.17-1.22,14.69,14.69,0,0,1-4.55-3.38V308h-7V255.62h4.14a1.7,1.7,0,0,1,1.82,1.43Zm.35,23.67a11,11,0,0,0,4.14,3.59,11.81,11.81,0,0,0,5,1.05,9.91,9.91,0,0,0,8.43-3.9q2.94-3.9,2.94-11.15a27.37,27.37,0,0,0-.68-6.57,12.88,12.88,0,0,0-2-4.51,7.62,7.62,0,0,0-3.13-2.57,10.55,10.55,0,0,0-4.22-.82,11.23,11.23,0,0,0-5.9,1.55,16.88,16.88,0,0,0-4.66,4.37Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M200.94,261.31a23.7,23.7,0,0,1,2.71-2.59,17.22,17.22,0,0,1,3-2,14.81,14.81,0,0,1,7.29-1.69,14.33,14.33,0,0,1,5.67,1.07,10.84,10.84,0,0,1,4.09,3,13.46,13.46,0,0,1,2.5,4.71,20.8,20.8,0,0,1,.85,6.07v24.95h-6.91v-25a10.49,10.49,0,0,0-2-6.91c-1.35-1.64-3.4-2.46-6.17-2.46a11.49,11.49,0,0,0-5.7,1.48,18.49,18.49,0,0,0-4.89,4V294.8h-6.93V255.62h4.14a1.7,1.7,0,0,1,1.82,1.43Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M254.1,255a20.1,20.1,0,0,1,7.74,1.43,16.86,16.86,0,0,1,5.88,4.06,18,18,0,0,1,3.73,6.37,27.64,27.64,0,0,1,0,16.69,18.27,18.27,0,0,1-3.73,6.35,16.58,16.58,0,0,1-5.88,4,20.27,20.27,0,0,1-7.74,1.41,20.57,20.57,0,0,1-7.8-1.41,16.52,16.52,0,0,1-5.9-4,18,18,0,0,1-3.73-6.35,27.48,27.48,0,0,1,0-16.69,18,18,0,0,1,3.73-6.37,16.72,16.72,0,0,1,5.9-4.06A20.4,20.4,0,0,1,254.1,255Zm0,35q5.79,0,8.66-3.88t2.87-10.86q0-7-2.87-10.9t-8.66-3.91a12.08,12.08,0,0,0-5.13,1,9.47,9.47,0,0,0-3.64,2.9,13,13,0,0,0-2.16,4.66,25.21,25.21,0,0,0-.71,6.24q0,7,2.87,10.86T254.1,290Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M334.94,255.62l-12.69,39.19h-5.46c-.66,0-1.13-.44-1.39-1.32l-8.66-26.57a14.32,14.32,0,0,1-.51-1.81c-.13-.6-.25-1.2-.39-1.79-.12.59-.25,1.19-.38,1.79A17.35,17.35,0,0,1,305,267l-8.82,26.54a1.53,1.53,0,0,1-1.55,1.32h-5.18l-12.69-39.19h5.41a2.28,2.28,0,0,1,1.38.43,2.07,2.07,0,0,1,.75,1l7.51,25.22c.44,1.86.78,3.62,1,5.26.23-.85.47-1.71.72-2.59s.5-1.76.79-2.67L302.6,257a2.09,2.09,0,0,1,.68-1,1.83,1.83,0,0,1,1.17-.39h3a2.08,2.08,0,0,1,1.28.39,2.13,2.13,0,0,1,.7,1l8.08,25.37c.28.91.54,1.8.77,2.67s.45,1.74.66,2.59c.13-.85.29-1.7.48-2.57s.41-1.76.64-2.69L327.71,257a2,2,0,0,1,.74-1,2.14,2.14,0,0,1,1.27-.41Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M408.82,294.81h-6.69a5.07,5.07,0,0,1-1.81-.27,4.38,4.38,0,0,1-1.51-1.12l-5.61-5.65a28,28,0,0,1-8.38,5.59,25.54,25.54,0,0,1-10.42,2.06,17.78,17.78,0,0,1-6-1,16.58,16.58,0,0,1-5.32-3,14.71,14.71,0,0,1-3.79-4.85,14.16,14.16,0,0,1-1.44-6.46,14.43,14.43,0,0,1,.91-5.12,17,17,0,0,1,2.53-4.48,21.14,21.14,0,0,1,3.83-3.67,25.82,25.82,0,0,1,4.82-2.81,24.21,24.21,0,0,1-3.48-5.82,15.7,15.7,0,0,1-1.12-5.83,13.72,13.72,0,0,1,1-5.3,12.69,12.69,0,0,1,3-4.31,14.28,14.28,0,0,1,4.7-2.9,17.1,17.1,0,0,1,6.21-1.07,15.37,15.37,0,0,1,5.57,1,14.44,14.44,0,0,1,4.34,2.61,12.68,12.68,0,0,1,2.78,3.72,11.59,11.59,0,0,1,1.22,4.46l-4.29.86c-.85.2-1.49-.2-1.9-1.21a10.33,10.33,0,0,0-.86-2.09,8.58,8.58,0,0,0-1.55-2,8,8,0,0,0-2.29-1.46,7.69,7.69,0,0,0-3.11-.59,9.75,9.75,0,0,0-3.5.62,7.85,7.85,0,0,0-2.67,1.72,7.33,7.33,0,0,0-1.68,2.6,8.72,8.72,0,0,0-.59,3.23,10.66,10.66,0,0,0,.32,2.58,10.77,10.77,0,0,0,1,2.52,18,18,0,0,0,1.73,2.59,31.61,31.61,0,0,0,2.51,2.79l16,16.28a28.81,28.81,0,0,0,2.37-5.47,27.34,27.34,0,0,0,1.15-5.66,2.09,2.09,0,0,1,.47-1.17,1.41,1.41,0,0,1,1.08-.42h4.22a29.33,29.33,0,0,1-1.39,8.72,30.94,30.94,0,0,1-3.91,8Zm-35.74-27.32a16.62,16.62,0,0,0-6.17,5.27,11.87,11.87,0,0,0-2.06,6.73,9.78,9.78,0,0,0,3.36,7.65,10,10,0,0,0,3.44,2,11.87,11.87,0,0,0,4,.67,18.33,18.33,0,0,0,7.79-1.58,19.76,19.76,0,0,0,6-4.2Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M441.32,261.7a20.31,20.31,0,0,1,5.72-4.92,14.72,14.72,0,0,1,7.43-1.85,14.33,14.33,0,0,1,6.15,1.29,12.71,12.71,0,0,1,4.68,3.83,18.44,18.44,0,0,1,3,6.29,32.07,32.07,0,0,1,1,8.62,26.62,26.62,0,0,1-1.16,8.07,19.49,19.49,0,0,1-3.34,6.46,15.51,15.51,0,0,1-12.44,5.86,14.24,14.24,0,0,1-6.17-1.22,14.69,14.69,0,0,1-4.55-3.38V308h-6.9V255.62h4.14a1.7,1.7,0,0,1,1.82,1.43Zm.34,23.67a11.06,11.06,0,0,0,4.15,3.59,11.67,11.67,0,0,0,5,1.05,9.91,9.91,0,0,0,8.44-3.9c1.95-2.61,2.94-6.33,2.94-11.15a27.37,27.37,0,0,0-.68-6.57,12.88,12.88,0,0,0-2-4.51,7.71,7.71,0,0,0-3.14-2.57,10.14,10.14,0,0,0-4.21-.82,11.12,11.12,0,0,0-5.9,1.55,17.06,17.06,0,0,0-4.67,4.37Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M477.1,261.15a22.22,22.22,0,0,1,7-4.68,21.74,21.74,0,0,1,8.32-1.54,15,15,0,0,1,5.84,1.08,12,12,0,0,1,4.29,3,12.58,12.58,0,0,1,2.63,4.67,19.39,19.39,0,0,1,.89,6v25.07H503a2.94,2.94,0,0,1-1.54-.33,2.26,2.26,0,0,1-.86-1.3l-.77-3.71a31.47,31.47,0,0,1-3,2.54,16.79,16.79,0,0,1-6.55,3,18.64,18.64,0,0,1-4.08.4,13.91,13.91,0,0,1-4.3-.63,10.08,10.08,0,0,1-3.5-1.92,8.89,8.89,0,0,1-2.36-3.23,11.27,11.27,0,0,1-.87-4.62,8.59,8.59,0,0,1,1.28-4.47,11.23,11.23,0,0,1,4.14-3.81,27.21,27.21,0,0,1,7.47-2.72,57.13,57.13,0,0,1,11.29-1.22v-3.06q0-4.56-2-6.9a7.07,7.07,0,0,0-5.76-2.35,12.14,12.14,0,0,0-4.27.65,16.47,16.47,0,0,0-3,1.42c-.84.53-1.56,1-2.17,1.43a3.12,3.12,0,0,1-1.8.65,1.88,1.88,0,0,1-1.19-.38,3.35,3.35,0,0,1-.86-.9Zm22.24,16a57.94,57.94,0,0,0-8.11.75,23.6,23.6,0,0,0-5.45,1.57,7.49,7.49,0,0,0-3,2.28,4.81,4.81,0,0,0-1,2.94,6.6,6.6,0,0,0,.5,2.67,4.71,4.71,0,0,0,1.37,1.84,5.7,5.7,0,0,0,2,1,9,9,0,0,0,2.53.33,13.91,13.91,0,0,0,3.34-.37,11.92,11.92,0,0,0,2.83-1.06,16.48,16.48,0,0,0,2.56-1.66,21.63,21.63,0,0,0,2.38-2.21Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M549.43,255.62l-21.85,50.75a3.49,3.49,0,0,1-.87,1.24,2.32,2.32,0,0,1-1.61.46H520l7.15-15.54-16.21-36.91h6a2.21,2.21,0,0,1,1.42.45,2.3,2.3,0,0,1,.71,1l10.48,24.68a26.67,26.67,0,0,1,1,3.41c.37-1.21.75-2.36,1.17-3.45L541.94,257a2.21,2.21,0,0,1,.79-1,2.13,2.13,0,0,1,1.26-.41Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M580.53,237.83v57h-6.88v-57Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M590.67,261.15a22.33,22.33,0,0,1,7-4.68,21.74,21.74,0,0,1,8.32-1.54,15,15,0,0,1,5.84,1.08,12.07,12.07,0,0,1,4.3,3,13,13,0,0,1,2.62,4.67,19.4,19.4,0,0,1,.9,6v25.07h-3.06a3,3,0,0,1-1.55-.33,2.25,2.25,0,0,1-.85-1.3l-.78-3.71a38,38,0,0,1-3,2.54,17.55,17.55,0,0,1-3.09,1.85,16.56,16.56,0,0,1-3.48,1.23,18.64,18.64,0,0,1-4.08.4,13.89,13.89,0,0,1-4.29-.63,10.08,10.08,0,0,1-3.5-1.92,8.89,8.89,0,0,1-2.36-3.23,11.27,11.27,0,0,1-.87-4.62,8.71,8.71,0,0,1,1.27-4.47,11.3,11.3,0,0,1,4.14-3.81,27.21,27.21,0,0,1,7.47-2.72,56.7,56.7,0,0,1,11.32-1.23v-3.06q0-4.56-2-6.9a7.11,7.11,0,0,0-5.76-2.35,12.23,12.23,0,0,0-4.28.65,16.47,16.47,0,0,0-3,1.42c-.83.53-1.56,1-2.16,1.43a3.12,3.12,0,0,1-1.8.65,2,2,0,0,1-1.2-.38,3.17,3.17,0,0,1-.85-.9Zm22.24,16a57.94,57.94,0,0,0-8.1.75,23.54,23.54,0,0,0-5.46,1.57,7.49,7.49,0,0,0-3,2.28,4.81,4.81,0,0,0-1,2.94,6.6,6.6,0,0,0,.5,2.67,5,5,0,0,0,1.38,1.84,5.7,5.7,0,0,0,2,1,9,9,0,0,0,2.53.33,13.83,13.83,0,0,0,3.33-.37A12.08,12.08,0,0,0,608,289.1a16.39,16.39,0,0,0,2.55-1.66,19.91,19.91,0,0,0,2.38-2.21Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M641.65,295.42c-3.09,0-5.46-.86-7.13-2.58s-2.5-4.22-2.5-7.47v-24H627.3a1.53,1.53,0,0,1-1-.37,1.38,1.38,0,0,1-.43-1.14v-2.73l6.42-.81,1.59-12.11a1.77,1.77,0,0,1,.52-1,1.51,1.51,0,0,1,1.06-.36h3.48v13.49h11.3v5h-11.3V284.9a5,5,0,0,0,1.21,3.68,4.15,4.15,0,0,0,3.09,1.2,5.38,5.38,0,0,0,1.87-.29,8.64,8.64,0,0,0,1.38-.64c.39-.23.72-.45,1-.64a1.43,1.43,0,0,1,.71-.29,1.21,1.21,0,0,1,1,.66l2,3.29a13.23,13.23,0,0,1-4.29,2.61A14.74,14.74,0,0,1,641.65,295.42Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M688.94,289.32a13.57,13.57,0,0,1-3,2.71,19.16,19.16,0,0,1-3.8,1.87,24.34,24.34,0,0,1-4.2,1.13,24.8,24.8,0,0,1-4.3.37,19.92,19.92,0,0,1-7.48-1.37,16.47,16.47,0,0,1-5.92-4,18.48,18.48,0,0,1-3.89-6.55,26.47,26.47,0,0,1-1.39-9,22.91,22.91,0,0,1,1.25-7.66,18.39,18.39,0,0,1,3.62-6.17,16.82,16.82,0,0,1,5.77-4.1,19,19,0,0,1,7.66-1.49,17.7,17.7,0,0,1,6.51,1.18,14.88,14.88,0,0,1,5.19,3.41,15.4,15.4,0,0,1,3.42,5.49,21,21,0,0,1,1.24,7.45,4.56,4.56,0,0,1-.35,2.16,1.42,1.42,0,0,1-1.31.54H661.73a22.8,22.8,0,0,0,1,6.46,13,13,0,0,0,2.54,4.59,10,10,0,0,0,3.87,2.74,13,13,0,0,0,5,.91,15,15,0,0,0,4.47-.59,22,22,0,0,0,3.23-1.3,24.05,24.05,0,0,0,2.26-1.3,3.09,3.09,0,0,1,1.57-.6,1.54,1.54,0,0,1,1.32.66Zm-5.57-18.38a13.38,13.38,0,0,0-.68-4.39,10,10,0,0,0-2-3.44,8.93,8.93,0,0,0-3.15-2.25,10.87,10.87,0,0,0-4.22-.79,10.61,10.61,0,0,0-7.83,2.88,13.49,13.49,0,0,0-3.58,8Z"/><path class="ae95fbcf-fe61-40ef-a26d-014f6fa2ede8" d="M704.55,263.47a17.85,17.85,0,0,1,4.56-6.28,10,10,0,0,1,6.62-2.26,10.59,10.59,0,0,1,2.38.27,6.1,6.1,0,0,1,2,.85l-.5,5.14a1.12,1.12,0,0,1-1.17,1,7.73,7.73,0,0,1-1.58-.23,11,11,0,0,0-2.36-.23,9.31,9.31,0,0,0-3.31.54,7.81,7.81,0,0,0-2.59,1.6,11.36,11.36,0,0,0-2.05,2.63,22.92,22.92,0,0,0-1.61,3.53v24.76H698V255.62h3.93a2.27,2.27,0,0,1,1.55.43,2.64,2.64,0,0,1,.58,1.47Z"/></svg>
                        </div>
                        <div class="loading pin-loading text-center mme-login-loading">
                            <img src="<?php echo esc_url($img.'/spinner_large.svg');?>" class="pre-loader-icon" alt="Loading.."/>
                        </div>
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <h2 class="white-text">Forgot your passcode?</h2>
                        <p class="text-center white-text">Please provide the following details</p>
                        <div id="forgot-request-status" 
                        class="mme-err-status"></div>
                        <div class="form-element">
                            <input class="inputText" type="text" placeholder="Email address" id="mme-forgot-username">
                            <span class="floating-label" for="Email">Email address</span>
                            <div class="alert alert-danger hidden" role="alert"></div>
                        </div>
                       
                        <div class="button-wrap pb-4 pt-4">
                            <button type="button" id="btn-mme-recover" class="btn button-default btn-green semi-bold btn-block btn-signup" data-toggle="modal">
                                Recover passcode
                                <svg style="width: 13px;" id="ee1a273b-8129-466d-8ea7-56abc9dac8fc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.28 13.92">
                                    <defs>
                                        <style>
                                            .aaf32895-5a89-4ae5-913b-673ab52e29e4 {
                                                fill: #000;
                                            }
                                        </style>
                                    </defs>
                                    <path id="a6e5a97d-b111-480f-92b7-6e08e755b3f3" data-name="Icon awesome-arrow-right" class="aaf32895-5a89-4ae5-913b-673ab52e29e4" d="M681.88,377.91l.71-.7a.76.76,0,0,1,1.07,0h0l6.2,6.19a.77.77,0,0,1,0,1.08h0l-6.2,6.2a.76.76,0,0,1-1.08,0h0l-.71-.71a.76.76,0,0,1,0-1.08h0l3.84-3.66h-9.16a.76.76,0,0,1-.76-.76h0v-1a.76.76,0,0,1,.76-.77h9.16L681.89,379a.77.77,0,0,1,0-1.08Z" transform="translate(-675.81 -376.98)"></path>
                                </svg>
                            </button>
                            <hr class="space" />
                            <p class="text-center white-text">Still need help? Call us on <a href="tel:1300699059" class="white-text">1300 699 059</a></p>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>
    </div>   
    
    <!--- Set passcode ----->
    <!-- User login -->
    <div id="mme-set-pass-container" class="modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"  data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="checkout-wrap login-wrap set-pass">
                        <div class="mme-logo-wrap text-center">
                            <img src="<?php echo esc_url($img.'/mme_logo-login.svg');?>" alt="MME Payment Logo">
                        </div>
                        <div class="loading pin-loading text-center mme-login-loading">
                            <img src="<?php echo esc_url($img.'/spinner_large.svg');?>" class="pre-loader-icon"/>
                        </div>
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div id="temp-pass-box">
                            <h2 class="white-text">Enter temporary passcode</h2>
                            <p class="text-center white-text">We???ve just sent you an email with a link to generate a temporary passcode that will be sent to your mobile. Please enter the code below</p>
                            <div id="mme-temp-status" class="mme-err-status"></div>
                            <hr class="space" />
                            <div class="mme-pin-wrap">              
                                <div class="mme-pin">
                                    <input type="text" class="inputPin mme-input-temp" data-pin=1 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-temp" data-pin=2 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-temp" data-pin=3 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-temp" data-pin=4 maxlength="1" />
                                    <input type="hidden" id="mme-temp-customer" value="0">
                                </div>  
                            </div>
                            
                            <div class="for-remember-wrap pt-3">
                                <hr class="space" />
                                <p class="text-center white-text"><a id="mme-resend-email" class="white-text">Click here to resend email</a>
                            
                            </div>
                        </div> 
                        <div id="new-pass-box" style="display:none">
                            <h2 class="white-text">Create new passcode</h2>
                            <p class="text-center white-text">You'll use this 4-digit passcode to log<br/> in to your account</p>
                            <div id="mme-new-status" class="mme-err-status"></div>
                            <hr class="space" />
                            <div class="mme-pin-wrap">              
                                <div class="mme-pin">
                                    <input type="text" class="inputPin mme-input-new" data-pin=1 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-new" data-pin=2 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-new" data-pin=3 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-new" data-pin=4 maxlength="1" />
                                </div>  
                            </div>
                            <hr class="space" />
                        </div>

                        <div id="confirm-pass-box" style="display:none">
                            <h2 class="white-text">Confirm new passcode</h2>
                            <p class="text-center white-text">Re-type your 4-digit passcode to confirm</p>
                            <div id="mme-confirm-status" class="mme-err-status"></div>
                            <hr class="space" />
                            <div class="mme-pin-wrap">              
                                <div class="mme-pin">
                                    <input type="text" class="inputPin mme-input-conf" data-pin=1 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-conf" data-pin=2 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-conf" data-pin=3 maxlength="1" />
                                    <input type="text" class="inputPin mme-input-conf" data-pin=4 maxlength="1" />
                                    <input type="hidden" id="mme-new-password" value="">
                                    <input type="hidden" id="mme-access-token" value="">
                                </div>  
                            </div>
                            <div class="for-remember-wrap pt-3">
                                <hr class="space" />
                                <p class="text-center"><a id="mme-btn-back" class="white-text">< Go back</a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>
    </div>                                

    <!-- SMS sent -->
    <div id="user-sms" class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"  data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-inner">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 510px;">
                    
                    <div class="payment-success-content sms-sent-content">
                        <div id="sms-content-loading">
                            <img class="animated zoomIn spinner" src="<?php echo esc_url($img.'/spinner_large.svg');?>" />
                            <h2 class="animated slideInUp deca-font">Loading the next <br>step of your application...</h2>
                            <div class="counter message animated slideInUp" style="display: none;">
                                Redirecting you in <span id="mme-seconds">3</span> seconds...
                            </div>
                        </div>
                        <div id="sms-content-continue">
                            <img class="animated fadeIn sms-logo" src="<?php echo esc_url($img.'/logo-only.svg');?>" />
                            <h2 class="animated fadeIn deca-font">Ready to complete your purchase?</h2>
                            <div class="animated fadeIn button-wrap pt-4">
                                <button class="btn button-default btn-green semi-bold btn-block btn-main-login" data-dismiss="modal" data-toggle="modal" data-target="#mme-login-container">Continue to log in
                                    <svg style="width: 13px;" id="ee1a273b-8129-466d-8ea7-56abc9dac8fc" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 14.28 13.92">
                                        <defs>
                                            <style>
                                                .aaf32895-5a89-4ae5-913b-673ab52e29e4 {
                                                    fill: #000;
                                                }
                                            </style>
                                        </defs>
                                        <path id="a6e5a97d-b111-480f-92b7-6e08e755b3f3" data-name="Icon awesome-arrow-right"
                                            class="aaf32895-5a89-4ae5-913b-673ab52e29e4"
                                            d="M681.88,377.91l.71-.7a.76.76,0,0,1,1.07,0h0l6.2,6.19a.77.77,0,0,1,0,1.08h0l-6.2,6.2a.76.76,0,0,1-1.08,0h0l-.71-.71a.76.76,0,0,1,0-1.08h0l3.84-3.66h-9.16a.76.76,0,0,1-.76-.76h0v-1a.76.76,0,0,1,.76-.77h9.16L681.89,379a.77.77,0,0,1,0-1.08Z"
                                            transform="translate(-675.81 -376.98)" />
                                    </svg>
                                </button>
                                <div class="counter message animated fadeIn">
                                    Application didn't open?<br />
                                    <a href="" id="mme_continue_link" target="_blank" class="blue-text">Click here</a> to continue
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="payment-success-overlay"></div>
                    
                    <div class="checkout-header signup-header">
                        <div class="mme-logo-wrap">
                            <img src="<?php echo esc_url($img.'/mme_logo.svg');?>" />
                        </div>
                        <div class="info-wrap">
                            <span class="help">Need help?</span> <br />
                            <a href="tel:1300435547">
                                <svg style="width: 11px;" id="a16e02dc-f08c-45b4-b6d4-d85dd92cdbc1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.4 11.15">
                                    <defs>
                                        <style>
                                            .bab3fd6c-8d69-4dcb-994a-d5095e149c25 {
                                                fill: #fff;
                                            }
                                        </style>
                                    </defs>
                                    <g id="a9007ba7-def9-4655-a7c7-675b75f7f06f" data-name="s9jls2">
                                        <g id="bed8aafb-cc8a-4404-8dde-98015372717c" data-name="Group 30">
                                            <g id="aed3fca1-a475-4d85-85b4-5d386ca8babc" data-name="Group 29">
                                                <path id="a01d098d-55d4-4012-a6cd-b512e86e991e" data-name="Path 15"
                                                    class="bab3fd6c-8d69-4dcb-994a-d5095e149c25"
                                                    d="M677.77,381.75a3.6,3.6,0,0,1,.28-1.45,3.43,3.43,0,0,1,.83-1.17c.22-.2.45-.38.68-.57a.89.89,0,0,1,.38-.18.68.68,0,0,1,.46.09,1.55,1.55,0,0,1,.48.44,7.38,7.38,0,0,1,.5.74,3.86,3.86,0,0,1,.32.56,2,2,0,0,1,.2.62,1,1,0,0,1-.26.81c-.12.13-.26.24-.38.36a4,4,0,0,1-.41.31.89.89,0,0,0-.35.48,1,1,0,0,0,0,.51,2.1,2.1,0,0,0,.26.64,7.22,7.22,0,0,0,.72,1,10.85,10.85,0,0,0,.8.86,3.79,3.79,0,0,0,.85.64,1.18,1.18,0,0,0,.55.17.79.79,0,0,0,.6-.21l.11-.1a4.29,4.29,0,0,1,.49-.46,1.33,1.33,0,0,1,.3-.23,1.08,1.08,0,0,1,.86-.09,2,2,0,0,1,.66.37l.71.59a3.33,3.33,0,0,1,.46.46,1.47,1.47,0,0,1,.24.4.65.65,0,0,1-.13.68,3.19,3.19,0,0,1-.26.26l-.44.39a3,3,0,0,1-.9.56,3.58,3.58,0,0,1-1,.25,4.13,4.13,0,0,1-.93,0,4.86,4.86,0,0,1-1.62-.55,7.33,7.33,0,0,1-1.32-.9,12,12,0,0,1-1.26-1.21c-.35-.39-.69-.8-1-1.22a9.74,9.74,0,0,1-.95-1.55,6.46,6.46,0,0,1-.47-1.34A4.49,4.49,0,0,1,677.77,381.75Z"
                                                    transform="translate(-677.77 -378.37)" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                Call us now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>
    </div>  
    <div id="mme-account-modal" class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true"  data-backdrop="false" data-modal-name="account logged in"></div> 

    <!-- Checkout payment successful -->
    <div id="app-payment-success" class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-inner">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 460px;">
                    <div class="payment-success-content app-success-content">
                        <img class="animated zoomIn sccs-pymnt-spinner" src="<?php echo esc_url($img.'/spinner_large.svg');?>" />
                        <h2 class="animated zoomIn">Confirming <br />payment...</h2>
                        <div class="counter animated zoomIn" style="display: none;">
                            Redirecting you in <span id="mme-seconds">3</span> seconds...
                        </div>
                    </div>
                    <div class="payment-success-overlay app-overlay"></div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>                                   
    </div>
    <div id="mme-passcode-updated" class="modal" id="" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-inner">
                <div class="modal-header">
                    <h5 class="modal-title" id=""></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 460px;">
                    <div class="payment-success-content app-success-content">
                        <img class="animated zoomIn" src="<?php echo esc_url($img.'/icon-check.svg');?>" alt="Check Icon" />
                        <h2 class="animated zoomIn deca-font">Passcode updated!</h2>
                        <div class="counter animated zoomIn">
                            Redirecting you in 3 seconds...
                        </div>
                    </div>
                    <div class="payment-success-overlay app-overlay"></div>
                </div>
                <div class="modal-footer hide"></div>
            </div>
        </div>                                   
    </div>
</div>
      
