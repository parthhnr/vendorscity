@include('front.includes.header')
<section class="our-register">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto wow fadeInUp" data-wow-delay="300ms">
                <div class="main-title text-center">
                    <h2 class="title">Register</h2>
                    {{-- <p class="paragraph">Give your visitor a smooth online experience with a solid UX design</p> --}}
                </div>
            </div>
        </div>
        <form id="category_form" action="{{ route('Sign-Up.store') }}" method="POST">
            @csrf

            <div class="row wow fadeInRight" data-wow-delay="300ms">
                <div class="col-xl-6 mx-auto">
                    <div class="log-reg-form search-modal form-style1 bgc-white p50 p30-sm default-box-shadow1 bdrs12">
                        <div class="mb30">
                            <h4>Let's create your account!</h4>
                            <p class="text mt20">Already have an account? <a href="page-login.html" class="text-thm">Log
                                    In!</a></p>
                        </div>
                        <div class="mb25">
                            <label class="form-label fw500 dark-color">Name</label>
                            <input id="name" name="name" type="text" class="form-control"
                                placeholder="Enter Name">
                            <p class="form-error-text" id="name_error" style="color: red; margin-top: 10px;">
                            </p>
                        </div>
                        <div class="mb25">
                            <label class="form-label fw500 dark-color">Email</label>
                            <input id="email" name="email" type="text" class="form-control"
                                placeholder="Enter Email">
                            <p class="form-error-text" id="email_error" style="color: red; margin-top: 10px;">
                            </p>
                        </div>

                        <div class="mb15">
                            <label class="form-label fw500 dark-color">Password</label>
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="Enter Password">
                            <p class="form-error-text" id="password_error" style="color: red; margin-top: 10px;">
                            </p>
                        </div>

                        <div class="mb15">
                            <label class="form-label fw500 dark-color">Confirm-Password</label>
                            <input id="conf_password" name="conf_password" type="password" class="form-control"
                                placeholder="Enter Confirm-Password">
                            <p class="form-error-text" id="conf_password_error" style="color: red; margin-top: 10px;">
                            </p>
                        </div>

                        <div class="mb15">
                            <label class="form-label fw500 dark-color">Mobile</label>
                            <input id="mobile" name="mobile" type="text" class="form-control"
                                placeholder="Enter Mobile Number" onkeypress="return validateNumber(event)">
                            <p class="form-error-text" id="mobile_error" style="color: red; margin-top: 10px;">
                            </p>
                        </div>

                        <div class="d-grid mb20">
                            <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                style="display: none;">

                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

                                Loading...

                            </button>
                            <button type="button" class="ud-btn btn-thm default-box-shadow2"
                                onclick="javascript:category_validation()" id="submit_button">Submit</button>

                            {{-- <button class="ud-btn btn-thm default-box-shadow2" type="button">Submit
                            <i class="fal fa-arrow-right-long"></i>
                        </button> --}}
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@include('front.includes.footer')


<script>
    function category_validation() {

        var name = jQuery("#name").val();

        if (name == '') {
            jQuery('#name_error').html("Please Enter Name");
            jQuery('#name_error').show().delay(0).fadeIn('show');
            jQuery('#name_error').show().delay(2000).fadeOut('show');
            $('html, body').animate({
                scrollTop: $('#name').offset().top - 150
            }, 1000);
            return false;
        }

        var email = jQuery("#email").val();

        if (email == '') {
            jQuery('#email_error').html("Please Enter Email");
            jQuery('#email_error').show().delay(0).fadeIn('show');
            jQuery('#email_error').show().delay(2000).fadeOut('show');
            $('html, body').animate({
                scrollTop: $('#email').offset().top - 150
            }, 1000);
            return false;
        }



        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email)) {

            jQuery('#email_error').html("Please Enter Valid Email");
            jQuery('#email_error').show().delay(0).fadeIn('show');
            jQuery('#email_error').show().delay(2000).fadeOut('show');
            $('html, body').animate({
                scrollTop: $('#email').offset().top - 150
            }, 1000);
            return false;

        }

        var url = '{{ url('registration_mail_check') }}';

        $.ajax({
            url: url,
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "email": email
            },
            success: function(msg) {
                if (msg == 1) {
                    jQuery('#email_error').html("Email Address Already Exists");
                    jQuery('#email_error').show().delay(0).fadeIn('show');
                    jQuery('#email_error').show().delay(2000).fadeOut('show');
                    $('html, body').animate({
                        scrollTop: $('#email').offset().top - 150
                    }, 1000);
                    return false;

                } else {



                    var password = jQuery("#password").val();
                    if (password == '') {

                        jQuery('#password_error').html("Please Enter Password");
                        jQuery('#password_error').show().delay(0).fadeIn('show');
                        jQuery('#password_error').show().delay(2000).fadeOut('show');
                        $('html, body').animate({
                            scrollTop: $('#password').offset().top - 150
                        }, 1000);
                        return false;

                    }

                    var conf_password = jQuery("#conf_password").val();

                    if (conf_password == '') {

                        jQuery('#conf_password_error').html("Please Enter Confirm-Password");
                        jQuery('#conf_password_error').show().delay(0).fadeIn('show');
                        jQuery('#conf_password_error').show().delay(2000).fadeOut('show');
                        $('html, body').animate({
                            scrollTop: $('#conf_password').offset().top - 150
                        }, 1000);
                        return false;

                    }
                    if (conf_password != password) {

                        jQuery('#conf_password_error').html(
                            "Confirm Password Doesn't Match Password");
                        jQuery('#conf_password_error').show().delay(0).fadeIn('show');
                        jQuery('#conf_password_error').show().delay(2000).fadeOut('show');
                        $('html, body').animate({
                            scrollTop: $('#conf_password').offset().top - 150
                        }, 1000);
                        return false;

                    }

                    var mobile = jQuery("#mobile").val();
                    if (mobile == '') {

                        jQuery('#mobile_error').html("Please Enter Mobile");
                        jQuery('#mobile_error').show().delay(0).fadeIn('show');
                        jQuery('#mobile_error').show().delay(2000).fadeOut('show');
                        $('html, body').animate({
                            scrollTop: $('#mobile').offset().top - 150
                        }, 1000);
                        return false;

                    }
                    var filter = /^\d{10}$/;
                    if (!filter.test(mobile)) {

                        jQuery('#mobile_error').html("Please Enter Valid Mobile");
                        jQuery('#mobile_error').show().delay(0).fadeIn('show');
                        jQuery('#mobile_error').show().delay(2000).fadeOut('show');
                        $('html, body').animate({
                            scrollTop: $('#mobile').offset().top - 150
                        }, 1000);
                        return false;

                    }

                    $('#spinner_button').show();

                    $('#submit_button').hide();

                    $('#category_form').submit();

                }
            }
        });
    }

    function validateNumber(event) {

        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode === 8 || event.keyCode === 46) {

            return true;

        } else if (key < 48 || key > 57) {

            return false;

        } else {

            return true;

        }

    }
</script>
