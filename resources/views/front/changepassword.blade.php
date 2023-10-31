@include('front.includes.header')
<!-- start page title -->
<section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-xl-8 col-lg-6">
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Change Password</h1>
            </div>
            <div
                class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                <ul class="xs-text-center">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Change Password</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
<!-- start section -->
<section class="wow animate__fadeIn orders_ss">
    <div class="container-fluid">
        <div class="row flex-drc">
            <div class="col-lg-9">
                <!--NSP TITLE SECTION START-->
                <div class="SS_title_section">
                    <h4>Change Password</h4>
                </div>
                <!--NSP TITLE SECTION START-->
                <!--MY PURCHASES SECTION START-->
                <div class="my_purchases_box_section">
                    <div class="custom-back-g-white">
                        <div class="col-lg-10">
                            <form role="form" id="changepassword" method="post" action="{{ route('update-password') }}">
                                @csrf
                                 <input type="hidden" name="action" value="reset-password">

                                <input type="hidden" name="uid" id="uid" value="{{ Session::get('userdata')['userid']}}">
                                {{--
                                <input type="hidden" name="_token" value="3peFe8tn9LUDQbCiWcl6sikEbaiKTglf3YYX0cop"> --}}
                                <div class="row">
                                    <!-- <div class="col-lg-12 mb-20">
                                        <div class="custom-inner-form-title">
                                            <h4>Personal Information</h4>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12 mb-20">
                                        <div class="contact-form-fields">
                                            <label for="old_pass">Old Password</label>
                                            <input type="text" name="old_pass" id="old_pass" placeholder="Enter Your Old Password" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-20">
                                        <div class="contact-form-fields">
                                            <label for="new_pass">New Password</label>
                                            <input type="text" name="new_pass" id="new_pass" placeholder="Enter Your New Password" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="contact-form-fields">
                                            <label for="conf_pass">Confirm Password</label>
                                            <input type="text" name="conf_pass" id="conf_pass" placeholder="Enter Your Confirm Password" value="">
                                        </div>
                                    </div>
                                    <span id="validation_error" class="error alert-message valierror"
                                        style="display: none;"></span>
                                    
                                    
                                    
                                    
                                    
                                    <!-- <div class="clearfix"></div> -->

                                    <div class="col-box6 mb-20">
                                        <div class="form-fields-button">
                                            <button type="button" onClick="javascript:change_pass_vali(); return false;" class="form-field-button update-btn">Update
                                                Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--  -->
                </div>
                <!--MY PURCHASES SECTION CLOSE-->
            </div>
            <div class="col-lg-3">
                @include('front.sidebar')
            </div>
        </div>
    </div>
</section>
<!-- end section -->
@include('front.includes.footer')

<script type="text/javascript">
    function change_pass_vali(){

        var old_pass = jQuery("#old_pass").val();
        if (old_pass == '') {
            jQuery('#validation_error').html("Please Enter Old Password");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: "{{ url('check-login') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "email_id": "{{ Session::get('userdata')['email']}}",
                "password": old_pass
            },
            success: function(response) {
                if (response == "0") {
                    $("#validation_error").html("Please Enter Correct Old Password");
                    $('#validation_error').show().delay(0).fadeIn('show');
                    $('#validation_error').show().delay(2000).fadeOut('show');
                    // $('#email').val('');
                    return false;
                }else{

                    var new_pass = jQuery("#new_pass").val();
                    if (new_pass == '') {
                        jQuery('#validation_error').html("Please Enter New Password");
                        jQuery('#validation_error').show().delay(0).fadeIn('show');
                        jQuery('#validation_error').show().delay(2000).fadeOut('show');
                        return false;
                    }

                    var conf_pass = jQuery("#conf_pass").val();
                    if (conf_pass == '') {
                        jQuery('#validation_error').html("Please Enter Confirm Password");
                        jQuery('#validation_error').show().delay(0).fadeIn('show');
                        jQuery('#validation_error').show().delay(2000).fadeOut('show');
                        return false;
                    }

                    if(new_pass != conf_pass){
                        jQuery('#validation_error').html("New Password & Confirm Password doesn't Match");
                        jQuery('#validation_error').show().delay(0).fadeIn('show');
                        jQuery('#validation_error').show().delay(2000).fadeOut('show');
                        return false;
                    }

                    // alert('test');
                    $("#changepassword").submit();
                }
            }
        });
    }
</script>
