@include('front.includes.header')
 <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Login</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Reset Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="wow animate__fadeIn">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-5 col-md-6 lg-padding-30px-lr md-padding-15px-lr sm-margin-40px-bottom">
                        <h6 class="alt-font font-weight-500 text-extra-dark-gray text-center">Reset Password</h6>
                        <form class="bg-light-gray padding-4-rem-all lg-margin-35px-top md-padding-2-half-rem-all" action="{{url('set_password',$uid)}}" id="reset-password-form" method="POST">
                            @csrf
                            <input type="hidden" name="action" id="action" value="reset-password">
                            
                            <label class="margin-15px-bottom">New Password <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom" type="password" id="password" name="password" placeholder="Enter your email">
                            
                            <label class="margin-15px-bottom">Confirm Password <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom" type="password" name="cpassword" id="cpassword" placeholder="Enter your password">
                            <!--<label class="margin-25px-bottom">-->
                            <!--    <input class="d-inline-block align-middle w-auto mb-0 margin-5px-right" type="checkbox" name="account">-->
                            <!--    <span class="d-inline-block align-middle">Remember me</span> -->
                            <!--</label>-->
                            <span id="reset-password-error" class="error alert-message valierror" style="display: none;"></span>
                            <button class="btn btn-medium btn-fancy btn-dark-gray w-100" type="submit" onclick="resetPassword();return false;">Submit</button>
                            {{-- <p class="text-end margin-20px-top mb-0"><a href="{{ url('signup') }}" class="btn btn-link  btn-medium text-extra-dark-gray" style="float: left;">Register</a> 
                            
                            <a href="{{ url('forget-password') }}" class="btn btn-link  btn-medium text-extra-dark-gray">Lost your password?</a></p> --}}
                        </form>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- end section -->
@include('front.includes.footer')
<script>
    function resetPassword(){
       
        // var email = jQuery("#email").val();
        // if (email == ''){
        //     jQuery('#reset-password-error').html("Please Enter E-mail");
        //     jQuery('#reset-password-error').show().delay(0).fadeIn('show');
        //     jQuery('#reset-password-error').show().delay(2000).fadeOut('show');
        //     return false;
        // }
        // var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        // if (!filter.test(email)) {
        //     jQuery('#reset-password-error').html("Please Enter Valid E-mail.");
        //     jQuery('#reset-password-error').show().delay(0).fadeIn('show');
        //     jQuery('#reset-password-error').show().delay(2000).fadeOut('show');
        //     return false;
        // }
        var password = jQuery("#password").val();
        var cpassword = jQuery("#cpassword").val();

        if (password == ''){
           
           jQuery('#reset-password-error').html("Please Enter Password");
           jQuery('#reset-password-error').show().delay(0).fadeIn('show');
           jQuery('#reset-password-error').show().delay(2000).fadeOut('show');
           return false;
       }
        if (cpassword == ''){
           
            jQuery('#reset-password-error').html("Please Enter Confirm Password");
            jQuery('#reset-password-error').show().delay(0).fadeIn('show');
            jQuery('#reset-password-error').show().delay(2000).fadeOut('show');
            return false;
        }
        if (password !== cpassword){
           
           jQuery('#reset-password-error').html("Password Doesn't Match");
           jQuery('#reset-password-error').show().delay(0).fadeIn('show');
           jQuery('#reset-password-error').show().delay(2000).fadeOut('show');
           return false;
       }
        $.ajax({
            type: 'POST',
            url: "{{ url('check-login') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "email_id": email,
                "password": password
            },
            success: function(response) {
                if (response == "0") {
                    $("#reset-password-error").html("Username Or Password is Incorrect.");
                    $('#reset-password-error').show().delay(0).fadeIn('show');
                    $('#reset-password-error').show().delay(2000).fadeOut('show');
                    $('#email').val('');
                    return false;
                }else{
                    $("#reset-password-form").submit();
                }
            }
        });
    }
</script>