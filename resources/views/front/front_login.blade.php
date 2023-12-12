@include('front.includes.header')
<div class="body_content">
    <!-- Our LogIn Area -->
    <section class="our-login">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto wow fadeInUp" data-wow-delay="300ms">
                    <div class="main-title text-center">
                        <h2 class="title">Log In</h2>

                    </div>
                </div>
            </div>
            <form action="{{ route('user_login') }}" id="category_form" method="post">
                @csrf
                <div class="row wow fadeInRight" data-wow-delay="300ms">
                    <div class="col-xl-6 mx-auto">
                        <div
                            class="log-reg-form search-modal form-style1 bgc-white p50 p30-sm default-box-shadow1 bdrs12">
                            {{-- <div class="mb30">
                                <h4>We're glad to see you again!</h4>
                                <p class="text">Don't have an account? <a href="{{ url('Sign-Up') }}"
                                        class="text-thm">Sign
                                        Up!</a></p>
                            </div> --}}
                            <div class="mb20">
                                <label class="form-label fw600 dark-color">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Enter Email Address">
                                <p class="form-error-text" id="email_error" style="color: red; margin-top: 10px;">
                                </p>
                            </div>
                            <div class="mb15">
                                <label class="form-label fw600 dark-color">Password</label>
                                <input type="password"id="password" name="password" class="form-control"
                                    placeholder="Enter Password">
                                <p class="form-error-text" id="password_error" style="color: red; margin-top: 10px;">
                                </p>
                            </div>
                            <span id="contact_error_login" class="error alert-message valierror "
                                style="display: none;"></span>
                            <div
                                class="checkbox-style1 d-block d-sm-flex align-items-center justify-content-between mb20">
                                <label class="custom_checkbox fz14 ff-heading">Remember me
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <a class="fz14 ff-heading" href="{{ url('forget-password') }}">Lost your password?</a>
                            </div>
                            <div class="d-grid mb20">
                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">

                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>

                                    Loading...

                                </button>
                                <button type="button" class="ud-btn btn-thm" onclick="javascript:category_validation()"
                                    id="submit_button">Submit</button>

                            </div>

                            <div class="mb30">
                                {{-- <h4>We're glad to see you again!</h4> --}}
                                <p class="text">Don't have an account? <a href="{{ url('Sign-Up') }}"
                                        class="text-thm">Sign
                                        Up!</a></p>
                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>


@include('front.includes.footer')

<script>
    function category_validation() {

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

        $.ajax({
            type: "post",
            url: "{{ url('check_login') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "email": email,
                "password": password,

            },
            success: function(returndata) {
                if (returndata == 1) {

                    $('#spinner_button').show();

                    $('#submit_button').hide();

                    $('#category_form').submit();

                } else if (returndata == 2) {
                    // Code for status not equal to 1
                    $('#contact_error_login').html("Account is not active.");
                    $('#contact_error_login').show().delay(2000).fadeOut('show');
                    return false;
                } else {
                    jQuery('#contact_error_login').html(" Email OR Password Not Valid ");
                    jQuery('#contact_error_login').show().delay(0).fadeIn('show');
                    jQuery('#contact_error_login').show().delay(2000).fadeOut('show');
                    return false;

                }



            }
        });




    }
</script>
