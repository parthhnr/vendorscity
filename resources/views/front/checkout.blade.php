@include('front.includes.header')
 <!-- start page title -->
        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Checkout</h1>
                    </div>
                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                        <ul class="xs-text-center">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('product-listing')}}">Shop</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="wow animate__fadeIn checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12" id="accordion1">
                        
                        <!-- <div class="d-sm-flex justify-content-center align-items-center padding-10px-bottom text-center">
                            <i class="feather icon-feather-user text-fast-blue margin-10px-right"></i>
                            <span class="text-extra-dark-gray alt-font">Returning customer?&nbsp;</span><a class="accordion-toggle text-extra-dark-gray text-decoration-underline" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#collapseOne"><span class="alt-font">Click here to login</span></a>
                        </div> -->
                       
                    </div>
                    
                </div>
            </div>
        </section>

        @php

        //echo "<pre>";print_r(Session::get('userdata'));echo "</pre>";

        $userdata = Session::get('userdata');

        if($userdata != ''){
           $login_style = 'display:none';
           $form_sec = 'display:block';
        }else{
           $login_style = 'display:block';
           $form_sec = 'display:none';

        }
        @endphp
        <!-- end section -->
        <!-- start section -->

         <section class="pt-0 wow animate__fadeIn" style="{{$login_style}}">

            
            <div class="container">
                <div class="row">

                    <div class="col-12 col-lg-7 col-md-6 padding-70px-right lg-padding-40px-right md-padding-15px-right" >

                        <form class="bg-light-gray padding-4-rem-all lg-margin-35px-top md-padding-2-half-rem-all" action="{{ route('signin') }}" id="login-form" method="POST">
                            @csrf
                            <input type="hidden" name="action" id="action" value="user-login">

                    <div class="col-md-12" id="accordion1">
                        <!--start tab content -->
                        <div class="d-sm-flex justify-content-center align-items-center padding-10px-bottom text-center">
                            <i class="feather icon-feather-user text-fast-blue margin-10px-right"></i>
                            <span class="text-extra-dark-gray alt-font">Login For Order</span>
                        </div>
                        <div>
                            <div class=" mx-auto margin-4-half-rem-tb text-start lg-w-50 sm-w-100">
                                <p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the billing section.</p>
                                <div class="row margin-10px-bottom text-start">
                                    <div class="col-6">
                                        <label class="margin-15px-bottom">Email <span class="text-radical-red">*</span></label>
                                        <input class="small-input" type="email" id="email" name="email" placeholder="Enter your email">
                                    </div>
                                    <div class="col-6">
                                        <label class="margin-15px-bottom">Password <span class="text-radical-red">*</span></label>
                                        <input class="small-input" type="password" name="password" id="password" placeholder="Enter your password">
                                    </div>
                                </div>

                                <span id="login-error" class="error alert-message valierror" style="display: none;"></span>
                                
                                <a href="javascript:void(0)" class="btn btn-medium btn-dark-gray d-block margin-20px-bottom" onclick="login_validation();return false;">Login</a>
                                <p class="text-end"><a href="{{ url('forget-password') }}" class="btn btn-link  btn-medium text-extra-dark-gray margin-20px-bottom">Lost your password?</a></p>
                            </div>
                        </div>
                    </div>
                </form>
                </div>

                     @if(Cart::count() > 0)
                    <div class="col-12 col-lg-5 col-md-6">
                        <div class="bg-light-gray padding-45px-all lg-padding-30px-all sm-padding-20px-all">
                            <span class="alt-font text-large text-extra-dark-gray margin-25px-bottom d-inline-block font-weight-500">Your order</span>
                            <table class="total-price-table checkout-total-price-table">
                                <thead class="border-bottom border-color-medium-gray text-extra-dark-gray">
                                    <tr>
                                        <th class="product-name font-weight-500 w-60">Product</th>
                                        <th class="product-total pe-0 font-weight-500">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @php
                                            $subtotal = 0;
                                        @endphp

                                    @foreach(Cart::content() as $items)

                                    <tr>
                                        <td>{{$items->name}} × {{$items->qty}}<span class="d-block w-100">Size:{{$items->options->size_name}}</span>
                                            <span class="d-block w-100">Colour:{{$items->options->color_name}}</span>
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

                                        <td>&#8377;{{$items->qty * $p_price}}</td>
                                    </tr>
                                        @php

                                        if($items->qty >= 1){
                                            $subtotal += $items->qty * round($p_price);
                                        }else{
                                            $subtotal += round($p_price);
                                        }

                                        

                                        @endphp
                                    @endforeach
                                    <!-- <tr>
                                        <td>Tennis Shorts - White × 1<span class="d-block w-100">Size:M</span></td>
                                        <td>&#8377;2599</td>
                                    </tr>
                                    <tr>
                                        <td>Cashmere Sweater × 1<span class="d-block w-100">Size:S</span></td>
                                        <td>&#8377;1000</td>
                                    </tr> -->
                                    <tr>
                                        <th class="font-weight-500 text-extra-dark-gray">Subtotal</th>
                                        <td class="text-extra-dark-gray">&#8377;{{$subtotal}}</td>
                                    </tr>

                                    @php
                                        //echo '<pre>';print_r(session('coupan_data'));echo"</pre>";

                                    $coupon_discounted = 0;   
                                        
                                    if(session('coupan_data.discount') !='' && session('coupan_data.coupanvalue') == 0 ){

                                        $coupon_discounted = round(($subtotal * session('coupan_data.discount'))/100);

                                    }

                                    if(session('coupan_data.discount') !='' && session('coupan_data.coupanvalue') == 1 ){ 

                                        $coupon_discounted = session('coupan_data.discount');

                                     }

                                     $shippingcahrge = session('shippingcahrge');

                                    $order_total=round($subtotal  - $coupon_discounted + $shippingcahrge );

                                    session(['order_total' => $order_total]);

                                    @endphp 


                                    <tr>
                                        <th class="font-weight-500 text-extra-dark-gray">Discount</th>
                                        <td class="text-extra-dark-gray">&#8377;{{$coupon_discounted}}</td>
                                    </tr>

                                    <tr class="shipping">
                                        <th class="font-weight-500 text-extra-dark-gray">Shipping</th>
                                        <td class="text-extra-dark-gray">&#8377;{{$shippingcahrge}}</td>
                                    </tr>
                                    <tr class="total-amount">
                                        <th class="font-weight-500 text-extra-dark-gray">Total</th>
                                        <td>
                                            <h6 class="d-block font-weight-500 mb-0 text-extra-dark-gray">&#8377;{{$order_total}}</h6>
                                            <!-- <span class="text-small">(Includes &#8377;199 tax)</span> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="padding-40px-all bg-white box-shadow-large margin-20px-top margin-40px-bottom checkout-accordion lg-padding-30px-all md-padding-20px-all sm-padding-15px-lr">
                                <div class="w-100" id="accordion-style-05">
                                 
                                    <div id="style-5-collapse-2" class="collapse collapse" data-bs-parent="#accordion-style-05">
                                        <div class="padding-30px-all text-small bg-light-gray margin-20px-tb sm-padding-20px-lr sm-padding-25px-tb">Please send a check to store name, store street, store town, store state / county, store postcode.</div>
                                    </div>
                                    
                                    <div class="heading active-accordion">
                                        <label class="margin-5px-bottom">
                                            <input class="d-inline w-auto margin-10px-right mb-0" type="radio" name="payment_method" value="1">
                                            <span class="d-inline-block">Cash on delivery</span>
                                            <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-style-05" href="#style-5-collapse-3"></a>
                                        </label>
                                    </div>
                                    
                                    <div id="style-5-collapse-4" class="collapse collapse" data-bs-parent="#accordion-style-05">
                                        <div class="padding-30px-all text-small bg-light-gray margin-20px-tb sm-padding-20px-lr sm-padding-25px-tb">You can pay with your credit card if you don’t have a PayPal account.</div>
                                    </div>
                                   
                                </div>
                            </div>
                            
                            <p class="text-small">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a class="text-decoration-underline" href="#">privacy policy.</a></p>
                            <!-- <p class="d-flex align-items-center">
                                <input class="d-inline w-auto mb-0 margin-10px-right" type="checkbox" name="terms-and-condition">
                                <span class="text-small">I have read and agree to the website <a class="text-decoration-underline" href="#">terms and conditions</a><span class="text-red ms-1">*</span></span>
                            </p> -->
                            @if($userdata != '')
                            <button type="button" onclick="place_order();" class="btn btn-fancy btn-dark-gray btn-extra-large w-100 margin-15px-top">Place order</button>
                            @else
                            <button type="button" class="btn btn-fancy btn-dark-gray btn-extra-large w-100 margin-15px-top">Login For Order</button>

                            @endif
                        </div>
                    </div>
                    @endif



                </div>
            </div>
            
        </section>

        <section class="pt-0 wow animate__fadeIn" style="{{$form_sec}}">

            <form class="checkout-form" id="addressForm" name="addressForm" method="POST" action="{{ route('order_place') }}">

                <input type="hidden" name="checkout_address_already" id="checkout_address_already" value="">

                @csrf
            <div class="container">
                <div class="row">

                 

                    <div class="col-12 col-lg-7 col-md-6 padding-70px-right lg-padding-40px-right md-padding-15px-right" style="{{$form_sec}}">
                        <span class="alt-font text-large text-extra-dark-gray margin-40px-bottom d-inline-block font-weight-500">Shipping details</span>
                        <form class="">
                            <div class="row">
                                <div class="col-md-6 margin-10px-bottom">
                                    <label class="margin-15px-bottom">First name <span class="text-radical-red">*</span></label>
                                    <input class="small-input" id="first_name" name="first_name" type="text" value="">

                                    <p class="form-error-text" id="first_name_error" style="color: red;"></p>
                                </div>
                                <div class="col-md-6 margin-10px-bottom">
                                    <label class="margin-15px-bottom">Last name <span class="text-radical-red">*</span></label>
                                    <input class="small-input" name="last_name" id='last_name' type="text" required>
                                    <p class="form-error-text" id="last_name_error" style="color: red;"></p>
                                </div>    
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom">Company name (optional)</label>
                                    <input class="small-input" type="text" name="company_name" id="company_name">
                                </div>
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom" for="contry">Country <span class="text-radical-red">*</span></label>
                                    <select id="country" name="country" class="small-input" onchange="ship_country_change(this.value);">
                                        <option value="">Select a country</option>
                                        @foreach($country as $country_data)
                                        <option value="{{$country_data->id}}">{{$country_data->country}}</option>
                                        @endforeach
                                    </select>
                                    <p class="form-error-text" id="country_error" style="color: red;"></p>
                                </div>
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom">Street address <span class="text-radical-red">*</span></label>
                                    <input class="small-input" id="address1" name="address1" type="text" placeholder="House number and street name">
                                    <p class="form-error-text" id="address1_error" style="color: red;"></p>
                                    <input class="small-input" id="address2" name="address2" type="text" placeholder="Apartment,suite,unit etc. (optional)">
                                </div>
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom">Town / City <span class="text-radical-red">*</span></label>
                                    <input class="small-input" type="text" id="city" name="city">
                                    <p class="form-error-text" id="city_error" style="color: red;"></p>
                                </div>
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom" for="state">State <span class="text-radical-red">*</span></label>

                                    <span id="ship_state_change_div">
                                    <select name="state" id="state" class="small-input">
                                        <option value="">Select a state</option>
                                        @foreach($state as $state_data)
                                        <option value="{{$state_data->id}}">{{$state_data->state}}</option>
                                        @endforeach
                                    </select>
                                    </span>
                                    <p class="form-error-text" id="state_error" style="color: red;"></p>
                                </div>
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom">ZIP <span class="text-radical-red">*</span></label>
                                    <input class="small-input" type="number" id="post_code" name="post_code">
                                    <p class="form-error-text" id="post_code_error" style="color: red;"></p>
                                </div>
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom">Phone <span class="text-radical-red">*</span></label>
                                    <input class="small-input" type="number" id="phone_number" name="phone_number">
                                    <p class="form-error-text" id="phone_error" style="color: red;"></p>
                                    <p class="form-error-text" id="phone_error_2" style="color: red;"></p>
                                </div>
                                <div class="col-12 margin-10px-bottom">
                                    <label class="margin-15px-bottom">Email address <span class="text-radical-red">*</span></label>
                                    <input class="small-input" type="text" id="email_address" name="email_address">
                                    <p class="form-error-text" id="email_error" style="color: red;"></p>
                                </div>
                                
                                <div class="col-md-12 checkout-accordion">
                                    <p class="title mb-2 d-flex">
                                        <label class="margin-5px-bottom">
                                          
                                            <input id="same_bill" name="same_bill" class="d-inline w-auto mb-0 me-2 mt-1" value="1" type="checkbox">
                                            <span class=" d-inline-block text-decoration-none">Bill to Same address?</span> 
                                            <a class="accordion-toggle text-black" data-bs-toggle="collapse" data-bs-parent="#accordion1" href="#collapseFour"></a>
                                        </label>
                                    </p>
                                    <div id="billAddress">
                                        <span class="alt-font text-large text-extra-dark-gray margin-40px-bottom d-inline-block font-weight-500">Billing details</span>
                                    <div >
                                        <div class="padding-25px-left margin-2-half-rem-bottom md-no-padding-left">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="margin-15px-bottom">First name <span class="text-radical-red">*</span></label>
                                                    <input class="small-input" type="text" id="bill_first_name" name="bill_first_name">
                                                    <p class="form-error-text" id="bill_first_name_error" style="color: red;"></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="margin-15px-bottom">Last name <span class="text-radical-red">*</span></label>
                                                    <input class="small-input" type="text" id="bill_last_name" name="bill_last_name">
                                                    <p class="form-error-text" id="bill_ast_name_error" style="color: red;"></p>
                                                </div>    
                                                <div class="col-12">
                                                    <label class="margin-15px-bottom">Company name (optional)</label>
                                                    <input class="small-input" type="text">
                                                </div>
                                                <div class="col-12">
                                                    <label class="margin-15px-bottom" for="shipping-contry">Country <span class="text-radical-red">*</span></label>
                                                    <select id="bill_country" name="bill_country" class="small-input" onchange="bill_country_change(this.value);">
                                                        <option value="">Select a Country</option>
                                                        @foreach($country as $country_data)
                                                        <option value="{{$country_data->id}}">{{$country_data->country}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="form-error-text" id="bill_country_error" style="color: red;"></p>
                                                </div>
                                                <div class="col-12">
                                                    <label class="margin-15px-bottom">Street address <span class="text-radical-red">*</span></label>
                                                    <input class="small-input" type="text" placeholder="House number and street name" id="bill_address1" name="bill_address1">
                                                    <p class="form-error-text" id="bill_address1_error" style="color: red;"></p>
                                                    <input class="small-input" type="text" placeholder="Apartment,suite,unit etc. (optional)" id="bill_address2" name="bill_address2">
                                                </div>
                                                <div class="col-12">
                                                    <label class="margin-15px-bottom">Town / City <span class="text-radical-red">*</span></label>
                                                    <input class="small-input" type="text" name="bill_city" id="bill_city">
                                                    <p class="form-error-text" id="bill_city_error" style="color: red;"></p>
                                                </div>
                                                <div class="col-12">
                                                    <label class="margin-15px-bottom" for="shipping-state">State <span class="text-radical-red">*</span></label>
                                                    <span id="bill_state_change_div">
                                                    <select name="bill_state" id="bill_state" class="small-input">
                                                        <option value="">Select a state</option>
                                                        @foreach($state as $state_data)
                                                        <option value="{{$state_data->id}}">{{$state_data->state}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                                    <p class="form-error-text" id="bill_state_error" style="color: red;"></p>
                                                </div>
                                                <div class="col-12">
                                                    <label class="margin-15px-bottom">ZIP <span class="text-radical-red">*</span></label>
                                                    <input class="small-input" type="text" id="bill_post_code" name="bill_post_code">
                                                    <p class="form-error-text" id="bill_post_code_error" style="color: red;"></p>
                                                </div>

                                                <div class="col-12 margin-10px-bottom">
                                                <label class="margin-15px-bottom">Phone <span class="text-radical-red">*</span></label>
                                                <input class="small-input" type="number" id="bill_phone_number" name="bill_phone_number">
                                                <p class="form-error-text" id="bill_phone_error" style="color: red;"></p>
                                            </div>
                                            <div class="col-12 margin-10px-bottom">
                                                <label class="margin-15px-bottom">Email address <span class="text-radical-red">*</span></label>
                                                <input class="small-input" type="text" id="bill_email_address" name="bill_email_address">
                                                <p class="form-error-text" id="bill_email_error" style="color: red;"></p>
                                            </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                </div>
                                <!-- end tab content -->
                                <div class="col-12 margin-15px-top">
                                    <label class="margin-15px-bottom">Order notes (optional)</label>
                                    <textarea class="medium-input" rows="5" cols="5" placeholder="Notes about your order, e.g. special notes for delivery." name="order_notes" id="order_notes"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>

                     @if(Cart::count() > 0)
                    <div class="col-12 col-lg-5 col-md-6">
                        <div class="bg-light-gray padding-45px-all lg-padding-30px-all sm-padding-20px-all">
                            <span class="alt-font text-large text-extra-dark-gray margin-25px-bottom d-inline-block font-weight-500">Your order</span>
                            <table class="total-price-table checkout-total-price-table">
                                <thead class="border-bottom border-color-medium-gray text-extra-dark-gray">
                                    <tr>
                                        <th class="product-name font-weight-500 w-60">Product</th>
                                        <th class="product-total pe-0 font-weight-500">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @php
                                            $subtotal = 0;
                                        @endphp

                                    @foreach(Cart::content() as $items)

                                    <tr>
                                        <td>{{$items->name}} × {{$items->qty}}<span class="d-block w-100">Size:{{$items->options->size_name}}</span>
                                            <span class="d-block w-100">Colour:{{$items->options->color_name}}</span>
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

                                        <td>&#8377;{{$items->qty * $p_price}}</td>
                                    </tr>
                                        @php

                                        if($items->qty >= 1){
                                            $subtotal += $items->qty * round($p_price);
                                        }else{
                                            $subtotal += round($p_price);
                                        }

                                        

                                        @endphp
                                    @endforeach
                                    <!-- <tr>
                                        <td>Tennis Shorts - White × 1<span class="d-block w-100">Size:M</span></td>
                                        <td>&#8377;2599</td>
                                    </tr>
                                    <tr>
                                        <td>Cashmere Sweater × 1<span class="d-block w-100">Size:S</span></td>
                                        <td>&#8377;1000</td>
                                    </tr> -->
                                    <tr>
                                        <th class="font-weight-500 text-extra-dark-gray">Subtotal</th>
                                        <td class="text-extra-dark-gray">&#8377;{{$subtotal}}</td>
                                    </tr>

                                    @php
                                        //echo '<pre>';print_r(session('coupan_data'));echo"</pre>";

                                    $coupon_discounted = 0;   
                                        
                                    if(session('coupan_data.discount') !='' && session('coupan_data.coupanvalue') == 0 ){

                                        $coupon_discounted = round(($subtotal * session('coupan_data.discount'))/100);

                                    }

                                    if(session('coupan_data.discount') !='' && session('coupan_data.coupanvalue') == 1 ){ 

                                        $coupon_discounted = session('coupan_data.discount');

                                     }



                                    session(['discount_amount' => $coupon_discounted]);

                                    $shippingcahrge = session('shippingcahrge');

                                    $order_total=round($subtotal  - $coupon_discounted + $shippingcahrge );

                                    session(['order_total' => $order_total]);

                                    @endphp 


                                    <tr>
                                        <th class="font-weight-500 text-extra-dark-gray">Discount</th>
                                        <td class="text-extra-dark-gray">&#8377;{{$coupon_discounted}}</td>
                                    </tr>

                                    <tr class="shipping">
                                        <th class="font-weight-500 text-extra-dark-gray">Shipping</th>
                                        <td class="text-extra-dark-gray">&#8377;{{$shippingcahrge}}</td>
                                    </tr>
                                    <tr class="total-amount">
                                        <th class="font-weight-500 text-extra-dark-gray">Total</th>
                                        <td>
                                            <h6 class="d-block font-weight-500 mb-0 text-extra-dark-gray">&#8377;{{$order_total}}</h6>
                                            <!-- <span class="text-small">(Includes &#8377;199 tax)</span> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="padding-40px-all bg-white box-shadow-large margin-20px-top margin-40px-bottom checkout-accordion lg-padding-30px-all md-padding-20px-all sm-padding-15px-lr">
                                <div class="w-100" id="accordion-style-05">
                                 
                                    <div id="style-5-collapse-2" class="collapse collapse" data-bs-parent="#accordion-style-05">
                                        <div class="padding-30px-all text-small bg-light-gray margin-20px-tb sm-padding-20px-lr sm-padding-25px-tb">Please send a check to store name, store street, store town, store state / county, store postcode.</div>
                                    </div>
                                    
                                    <div class="heading active-accordion">
                                        <label class="margin-5px-bottom">
                                            <input class="d-inline w-auto margin-10px-right mb-0" type="radio" name="payment_method" value="1">
                                            <span class="d-inline-block">Cash on delivery</span>
                                            <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-style-05" href="#style-5-collapse-3"></a>
                                        </label>
                                    </div>
                                    
                                    <div id="style-5-collapse-4" class="collapse collapse" data-bs-parent="#accordion-style-05">
                                        <div class="padding-30px-all text-small bg-light-gray margin-20px-tb sm-padding-20px-lr sm-padding-25px-tb">You can pay with your credit card if you don’t have a PayPal account.</div>
                                    </div>
                                   
                                </div>
                            </div>
                            <p class="form-error-text" id="payment_error" style="color: red;"></p>
                            <p class="text-small">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a class="text-decoration-underline" href="#">privacy policy.</a></p>
                            <!-- <p class="d-flex align-items-center">
                                <input class="d-inline w-auto mb-0 margin-10px-right" type="checkbox" name="terms-and-condition">
                                <span class="text-small">I have read and agree to the website <a class="text-decoration-underline" href="#">terms and conditions</a><span class="text-red ms-1">*</span></span>
                            </p> -->
                            @if($userdata != '')
                            <button type="button" onclick="place_order();" class="btn btn-fancy btn-dark-gray btn-extra-large w-100 margin-15px-top">Place order</button>
                            @else
                            <button type="button" class="btn btn-fancy btn-dark-gray btn-extra-large w-100 margin-15px-top">Login For Order</button>

                            @endif
                        </div>
                    </div>
                    @endif



                </div>
            </div>
            </form>
        </section>

    
        <!-- end section -->
@include('front.includes.footer')
<script type="text/javascript">
    $('input[type=checkbox][name=same_bill]').change(function() {
    if ($('input[type=checkbox][name=same_bill]').is(':checked')) {
        //var value = $("input[name=selectCoupan]:checked").val();
        $("#billAddress").hide();

        $('#bill_first_name').val($('#first_name').val());
        $('#bill_last_name').val($('#last_name').val());
        $('#bill_company').val($('#company').val());
        $('#bill_address1').val($('#address1').val());
        $('#bill_address2').val($('#address2').val());
        $('#bill_city').val($('#city').val());
        $('#bill_post_code').val($('#post_code').val());
        $('#bill_country').val($('#country').val());
        $('#bill_state').val($('#state').val());
        $('#bill_email_address').val($('#email_address').val());
        $('#bill_phone_number').val($('#phone_number').val());
        
    }else{
        $("#billAddress").show();

        $("#bill_first_name").val('');
        $('#bill_last_name').val('');
        $('#bill_company').val('');
        $('#bill_address1').val('');
        $('#bill_address2').val('');
        $('#bill_city').val('');
        $('#bill_post_code').val('');
        $('#bill_country').val('');
        $('#bill_state').val('');
        $('#bill_email_address').val('');
        $('#bill_phone_number').val('');
    }
});     

function place_order() {


    var first_name = jQuery("#first_name").val();
    if (first_name == '') {
        jQuery('#first_name_error').html("Please enter First Name");
        jQuery('#first_name_error').show().delay(0).fadeIn('show');
        jQuery('#first_name_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#first_name').offset().top - 150
        }, 1000);
        return false;
    }

    var last_name = jQuery("#last_name").val();
    if (last_name == '') {
        jQuery('#last_name_error').html("Please enter Last Name");
        jQuery('#last_name_error').show().delay(0).fadeIn('show');
        jQuery('#last_name_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#last_name').offset().top - 150
        }, 1000);
        return false;
    }

    var country = jQuery("#country").val();
    if (country == '') {
        jQuery('#country_error').html("Please select country");
        jQuery('#country_error').show().delay(0).fadeIn('show');
        jQuery('#country_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#country').offset().top - 150
        }, 1000);
        return false;
    }

    var address1 = jQuery("#address1").val();
    if (address1 == '') {
        jQuery('#address1_error').html("Please enter Address");
        jQuery('#address1_error').show().delay(0).fadeIn('show');
        jQuery('#address1_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#address1').offset().top - 150
        }, 1000);
        return false;
    }

    var city = jQuery("#city").val();
    if (city == '') {
        jQuery('#city_error').html("Please enter City");
        jQuery('#city_error').show().delay(0).fadeIn('show');
        jQuery('#city_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#city').offset().top - 150
        }, 1000);
        return false;
    }

    var state_value = jQuery("#state").val();
    if (state_value == '') {
        jQuery('#state_error').html("Please Select State");
        jQuery('#state_error').show().delay(0).fadeIn('show');
        jQuery('#state_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#state').offset().top - 150
        }, 1000);
        return false;
    }

    var post_code = jQuery("#post_code").val();
    if (post_code == '') {
        jQuery('#post_code_error').html("Please enter Pin code");
        jQuery('#post_code_error').show().delay(0).fadeIn('show');
        jQuery('#post_code_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#post_code').offset().top - 150
        }, 1000);
        return false;
    }

    var pc = jQuery('#post_code').val();
    var filter = /^\d{6}$/;
    if (!filter.test(pc)) {
        jQuery('#post_code_error').html("Enter Valid Pin Code");
        jQuery('#post_code_error').show().delay(0).fadeIn('show');
        jQuery('#post_code_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#post_code').offset().top - 150
        }, 1000);
        return false;
    }

    var phone = jQuery("#phone_number").val();
    if (phone == '') {
        jQuery('#phone_error').html("Please enter Phone Number");
        jQuery('#phone_error').show().delay(0).fadeIn('show');
        jQuery('#phone_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#phone_number').offset().top - 150
        }, 1000);
        return false;
    }

    var ph = jQuery('#phone_number').val();
    var filter = /^\d{10}$/;
    if (!filter.test(ph)) {
        jQuery('#phone_error').html("Enter Valid Phone Number");
        jQuery('#phone_error').show().delay(0).fadeIn('show');
        jQuery('#phone_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#phone_number').offset().top - 150
        }, 1000);
        return false;
    }

    var email_address = jQuery("#email_address").val();
    if (email_address == '') {
        jQuery('#email_error').html("Please enter Email Address");
        jQuery('#email_error').show().delay(0).fadeIn('show');
        jQuery('#email_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#email_address').offset().top - 150
        }, 1000);
        return false;
    }

    var em = jQuery('#email_address').val();
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(em)) {
        jQuery('#email_error').html("Enter Valid Email Address");
        jQuery('#email_error').show().delay(0).fadeIn('show');
        jQuery('#email_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#email_address').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_first_name = jQuery("#bill_first_name").val();
    if (bill_first_name == '') {
        jQuery('#bill_first_name_error').html("Please enter Billing First Name");
        jQuery('#bill_first_name_error').show().delay(0).fadeIn('show');
        jQuery('#bill_first_name_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_first_name').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_last_name = jQuery("#bill_last_name").val();
    if (bill_last_name == '') {
        jQuery('#bill_ast_name_error').html("Please enter Billing Last Name");
        jQuery('#bill_ast_name_error').show().delay(0).fadeIn('show');
        jQuery('#bill_ast_name_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_last_name').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_country = jQuery("#bill_country").val();
    if (bill_country == '') {
        jQuery('#bill_country_error').html("Please select Bill Country");
        jQuery('#bill_country_error').show().delay(0).fadeIn('show');
        jQuery('#bill_country_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_country').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_address1 = jQuery("#bill_address1").val();
    if (bill_address1 == '') {
        jQuery('#bill_address1_error').html("Please enter Billing Address");
        jQuery('#bill_address1_error').show().delay(0).fadeIn('show');
        jQuery('#bill_address1_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_address1').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_city = jQuery("#bill_city").val();
    if (bill_city == '') {
        jQuery('#bill_city_error').html("Please enter billing City");
        jQuery('#bill_city_error').show().delay(0).fadeIn('show');
        jQuery('#bill_city_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_city').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_state = jQuery("#bill_state").val();
    if (bill_state == '') {
        jQuery('#bill_state_error').html("Please Select Billing State");
        jQuery('#bill_state_error').show().delay(0).fadeIn('show');
        jQuery('#bill_state_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_state').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_post_code = jQuery("#bill_post_code").val();
    if (bill_post_code == '') {
        jQuery('#bill_post_code_error').html("Please Enter Pin Code");
        jQuery('#bill_post_code_error').show().delay(0).fadeIn('show');
        jQuery('#bill_post_code_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_post_code').offset().top - 150
        }, 1000);
        return false;
    }

    var pc_bill = jQuery('#bill_post_code').val();
    var filter = /^\d{6}$/;
    if (!filter.test(pc_bill)) {
        jQuery('#bill_post_code_error').html("Enter Valid Billing Pin Code");
        jQuery('#bill_post_code_error').show().delay(0).fadeIn('show');
        jQuery('#bill_post_code_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_post_code').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_phone_number = jQuery("#bill_phone_number").val();
    if (bill_phone_number == '') {
        jQuery('#bill_phone_error').html("Please enter Billing Phone Number");
        jQuery('#bill_phone_error').show().delay(0).fadeIn('show');
        jQuery('#bill_phone_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_phone_number').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_ph = jQuery('#bill_phone_number').val();
    var filter = /^\d{10}$/;
    if (!filter.test(bill_ph)) {
        jQuery('#bill_phone_error').html("Enter Valid Phone Number");
        jQuery('#bill_phone_error').show().delay(0).fadeIn('show');
        jQuery('#bill_phone_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_phone_number').offset().top - 150
        }, 1000);
        return false;
    }

    var bill_email_address = jQuery("#bill_email_address").val();
    if (bill_email_address == '') {
        jQuery('#bill_email_error').html("Please enter Billing Email Address");
        jQuery('#bill_email_error').show().delay(0).fadeIn('show');
        jQuery('#bill_email_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_email_address').offset().top - 150
        }, 1000);
        return false;
    }

    var em1 = jQuery('#bill_email_address').val();
    var filter1 = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter1.test(em1)) {
        jQuery('#bill_email_error').html("Enter Valid Billing Email Address");
        jQuery('#bill_email_error').show().delay(0).fadeIn('show');
        jQuery('#bill_email_error').show().delay(2000).fadeOut('show');
        $('html, body').animate({
            scrollTop: $('#bill_email_address').offset().top - 150
        }, 1000);
        return false;
    }


    var payment_method = $("input[name='payment_method']:checked").val();  
    if(payment_method == '' || payment_method == undefined){
        $("#payment_error").html("Please Select Payment method.");
        $('#payment_error').show().delay(0).fadeIn('show');
        $('#payment_error').show().delay(2000).fadeOut('show');
        return false;
    }

  $('#addressForm').submit();

    


}

function ship_country_change(country_id){
    //alert(country_id);

    var url = '{{ url('ship_state_change') }}';

    $.ajax({
        url: url,
        type: 'post',
        data: {
            "_token": "{{ csrf_token() }}",
            "country_id": country_id
        },
        success: function(msg) {
            document.getElementById('ship_state_change_div').innerHTML = msg;
        }

    });


}

function bill_country_change(country_id){
    //alert(country_id);

    var url = '{{ url('bill_state_change') }}';

    $.ajax({
        url: url,
        type: 'post',
        data: {
            "_token": "{{ csrf_token() }}",
            "country_id": country_id
        },
        success: function(msg) {
            document.getElementById('bill_state_change_div').innerHTML = msg;
        }

    });


}

 function login_validation(){
       
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