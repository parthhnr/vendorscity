@include('front.includes.header')
 <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Register</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Register</li>
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
                   
                    <div class="col-12 col-xl-5 offset-xl-1 col-md-6 lg-padding-30px-lr md-padding-15px-lr">
                        <h6 class="alt-font font-weight-500 text-extra-dark-gray text-center">Register</h6>
                        <form id="register-form" class="border-all border-color-medium-gray padding-4-rem-all lg-margin-35px-top md-padding-2-half-rem-all" action="{{ route('signup') }}" method="POST">
                            @csrf
                            <input type="hidden" name="action" id="action" value="user-register">
                            <label class="margin-15px-bottom">Username <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom " type="text" name="username" id="username" placeholder="Enter your username">

                            <label class="margin-15px-bottom">Email address <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom" type="email" name="email" id="email" placeholder="Enter your email">
                            
                             <label class="margin-15px-bottom">Mobile Number <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom" type="mobile" name="mobile" id="mobile" placeholder="Enter your Mobile Number">

                            <label class="margin-15px-bottom">Password <span class="required-error text-radical-red">*</span></label>
                            <input class="small-input bg-white margin-20px-bottom" type="password" name="password" id="password" placeholder="Enter your password">
                            
                            <p class="text-small">Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#" class="text-decoration-underline">privacy policy</a>.</p>

                            <span id="register-error" class="error alert-message valierror" style="display: none;"></span>
                            <button class="btn btn-medium btn-fancy btn-dark-gray w-100" type="submit" onclick="registerForm();return false;">Register</button>
                            
                            <p class="text-end margin-20px-top mb-0"><a href="{{ url('signin') }}" class="btn btn-link  btn-medium text-extra-dark-gray" style="float: left;
">Login</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
@include('front.includes.footer')
<script>
    function registerForm(){

        var username = jQuery("#username").val();
        if (username == ''){
           
            jQuery('#register-error').html("Please Enter Usename");
            jQuery('#register-error').show().delay(0).fadeIn('show');
            jQuery('#register-error').show().delay(2000).fadeOut('show');
            return false;
        }

        var email = jQuery("#email").val();
        if (email == ''){
            jQuery('#register-error').html("Please Enter E-mail");
            jQuery('#register-error').show().delay(0).fadeIn('show');
            jQuery('#register-error').show().delay(2000).fadeOut('show');
            return false;
        }

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            jQuery('#register-error').html("Please Enter Valid E-mail.");
            jQuery('#register-error').show().delay(0).fadeIn('show');
            jQuery('#register-error').show().delay(2000).fadeOut('show');
            return false;
        }
        
        var mobile = jQuery("#mobile").val();
        if (mobile == ''){
            jQuery('#register-error').html("Please Enter Mobile Number");
            jQuery('#register-error').show().delay(0).fadeIn('show');
            jQuery('#register-error').show().delay(2000).fadeOut('show');
            return false;
        }
        
        var ph = jQuery('#mobile').val();
        var filter = /^\d{10}$/;
        if (!filter.test(ph)) {
            
            jQuery('#register-error').html("Enter Valid Mobile Number");
            jQuery('#register-error').show().delay(0).fadeIn('show');
            jQuery('#register-error').show().delay(2000).fadeOut('show');
            return false;
            
        }

        var password = jQuery("#password").val();
        if (password == ''){
           
            jQuery('#register-error').html("Please Enter Password");
            jQuery('#register-error').show().delay(0).fadeIn('show');
            jQuery('#register-error').show().delay(2000).fadeOut('show');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: "{{ url('checkmail') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "email_id": email
            },
            success: function(msg) {
                // alert(msg);
                if (msg == "0") {
                    $("#register-error").html("Email Address Already Exists.");
                    $('#register-error').show().delay(0).fadeIn('show');
                    $('#register-error').show().delay(2000).fadeOut('show');
                    $('#email').val('');
                    return false;
                }else{
                    $("#register-form").submit();
                }
            }
        });
        
    }
    $('#mobile').keyup(function () {
         this.value = this.value.replace(/[^0-9\.]/g,'');
      });
    
</script>