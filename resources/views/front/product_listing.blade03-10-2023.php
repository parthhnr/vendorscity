@include('front.includes.header')
 <section class="shopping-left-side-bar">
            @php
               //echo "<pre>";print_r($all_product_details['links']);echo "</pre>";exit;
            @endphp
            @if(isset($all_product_details) && count($all_product_details) > 0)
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-8 shopping-content padding-55px-left md-padding-15px-left sm-margin-30px-bottom">
                        <!--<div class="row d-none d-lg-block">-->
                        <!--    <div class="col-md-8">-->
                        <!--        <div class="pdt-listing-title">-->
                        <!--            <h6>Indo Western</h6>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-4">-->
                        <!--    <select name="cars" id="cars">-->
                        <!--        <option value="volvo">Sort by popularity</option>-->
                        <!--        <option value="saab">Sort by average rating</option>-->
                        <!--        <option value="opel">Sort by latest</option>-->
                        <!--        <option value="audi">Sort by price: low to high</option>-->
                        <!--        <option value="audi">Sort by price: high to low</option>-->
                        <!--      </select>-->
                        <!--</div></div>-->
                        <div class="d-none d-lg-block">
                            <div class="row ">
                                <div class="col-md-8">
                                <div class="pdt-listing-title">
                                    <h6>{{ $banner_title }}</h6>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <select name="cars" id="cars" onchange="sort_by()">
                                   <!--  <option value="volvo">Sort by popularity</option>
                                    <option value="saab">Sort by average rating</option> -->
                                    <option>Sort by</option>
                                    <option value="latest" @if($sort_by == 'latest') {{ 'selected' }} @endif>Sort by latest</option>
                                    <option value="low_to_high" @if($sort_by == 'low_to_high') {{ 'selected' }} @endif>Sort by price: low to high</option>
                                    <option value="high_to_low" @if($sort_by == 'high_to_low') {{ 'selected' }} @endif>Sort by price: high to low</option>
                                  </select>
                            </div></div>
                        </div>
                        <ul class="product-listing shop-wrapper grid grid-loading grid-3col xl-grid-3col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-large text-center">
                            <li class="grid-sizer"></li>
                            <!-- start shop item -->

                            @foreach($all_product_details as $all_product)

                            @php

                                $Base_image = DB::table('product_image')
                                           ->where('pid', $all_product->id)
                                           ->where('baseimage', 1)
                                           ->first();

                                $Hover_image = DB::table('product_image')
                                            ->where('pid', $all_product->id)
                                            ->where('baseimageHover', 1)
                                            ->first();

                                //echo "<pre>";print_r($Hover_image);echo "</pre>";

                            @endphp
                            <li class="grid-item wow animate__fadeIn">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            @if($Base_image != '')
                                            <img class="default-image" src="{{asset('public/upload/product/large/'.$Base_image->image)}}" alt=""/>
                                            @else
                                            <img class="default-image" src="{{asset('public/upload/product/large/no-image.png')}}" alt=""/>
                                            @endif

                                            @if($Hover_image != '')
                                            <img class="hover-image" src="{{asset('public/upload/product/large/'.$Hover_image->image)}}" alt=""/>
                                            @else
                                            <img class="hover-image" src="{{asset('public/upload/product/large/no-image.png')}}" alt=""/>
                                            @endif
                                            <div class="pdt-tags">
                                                @if($all_product->sale_product == 1)
                                                <span class="product-badge green">sale</span>
                                                @endif
                                                @if($all_product->new_product == 1)
                                                <span class="product-badge red">New</span>
                                                @endif
                                                @if($all_product->hot_product == 1)
                                                <span class="product-badge orange">Hot</span>
                                                @endif
                                            </div>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-30px-tb">
                                            <!-- <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a> -->
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->

                                    @php
                                        $minPrice = DB::table('product_attribute')
                                        ->where('pid', $all_product->id)
                                        ->min('price');

                                       // echo "<pre>";print_r($all_product);echo "</pre>";

                                        if($all_product->discount_type != ''){
                                            if($all_product->discount_type == 0){ //percentage
                                                $disc_price_new = $minPrice * $all_product->discount /100 ;

                                                $disc_price = $minPrice - $disc_price_new;
                                            }elseif($all_product->discount_type == 1){
                                                $disc_price = $minPrice - $all_product->discount;
                                            }else{
                                                $disc_price = '0';
                                            }
                                        }else{
                                            $disc_price = '0';
                                        }
                                    @endphp
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('product-detail/' . $all_product->page_url)}}" class="text-extra-dark-gray font-weight-500 d-inline-block">{{ $all_product->name }}</a>

                                        
                                        
                                        @if($minPrice != '')
                                        <div class="product-price text-medium">
                                            @if($disc_price != '0')
                                            <del>&#8377;{{ $minPrice }}</del>
                                            &#8377;{{ $disc_price }}
                                            @else
                                            &#8377;{{ $minPrice }}
                                            @endif
                                            </div>
                                        @endif
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>

                            @endforeach
                            <!-- end shop item -->
                            <!-- start shop item -->
                            {{-- <li class="grid-item wow animate__fadeIn" data-wow-delay="0.2s">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/F2.jpg')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/1_4.webp')}}" alt=""/>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Cotton Jacket</a>
                                        <div class="product-price text-medium">&#8377;370</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.4s">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="{{url('single-product')}}">
                                            <img class="default-image" src="{{asset('public/site/images/F3.jpg')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/1_5.webp')}}" alt=""/>
                                            <span class="product-badge orange">hot</span>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Outlaw Jacket</a>
                                        <div class="product-price text-medium">&#8377;400</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item wow animate__fadeIn">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/1_3.webp')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/F4.jpg')}}" alt=""/>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Tennis Shorts</a>
                                        <div class="product-price text-medium">&#8377;350</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item wow animate__fadeIn"  data-wow-delay="0.2s">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/1_4.webp')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/F6.jpg')}}" alt=""/>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Haye Runway Bags</a>
                                        <div class="product-price text-medium"><del>&#8377;480</del>&#8377;470</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.4s">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/1_5.webp')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/F4.jpg')}}" alt=""/>
                                            <span class="product-badge green">sale</span>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Cotton Dark Shirt</a>
                                        <div class="product-price text-medium">&#8377;370</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item wow animate__fadeIn">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/1_1.webp')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/F3.jpg')}}" alt=""/>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Short Sleeved Hoodie</a>
                                        <div class="product-price text-medium">&#8377;290</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.2s">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/1_3.webp')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/F10.jpg')}}" alt=""/>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Plain Multicolored</a>
                                        <div class="product-price text-medium">&#8377;370</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item wow animate__fadeIn"  data-wow-delay="0.4s">
                                <div class="product-box margin-25px-bottom xs-margin-15px-bottom">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/1.webp')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/F6.jpg')}}" alt=""/>
                                            <span class="product-badge red">new</span>
                                        </a>
                                        <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                        <div class="product-hover-bottom text-center padding-35px-tb">
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i></a>
                                        </div>
                                    </div>
                                    <!-- end product image -->
                                    <!-- start product footer -->
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray font-weight-500 d-inline-block">Cotton Polo Shirt</a>
                                        <div class="product-price text-medium">&#8377;200</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li> --}}
                            <!-- end shop item -->
                           
                        </ul>
                        
                        {!! $all_product_details->appends($_GET)->render("pagination::bootstrap-4") !!}
                        
                    </div>
                    <!-- start sidebar -->
                    <aside class="col-12 col-lg-3 col-md-4 shopping-sidebar d-none d-lg-block">
                        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Filter by category</span>
                            <ul class="list-style-07 filter-category">
                                <li><a href="#"><span class="product-cb product-category-cb"></span>Casual shirts</a><span class="item-qty">25</span></li>
                                <li><a href="#"><span class="product-cb product-category-cb"></span>Leather bags</a><span class="item-qty">05</span></li>
                                <li><a href="#"><span class="product-cb product-category-cb"></span>Men's shorts</a><span class="item-qty">36</span></li>
                                <li><a href="#"><span class="product-cb product-category-cb"></span>Polo t-shirts</a><span class="item-qty">05</span></li>
                                <li><a href="#"><span class="product-cb product-category-cb"></span>Short skirts</a><span class="item-qty">09</span></li>
                                <li><a href="#"><span class="product-cb product-category-cb"></span>Winter jackets</a><span class="item-qty">12</span></li>
                            </ul>
                        </div>
                        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Filter by color</span>
                            <ul class="list-style-07 filter-color">
                                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color: #363636"></span>Carbon black</a><span class="item-qty">25</span></li>
                                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#657fa8"></span>Prussian blue</a><span class="item-qty">03</span></li>
                                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#936f5e"></span>Light brown</a><span class="item-qty">15</span></li>
                                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#97a27f"></span>Parrot green</a><span class="item-qty">40</span></li>
                                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#b95b5b"></span>Dark orange</a><span class="item-qty">29</span></li>
                                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#b7b5b5"></span>Slate blue</a><span class="item-qty">35</span></li>
                            </ul>
                        </div>
                        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn">
                            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Filter by price</span>
                            <span class="price-filter d-block margin-10px-top"></span>
                            <div class="price-filter-details">
                                <button type="submit" class="btn-filter btn">Filter</button>
                                <span class="price-filter-amount">
                                    <label class="mb-0" for="price-amount">Price:</label>
                                    <input type="text" class="price-amount mb-0" id="price-amount" readonly>
                                </span>
                            </div>
                        </div>
                        
                        
                    </aside>
                    <!-- end sidebar -->
                </div>
            </div>
            @else
                @php echo 'No Product Available';@endphp
            @endif
        </section>
        <!-- end section -->
        <!--mobile sort sec-->
         <section class="p-0 ">
            <div class="container-fluid filter-content  d-lg-none d-block">
                <div class="row">

                    <div class="col-6 col-xl-6 p-0">
                        <button class="btn btn-filter w-100 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Sort By</button>

<div class="offcanvas offcanvas-bottom sort-by" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    <ul class="list-style-07 sort-by-filter">
        <li><a href="#"><span class="sort-by-cb sort-by-category-cb"></span>Sort by popularity</a></li>
        <li><a href="#"><span class="sort-by-cb sort-by-category-cb"></span>Sort by average rating</a></li>
        <li><a href="#"><span class="sort-by-cb sort-by-category-cb"></span>Sort by average rating</a></li>
        <li><a href="#"><span class="sort-by-cb sort-by-category-cb"></span>Sort by price: low to high</a></li>
        <li><a href="#"><span class="sort-by-cb sort-by-category-cb"></span>Sort by price: high to lowv</a></li>
      
    </ul>
  </div>
</div>
                    </div>

                    <div class="col-6 col-xl-6 p-0">

                        <button class="btn btn-filter w-100 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom1" aria-controls="offcanvasBottom1">Filter By</button>

<div class="offcanvas offcanvas-bottom h-100" tabindex="-1" id="offcanvasBottom1" aria-labelledby="offcanvasBottomLabel1">
  <!-- <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel1"></h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div> -->
  <div class="offcanvas-body ">
    <aside class="col-12 col-lg-3 col-md-4 shopping-sidebar">
        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn px-4">
            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Filter by category</span>
            <ul class="list-style-07 filter-category">
                <li><a href="#"><span class="product-cb product-category-cb"></span>Casual shirts</a><span class="item-qty">25</span></li>
                <li><a href="#"><span class="product-cb product-category-cb"></span>Leather bags</a><span class="item-qty">05</span></li>
                <li><a href="#"><span class="product-cb product-category-cb"></span>Men's shorts</a><span class="item-qty">36</span></li>
                <li><a href="#"><span class="product-cb product-category-cb"></span>Polo t-shirts</a><span class="item-qty">05</span></li>
                <li><a href="#"><span class="product-cb product-category-cb"></span>Short skirts</a><span class="item-qty">09</span></li>
                <li><a href="#"><span class="product-cb product-category-cb"></span>Winter jackets</a><span class="item-qty">12</span></li>
            </ul>
        </div>
        <div class="border-bottom border-color-medium-gray padding-3-rem-bottom margin-3-rem-bottom wow animate__fadeIn px-4">
            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Filter by color</span>
            <ul class="list-style-07 filter-color">
                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color: #363636"></span>Carbon black</a><span class="item-qty">25</span></li>
                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#657fa8"></span>Prussian blue</a><span class="item-qty">03</span></li>
                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#936f5e"></span>Light brown</a><span class="item-qty">15</span></li>
                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#97a27f"></span>Parrot green</a><span class="item-qty">40</span></li>
                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#b95b5b"></span>Dark orange</a><span class="item-qty">29</span></li>
                <li><a href="#"><span class="product-cb paroduct-color-cb" style="background-color:#b7b5b5"></span>Slate blue</a><span class="item-qty">35</span></li>
            </ul>
        </div>
        <div class="padding-3-rem-bottom  wow animate__fadeIn px-4">
            <span class="shop-title alt-font font-weight-500 text-extra-dark-gray d-block margin-20px-bottom">Filter by price</span>
            <span class="price-filter d-block margin-10px-top"></span>
            <div class="price-filter-details">
                <button type="submit" class="btn-filter btn">Filter</button>
                <span class="price-filter-amount">
                    <label class="mb-0" for="price-amount">Price:</label>
                    <input type="text" class="price-amount mb-0" id="price-amount" readonly>
                </span>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-6 col-xl-6 p-0 ">
    
                    <button class=" btn btn-filter w-100" type="button" data-bs-dismiss="offcanvas" >Close</button>
    
                </div>
                <div class="col-6 col-xl-6 p-0">
    
                    <button class="btn btn-filter w-100">Apply</button>
    
                </div>
            </div>

        </div>
        
    </aside>
  </div>
</div>
                    </div>

                </div>
            </div>
            <form id="sortFilter">

                <input type="hidden" name="sort_by" id="sort_by">

            </form>
        </section>
@include('front.includes.footer')

<script type="text/javascript">
     function sort_by(){
        var sort_by = $("#cars").val();
        // alert(sort_by);
        $("#sort_by").val(sort_by);
        $("#sortFilter").submit();
     }
</script>