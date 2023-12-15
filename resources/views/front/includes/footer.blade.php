<!-- Our Footer -->
<section class="footer-style1 at-home5 pt25 pb-0">
    <div class="container">
        <div class="row bdrb1 pb10 mb60">
            <div class="col-md-7">
                <div
                    class="d-block text-center text-md-start justify-content-center justify-content-md-start d-md-flex align-items-center mb-3 mb-md-0">
                    <a class="fz17 fw500 mr15-md mr30" href="">Terms of Service</a>
                    <a class="fz17 fw500 mr15-md mr30" href="">Privacy Policy</a>
                    <a class="fz17 fw500" href="">Site Map</a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="social-widget text-center text-md-end">
                    <div class="social-style1 light-style2">
                        <a class="me-2 fw500 fz17" href="">Follow us</a>
                        <a href=""><i class="fab fa-facebook-f list-inline-item"></i></a>
                        <a href=""><i class="fab fa-twitter list-inline-item"></i></a>
                        <a href=""><i class="fab fa-instagram list-inline-item"></i></a>
                        <a href=""><i class="fab fa-linkedin-in list-inline-item"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="link-style1 light-style at-home8 mb-4 mb-sm-5">
                    <h5 class="mb15">About</h5>
                    <div class="link-list">
                        <a href="">Careers</a>
                        <a href="">Press & News</a>
                        <a href="">Partnerships</a>
                        <a href="">Privacy Policy</a>
                        <a href="">Terms of Service</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="link-style1 light-style at-home8 mb-4 mb-sm-5">
                    <h5 class="mb15">Categories</h5>
                    <ul class="ps-0">
                        <li><a href="">Graphics & Design</a></li>
                        <li><a href="">Digital Marketing</a></li>
                        <li><a href="">Writing & Translation</a></li>
                        <li><a href="">Video & Animation</a></li>
                        <li><a href="">Music & Audio</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="link-style1 light-style at-home8 mb-4 mb-sm-5">
                    <h5 class="mb15">Support</h5>
                    <ul class="ps-0">
                        <li><a href="">Help & Support</a></li>
                        <li><a href="">Trust & Safety</a></li>
                        <li><a href="">Selling on Vendorscity</a></li>
                        <li><a href="">Buying on Vendorscity</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-widget">
                    <div class="footer-widget mb-4 mb-sm-5">
                        <div class="mailchimp-widget">
                            <h5 class="title mb20">Subscribe</h5>
                            <div class="mailchimp-style1 at-home7">
                                <input type="email" class="form-control bg-white" placeholder="Your email address">
                                <button type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="app-widget mb-4 mb-sm-5">
                <h5 class="title mb20">Apps</h5>
                <div class="row mb-4 mb-lg-5">
                  <div class="col-lg-12">
                    <a class="app-list light-style d-flex align-items-center mb10" href="">
                      <i class="fab fa-apple fz17 mr15"></i>
                      <h6 class="app-title fz15 fw400 mb-0">iOS App</h6>
                    </a>
                    <a class="app-list light-style d-flex align-items-center" href="">
                      <i class="fab fa-google-play fz15 mr15"></i>
                      <h6 class="app-title fz15 fw400 mb-0">Android App</h6>
                    </a>
                  </div>
                </div>
              </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="container bdrt1 py-4">
        <div class="row">
            <div class="col-md-6">
                <div class="text-center text-lg-start">
                    <p class="copyright-text mb-2 mb-md0 text-dark-light ff-heading">© Vendorscity. 2023 CreativeLayers.
                        All
                        rights reserved.</p>
                </div>
            </div>
            <!-- <div class="col-md-6">
            <div class="footer_bottom_right_btns at-home8 text-center text-lg-end">
              <ul class="p-0 m-0">
                <li class="list-inline-item bg-white">
                  <select class="selectpicker show-tick">
                    <option>US$ USD</option>
                    <option>Euro</option>
                    <option>Pound</option>
                  </select>
                </li>
                <li class="list-inline-item bg-white">
                  <select class="selectpicker show-tick">
                    <option>English</option>
                    <option>Frenc</option>
                    <option>Italian</option>
                    <option>Spanish</option>
                    <option>Turkey</option>
                  </select>
                </li>
              </ul>
            </div>
          </div> -->
        </div>
    </div>
</section>
<a class="scrollToHome" href="#"><i class="fas fa-angle-up"></i></a>






</div>
</div>
<!-- Wrapper End -->
<script src="{{ asset('public/site/js/jquery-3.6.4.min.js') }}"></script>
@if (Session::get('L_strsucessMessage') != '')
    <script>
        (function($) {
            $(document).on('ready', function() {
                document.getElementById('message_succsess').innerHTML =
                    "{{ Session::get('L_strsucessMessage') }}";
                setTimeout(function() {
                    $("#message_succsess").show('blind', {}, 500)
                }, 5000);
                setTimeout(function() {
                    $("#message_succsess").hide('blind', {}, 900)
                }, 9000);
            });
        })(window.jQuery);
    </script>
@endif


<script src="{{ asset('public/site/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('public/site/js/popper.min.js') }}"></script>
<script src="{{ asset('public/site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/site/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('public/site/js/jquery.mmenu.all.js') }}"></script>
<script src="{{ asset('public/site/js/ace-responsive-menu.js') }}"></script>
<script src="{{ asset('public/site/js/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('public/site/js/wow.min.js') }}"></script>
<script src="{{ asset('public/site/js/owl.js') }}"></script>
<script src="{{ asset('public/site/js/jquery.counterup.js') }}"></script>
<script src="{{ asset('public/site/js/isotop.js') }}"></script>
<!-- Custom script for all pages -->
<script src="{{ asset('public/site/js/script.js') }}"></script>

<!-- Select2 JS -->

<script src="{{ asset('public/site/js/select2.min.js') }}"></script>

<script type="text/javascript">
    function remove_to_cart(rowId) {

        var answer = window.confirm("Do you want to remove this Package from cart?");

        if (answer) {
            var url = '{{ url('cart_remove') }}';
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rowId": rowId
                },
                success: function(msg) {

                    if (msg != '') {
                        $("#message_error").html("Package Removed From Cart");
                        $('#message_error').show().delay(0).fadeIn('show');
                        $('#message_error').show().delay(2000).fadeOut('show');
                        $("#mydiv_pc").load(location.href + " #mydiv_pc");
                        //  $("#header_cart").load(location.href + " #header_cart");
                        // $("#header_cart_count").load(location.href + " #header_cart_count");
                        return false;
                    }

                }

            });
        }
    }

    function add_to_cart(package_id) {

        var qty = 1;

        $.ajax({

            type: 'POST',
            url: '{{ url('add_to_cart ') }}',
            data: {

                "_token": "{{ csrf_token() }}",
                'qty': qty,
                'package_id': package_id,

            },

            success: function(msg) {
                if (msg != 0) {
                    // $("#header_cart").load(location.href + " #header_cart");
                    // $("#header_cart_count").load(location.href + " #header_cart_count");
                    $("#message_succsess").html("Package Added To Cart");
                    $('#message_succsess').show().delay(0).fadeIn('show');
                    $('#message_succsess').show().delay(2000).fadeOut('show');
                    return false;
                }
            }
        });

    }
</script>

</body>

</html>
