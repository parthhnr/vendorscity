@include('front.includes.header')
<!-- Shop Cart Area -->
<section class="pt40 pb0">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="main-title">
          <h2 class="title">Shop Checkout</h2>
          <!-- <p class="text mb-0">Give your visitor a smooth online experience with a solid UX design</p> -->
        </div>
      </div>
    </div>
  </div>
</section>

@php

  //echo "<pre>";print_r(Session::get('user'));echo "</pre>";

  $userdata = Session::get('user');

  if($userdata != ''){
      $login_style = 'display:none';
      $form_sec = 'display:block';
  }else{
      $login_style = 'display:block';
      $form_sec = 'display:none';

  }
  @endphp

<section class="our-login" style="padding-top: 0; {{$login_style}}" >
  <div class="container">
     
      <form action="{{ route('user_login') }}" id="category_form" method="post">
          @csrf
          <div class="row wow fadeInRight" data-wow-delay="300ms">
              <div class="col-xl-6 mx-auto">
                  <div
                      class="log-reg-form search-modal form-style1 bgc-white p50 p30-sm default-box-shadow1 bdrs12">
                      <div class="mb30">
                          {{-- <h4>We're glad to see you again!</h4> --}}
                          {{-- <p class="text">Don't have an account? <a href="{{ url('Sign-Up') }}"
                                  class="text-thm">Sign
                                  Up!</a></p> --}}
                      </div>
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


                  </div>
              </div>
          </div>
      </form>
  </div>
</section>

<section class="shop-checkout pt-0" style="{{$form_sec}}">
  <div class="container">
    @if(Cart::count() > 0)
    <form class="checkout-form" id="addressForm" name="addressForm" method="POST" action="{{ route('order_place') }}">
      @csrf
    <div class="row wow fadeInUp" data-wow-delay="300ms">
      
      <div class="col-md-7 col-lg-8">
        <div class="shopping_cart_table table-responsive">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th class="pl30" scope="col">Package</th>
                <th class="ps-0" scope="col">Price</th>
                <th class="ps-0" scope="col">Quantity</th>
                <th class="ps-0" scope="col">Subtotal</th>
                
              </tr>
            </thead>
            <tbody class="table_body">
              @php
                  $subtotal = 0;
              @endphp
              @foreach(Cart::content() as $items)
              <tr>
                <td class="pl30 ">
                  <div class="cart_list d-flex align-items-center">
                    <div class="cart-img">
                      @if($items->options->image)
                          <a href="{{ url('package-detail/' . $items->options->page_url) }}"><img src="{{ asset('public/upload/packages/large/' .$items->options->image) }}" alt="cart-1.png" width="60px" height="74px"></a>
                      @else
                          <a href="{{ url('package-detail/' . $items->options->page_url) }}"><img src="images/shop/cart-1.png" alt="cart-1.png"></a>
                      @endif
                  </div>
                    <a href="{{ url('package-detail/' . $items->options->page_url) }}"><h5 class="mb-0">{{$items->name}}</h5></a>
                  </div>
                </td>

                @php

                  if($items->options->discount_type != ''){
                      if($items->options->discount_type == 0){ //percentage
                          $disc_price_new = $items->price * $items->options->discount /100 ;

                          $disc_price = $items->price - $disc_price_new;

                          $p_price = $disc_price;
                      }elseif($items->options->discount_type == 1){
                          $disc_price = $items->price - $items->options->discount;
                          $p_price = $disc_price;
                      }else{
                          $disc_price = '0';
                          $p_price = $items->price;
                      }

                  }else{
                      $disc_price = '0';
                  }

               @endphp

                <td>
                  <div class="cart-price">
                      @if($disc_price != '0')
                          <del>AED {{ round($items->price) }}</del>
                          AED {{ round($disc_price)}}
                          @else
                             AED {{ round($items->price)}}
                          @endif
                            
                  </div>
            </td>

                

                <td>
                  <div class="cart-quantity">
                   <!--  <div class="quantity-block">
                      <button class="quantity-arrow-minus"> <span class="fa fa-minus"></span> </button>
                      <input class="quantity-num" type="number" value="12" />
                      <button class="quantity-arrow-plus"> <span class="fas fa-plus"></span> </button>
                    </div> -->

                    <input class="quantity-num" type="number" value="{{$items->qty}}" readonly />
                  </div>
                  <!-- <input class="cart_count text-center" placeholder="2" type="number"> -->
                </td>
                <td>
                  <div class="cart-subtotal pl5">
                      @php
                          if($disc_price != '0'){
                              $price_tot = round($disc_price);
                          }else{
                              $price_tot = round($items->price);
                          }

                      @endphp
                         AED {{$price_tot * $items->qty}}
                      
                  </div>
                  </td>
                
              </tr>


                      @php

                      if($items->qty >= 1){
                          $subtotal += $items->qty * round($p_price);
                      }else{
                          $subtotal += round($p_price);
                      }

                      

                  @endphp
              @endforeach
              
            </tbody>
          </table>
         
        </div>
      </div>
      <div class="col-md-5 col-lg-4">
        <div class="shop-sidebar ms-md-auto">
          <div class="order_sidebar_widget mb30 default-box-shadow1">
            <h4 class="title">Your Order</h4>
            <ul class="p-0 mb-0">
              <li class="bdrb1 mb20"><h6>Package <span class="float-end">Subtotal</span></h6></li>
              @if(Cart::count() > 0)
                @php
                    $subtotal = 0;
                @endphp

                @foreach(Cart::content() as $items)

                @php

                    if($items->options->discount_type != ''){
                        if($items->options->discount_type == 0){ //percentage
                            $disc_price_new = $items->price * $items->options->discount /100 ;

                            $disc_price = $items->price - $disc_price_new;

                            $p_price = $disc_price;
                        }elseif($items->options->discount_type == 1){
                            $disc_price = $items->price - $items->options->discount;
                            $p_price = $disc_price;
                        }else{
                            $disc_price = '0';
                            $p_price = $items->price;
                        }

                    }else{
                        $disc_price = '0';
                    }

                    

                 @endphp

                  @php
                  if($disc_price != '0'){
                      $price_tot = round($disc_price);
                  }else{
                      $price_tot = round($items->price);
                  }
                  @endphp
                  <li class="mb20"><p class="body-color">{{$items->name}} x{{$items->qty}} <span class="float-end">AED {{$price_tot * $items->qty}}</span></p></li>


                  @php
                    if($items->qty >= 1){
                        $subtotal += $items->qty * round($p_price);
                    }else{
                        $subtotal += round($p_price);
                    }
                  @endphp

                @endforeach
              @endif

              @php
              $sub_total_round = round($subtotal);

              $coupon_discounted = 0;   
                                        
              if(session('coupan_data.discount') !='' && session('coupan_data.coupanvalue') == 0 ){

                  $coupon_discounted = round(($subtotal * session('coupan_data.discount'))/100);

              }

              if(session('coupan_data.discount') !='' && session('coupan_data.coupanvalue') == 1 ){ 

                  $coupon_discounted = session('coupan_data.discount');

              }
              $shippingcahrge = 0;

              $vatcharge = round(($subtotal * 5)/100);
             // $vatcharge = 10;

              $order_total=round($sub_total_round  - $coupon_discounted + $shippingcahrge + $vatcharge );

                session(['subtotal' => $sub_total_round]);
                session(['shippingcahrge' => $shippingcahrge]);
                session(['order_total' => $order_total]);
                session(['vatcharge' => $vatcharge]);
              @endphp

              
              {{-- <li class="mb20"><p class="body-color">Seo Books x 1 <span class="float-end">$67.00</span></p></li> --}}
              <li class=" bdrb1 mb15"><h6>Subtotal <span class="float-end">AED {{ $sub_total_round }}</span></h6></li>
              @if($shippingcahrge > 0)
              <li class=" bdrb1 mb15"><h6>Shipping <span class="float-end">AED {{ $shippingcahrge }}</span></h6></li>
              @endif

              @if($vatcharge > 0)
              <li class=" bdrb1 mb15"><h6>VAT 5%<span class="float-end">AED {{ $vatcharge }}</span></h6></li>
              @endif
              <li><h6>Total <span class="float-end">AED {{ $order_total }}</span></h6></li>
            </ul>
          </div>
          <div class="payment_widget default-box-shadow1">
            <h4 class="title">Payment</h4>
            <div class="radio-element">
              {{-- <div class="form-check d-flex align-items-center mb15">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked="checked">
                <label class="form-check-label" for="flexRadioDefault1">Direct bank transfer</label>
              </div>
              <div class="pw-details">
                <p class="fz13 mb30">Make your payment directly into our bank account. Please use your Order ID as the payment reference.Your order will not be shipped until the funds have cleared in our account.</p>
              </div> --}}
              <div class="form-check d-flex align-items-center mb15">
                <input class="form-check-input" type="radio" name="payment_method" id="payment_type" value="1">
                <label class="form-check-label" for="payment_type">Cash on delivery</label>
              </div>
              <div class="form-check d-flex align-items-center mb15">
                <input class="form-check-input" type="radio" name="payment_method" id="payment_type2" value="2">
                <label class="form-check-label" for="payment_type2">Online</label>
              </div>

              <p class="form-error-text" id="payment_error" style="color: red;"></p>
              {{-- <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                <label class="form-check-label" for="flexRadioDefault4">PayPal</label>
              </div> --}}
            </div>
          </div>
          <div class="d-grid default-box-shadow2">
            <button class="ud-btn btn-thm" type="button" onclick="place_order();">Place Order<i class="fal fa-arrow-right-long"></i></button>
          </div>
        </div>
      </div>
     
    </div>
  </form>
    @else
      <p>No Package in Checkout</p>
    @endif
  </div>
</section>
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

  function place_order(){
    var payment_method = $("input[name='payment_method']:checked").val();  
    if(payment_method == '' || payment_method == undefined){
        $("#payment_error").html("Please Select Payment method.");
        $('#payment_error').show().delay(0).fadeIn('show');
        $('#payment_error').show().delay(2000).fadeOut('show');
        return false;
    }

    $('#addressForm').submit();
  }
</script>
