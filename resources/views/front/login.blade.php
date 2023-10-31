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
                            <li>Login</li>
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
                        <h6 class="alt-font font-weight-500 text-extra-dark-gray text-center">Login</h6>
                        <form class="bg-light-gray padding-4-rem-all lg-margin-35px-top md-padding-2-half-rem-all" action="{{ route('signin') }}" id="login-form" method="POST">
                            @csrf
                            <input type="hidden" name="action" id="action" value="user-login">
                            
                            <label class="margin-15px-bottom">Username or email address <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom" type="email" id="email" name="email" placeholder="Enter your email">
                            
                            <label class="margin-15px-bottom">Password <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom" type="password" name="password" id="password" placeholder="Enter your password">
                            <!--<label class="margin-25px-bottom">-->
                            <!--    <input class="d-inline-block align-middle w-auto mb-0 margin-5px-right" type="checkbox" name="account">-->
                            <!--    <span class="d-inline-block align-middle">Remember me</span> -->
                            <!--</label>-->
                            <span id="login-error" class="error alert-message valierror" style="display: none;"></span>
                            <button class="btn btn-medium btn-fancy btn-dark-gray w-100" type="submit" onclick="loginForm();return false;">Login</button>
                            <p class="text-end margin-20px-top mb-0"><a href="{{ url('signup') }}" class="btn btn-link  btn-medium text-extra-dark-gray" style="float: left;
">Register</a> 
                            
                            <a href="{{ url('forget-password') }}" class="btn btn-link  btn-medium text-extra-dark-gray">Lost your password?</a></p>
                        </form>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- end section -->
@include('front.includes.footer')
<script>
    function loginForm(){
       
        var email = jQuery("#email").val();
        if (email == ''){
            jQuery('#login-error').html("Please Enter E-mail");
            jQuery('#login-error').show().delay(0).fadeIn('show');
            jQuery('#login-error').show().delay(2000).fadeOut('show');
            return false;
        }
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            jQuery('#login-error').html("Please Enter Valid E-mail.");
            jQuery('#login-error').show().delay(0).fadeIn('show');
            jQuery('#login-error').show().delay(2000).fadeOut('show');
            return false;
        }
        var password = jQuery("#password").val();
        if (password == ''){
           
            jQuery('#login-error').html("Please Enter Password");
            jQuery('#login-error').show().delay(0).fadeIn('show');
            jQuery('#login-error').show().delay(2000).fadeOut('show');
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
                    $("#login-error").html("Username Or Password is Incorrect.");
                    $('#login-error').show().delay(0).fadeIn('show');
                    $('#login-error').show().delay(2000).fadeOut('show');
                    $('#email').val('');
                    return false;
                }else{
                    $("#login-form").submit();
                }
            }
        });
    }
</script>