@include('front.includes.header')
<!-- Shop Cart Area -->
<section class="pt40 pb0">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-title">
              <h2 class="title">Shop Cart</h2>
              <!-- <p class="text mb-0">Give your visitor a smooth online experience with a solid UX design</p> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="shop-checkout pt-0">
      <div class="container">
        @if(Cart::count() > 0)
         <div id="mydiv_pc">
        <div class="row wow fadeInUp" data-wow-delay="300ms">
        <div class="col-lg-8">
          <div class="shopping_cart_table table-responsive">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th class="pl30" scope="col">Package</th>
                  <th class="ps-0" scope="col">Price</th>
                  <th class="ps-0" scope="col">Quantity</th>
                  <th class="ps-0" scope="col">Subtotal</th>
                  <th scope="col"></th>
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
                            <del>AED {{ $items->price }}</del>
                            AED {{$disc_price}}
                            @else
                               AED {{$items->price}}
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
                                $price_tot = $disc_price;
                            }else{
                                $price_tot = $items->price;
                            }

                        @endphp
                           AED {{$price_tot * $items->qty}}
                        
                    </div>
                    </td>
                  <td><div class="cart-delete">
                    <a href="javascript:void(0)" onclick="remove_to_cart('{{ $items->rowId }}'); return false;"><span class="flaticon-delete"></span></div></td>
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
        <div class="col-lg-4">
          <div class="shop-sidebar ms-lg-auto">
            <div class="order_sidebar_widget default-box-shadow1">
              <h4 class="title">Cart Totals</h4>
              <p class="text bdrb1 pb10">Subtotal <span class="float-end">AED {{$subtotal}}</span></p>
              <p class="text">Total <span class="float-end">AED {{$subtotal}}</span></p>
              <div class="d-grid mt40">
                <a class="ud-btn btn-thm" href="page-shop-checkout.html">Proceed to Checkout<i class="fal fa-arrow-right-long"></i></a>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
        @else

        <p>No Product Found in Cart</p>
        @endif
      </div>
    </section>
@include('front.includes.footer')
