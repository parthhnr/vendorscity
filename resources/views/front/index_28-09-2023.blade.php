@include('front.includes.header')

 <!-- start revolution slider -->
    @if($banner_data != '')
        <section class="p-0" >
            <div class="container-fluid position-relative">
                <div class="row">
                    <div class="swiper-container white-move full-screen p-0 md-h-650px sm-h-500px" data-slider-options='{ "slidesPerView": 1, "loop": true, "autoplay": { "delay": 4500, "disableOnInteraction": false },  "pagination": { "el": ".swiper-pagination", "clickable": true }, "navigation": { "nextEl": ".swiper-button-next-nav", "prevEl": ".swiper-button-previous-nav" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                        <div class="swiper-wrapper">
                            <!-- start slider item -->
                            
                            @foreach($banner_data as $banner)
                            <div class="swiper-slide top-slider-title cover-background" style="background-image:url('{{asset('public/upload/banner/large/'.$banner->image)}}');">
                                <div class="container h-100">
                                    <div class="row justify-content-center h-100">
                                        <div class="col-12 col-xl-6 col-sm-7 d-flex flex-column justify-content-center text-center h-100">
                                            <span class="alt-font font-weight-500 text-extra-medium letter-spacing-2px text-white text-uppercase d-block margin-35px-bottom sm-margin-15px-bottom">{{ $banner->sub_title }}</span>
                                            <h1 class="alt-font font-weight-800 title-large text-white text-uppercase letter-spacing-minus-4px margin-45px-bottom sm-letter-spacing-minus-1px sm-margin-30px-bottom text-shadow-large sm-no-text-shadow xs-w-90 mx-auto">{{ $banner->title }}</h1>
                                            @if($banner->link)
                                            <a href="{{$banner->link}}" class="btn btn-fancy btn-large btn-dark-gray btn-box-shadow align-self-center">Shop Now</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <!-- <div class="swiper-slide cover-background" style="background-image:url('{{asset('public/site/images/fashion1_2.jpg')}}');">
                                <div class="container h-100">
                                    <div class="row justify-content-center h-100">
                                        <div class="col-12 col-xl-6 col-sm-7 d-flex flex-column justify-content-center text-center h-100">
                                            <span class="alt-font font-weight-500 text-extra-medium letter-spacing-2px text-white text-uppercase d-block margin-35px-bottom sm-margin-15px-bottom">Most Unique Styles</span>
                                            <h1 class="alt-font font-weight-800 title-large text-white text-uppercase letter-spacing-minus-4px margin-45px-bottom sm-letter-spacing-minus-1px sm-margin-30px-bottom text-shadow-large sm-no-text-shadow xs-w-90 mx-auto">Discover Bestseller</h1>
                                            <a href="#" class="btn btn-fancy btn-large btn-dark-gray btn-box-shadow align-self-center">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- end slider item -->
                                                     
                        </div>
                        <!-- start slider pagination -->
                        <div class="swiper-pagination swiper-light-pagination d-sm-none"></div>
                        <!-- end slider pagination -->
                        <!-- start slider navigation -->
                        <div class="swiper-button-next-nav swiper-button-next rounded-circle slider-navigation-style-07 d-none d-sm-flex"><i class="feather icon-feather-arrow-right"></i></div>
                        <div class="swiper-button-previous-nav swiper-button-prev rounded-circle slider-navigation-style-07 d-none d-sm-flex"><i class="feather icon-feather-arrow-left"></i></div>
                        <!-- end slider navigation -->
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- end revolution slider -->
        <!-- start section -->
        <section class="padding-six-tb sm-padding-50px-tb">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
                    <!-- start feature box item -->
                    <div class="col-6 md-margin-30px-bottom xs-margin-25px-bottom wow animate__fadeIn">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon margin-30px-right line-height-0px lg-margin-25px-right">
                                <i class="feather icon-feather-truck icon-extra-medium text-extra-light-gray"></i>
                            </div>
                            <div class="feature-box-content line-height-22px">
                                <div class="text-extra-dark-gray text-extra-medium font-weight-500 line-height-20px margin-5px-bottom">Free delivery</div>
                                <span>Contact support team</span>
                            </div>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start feature box item -->
                    <div class="col-6 md-margin-30px-bottom xs-margin-25px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon margin-30px-right line-height-0px lg-margin-25px-right">
                                <i class="feather icon-feather-rotate-cw icon-extra-medium text-extra-light-gray"></i>
                            </div>
                            <div class="feature-box-content line-height-22px">
                                <div class="text-extra-dark-gray text-extra-medium font-weight-500 line-height-20px margin-5px-bottom">90 days return</div>
                                <span>Safe and trustworthy</span>
                            </div>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start feature box item -->
                    <div class="col-6 xs-margin-25px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon margin-30px-right line-height-0px lg-margin-25px-right">
                                <i class="feather icon-feather-check-square icon-extra-medium text-extra-light-gray"></i>
                            </div>
                            <div class="feature-box-content line-height-22px">
                                <div class="text-extra-dark-gray text-extra-medium font-weight-500 line-height-20px margin-5px-bottom">Secure payment</div>
                                <span>Leading travel agency</span>
                            </div>
                        </div>
                    </div>
                    <!-- end feature box item -->
                    <!-- start feature box item -->
                    <div class="col-6 wow animate__fadeIn" data-wow-delay="0.6s">
                        <div class="feature-box feature-box-left-icon-middle last-paragraph-no-margin">
                            <div class="feature-box-icon margin-30px-right line-height-0px lg-margin-25px-right">
                                <i class="feather icon-feather-headphones icon-extra-medium text-extra-light-gray"></i>
                            </div>
                            <div class="feature-box-content line-height-22px">
                                <div class="text-extra-dark-gray text-extra-medium font-weight-500 line-height-20px margin-5px-bottom">Expert support</div>
                                <span>Best price guarantee</span>
                            </div>
                        </div>
                    </div>
                    <!-- end feature box item-->
                </div>
            </div>
        </section>
        <!-- end section -->
        @if(isset($collection_data) && count($collection_data) > 0)
        @php 
        /*echo "<pre>";print_r($collection_data);echo "</pre>";*/
        @endphp 
        <!-- start section -->
        <section class="padding-5-half-rem-lr lg-padding-2-half-rem-lr sm-no-padding py-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-xl-4 row-cols-md-2">
                    <!-- start category item -->
                    @foreach($collection_data as $collection)
                    <div class="col shop-category-style-01 wow animate__fadeIn">
                        <div class="shop-product lg-margin-30px-bottom">
                            <div class="shop-product-image">
                                @if($collection->image != '')
                                <img src="{{asset('public/upload/collection/large/'.$collection->image)}}" class="w-100" alt=""/>
                                @else
                                <img src="{{asset('public/upload/collection/large/no-image.png')}}" class="w-100" alt=""/>
                                @endif
                                <div class="shop-product-overlay bg-transparent-gradient-light-red-orange"></div>
                            </div>
                            <div class="shop-product-content d-flex align-items-center bg-white xl-padding-20px-lr padding-30px-lr padding-5px-tb">
                                <a href="{{url('/collection/'.$collection->page_url)}}" class="alt-font font-weight-500 text-extra-dark-gray d-inline-block align-middle text-uppercase me-auto">{{ $collection->name }}</a>
                                <a href="{{url('/collection/'.$collection->page_url)}}"><i class="line-icon-Arrow-OutRight icon-large text-extra-dark-gray align-middle margin-15px-left"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end category item -->
                    <!-- start category item -->
                    {{--
                    <div class="col shop-category-style-01 wow animate__fadeIn" data-wow-delay="0.2s">
                        <div class="shop-product lg-margin-30px-bottom">
                            <div class="shop-product-image">
                                <img src="{{asset('public/site/images/home-shop-modern-02.webp')}}" class="w-100" alt=""/>
                                <div class="shop-product-overlay bg-transparent-gradient-light-red-orange"></div>
                            </div>
                            <div class="shop-product-content d-flex align-items-center bg-white xl-padding-20px-lr padding-30px-lr padding-5px-tb">
                                <a href="#" class="alt-font font-weight-500 text-extra-dark-gray d-inline-block align-middle text-uppercase me-auto">Kids collection</a>
                                <a href="#"><i class="line-icon-Arrow-OutRight icon-large text-extra-dark-gray align-middle margin-15px-left"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end category item -->
                    <!-- start category banner -->
                    <div class="col wow animate__fadeIn" data-wow-delay="0.4s">
                        <a href="#"><img src="{{asset('public/site/images/home-shop-modern-03.webp')}}" class="sm-margin-30px-bottom" alt=""/></a>
                    </div>
                    <!-- start category banner -->
                    <!-- start category item -->
                    <div class="col shop-category-style-01 wow animate__fadeIn" data-wow-delay="0.6s">
                        <div class="shop-product">
                            <div class="shop-product-image">
                                <img src="{{asset('public/site/images/home-shop-modern-04.webp')}}" class="w-100" alt=""/>
                                <div class="shop-product-overlay bg-transparent-gradient-light-red-orange"></div>
                            </div>
                            <div class="shop-product-content d-flex align-items-center bg-white xl-padding-20px-lr padding-30px-lr padding-5px-tb">
                                <a href="#" class="alt-font font-weight-500 text-extra-dark-gray d-inline-block align-middle text-uppercase me-auto">Woman collection</a>
                                <a href="#"><i class="line-icon-Arrow-OutRight icon-large text-extra-dark-gray align-middle margin-15px-left"></i></a>
                            </div>
                        </div>
                    </div>
                    --}}
                    <!-- end category item -->
                </div>
            </div>
        </section>
        <!-- end section -->
        @endif
        <!-- start section -->
        <section class="padding-4-half-rem-lr lg-padding-1-half-rem-lr sm-no-padding-lr">
            <div class="container">
                <div class="row">
                    <div class="col-12 tab-style-01 wow animate__fadeIn">
                        <!-- start filter navigation -->
                        <ul class="shop-filter grid-filter nav nav-tabs text-uppercase justify-content-center text-extra-medium text-center alt-font font-weight-500 margin-6-half-rem-bottom margin-2-half-rem-top md-margin-4-rem-bottom sm-margin-20px-bottom">
                            <li class="nav-item active"><a class="nav-link" data-filter="*" href="#">Recent products</a><span class="tab-border bg-extra-dark-gray"></span></li>

                            <li class="nav-item"><a class="nav-link" data-filter=".featured-products" href="#">Featured products</a><span class="tab-border bg-extra-dark-gray"></span></li>
                            
                            <li class="nav-item"><a class="nav-link" data-filter=".best-sellers" href="#">Best sellers</a><span class="tab-border bg-extra-dark-gray"></span></li>
                        </ul>
                        <!-- end filter navigation -->
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 filter-content wow animate__fadeIn" data-wow-delay="0.2s">
                        <ul class="product-listing shop-wrapper grid grid-loading grid-5col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                            <li class="grid-sizer"></li>

                            <!-- start shop item -->
                            @if(isset($rec_fet_best_pro_data) && count($rec_fet_best_pro_data) > 0)

                            @foreach($rec_fet_best_pro_data as $recentProduct)

                                @if($recentProduct->recent_product == 1)
                                    @php 
                                        $class = 'recent-products';
                                    @endphp
                                @endif

                                @if($recentProduct->feature_product == 1)
                                    @php 
                                        $class = 'featured-products';
                                    @endphp
                                @endif

                                @if($recentProduct->best_seller == 1)
                                    @php 
                                        $class = 'best-sellers';
                                    @endphp
                                @endif

                                @if($recentProduct->feature_product == 1 && $recentProduct->best_seller == 1)
                                    @php 
                                        $class = 'featured-products best-sellers';
                                    @endphp
                                @endif


                                @php 

                                $baseImage = DB::table('product_image')->where('pid',$recentProduct->id)->where('baseimage',1)->first();

                                $hoverImage = DB::table('product_image')->where('pid',$recentProduct->id)->where('baseimageHover',1)->first();

                                /*echo "<pre>";print_r($hoverImage);echo "</pre>";*/

                                @endphp
                            <li class="grid-item {{ $class }}">
                                
                                <div class="product-box margin-45px-bottom lg-margin-25px-bottom xs-no-margin-bottom">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <a href="#">
                                            @if($baseImage != '')
                                                <img class="default-image" src="{{ asset('public/upload/product/large/'.$baseImage->image) }}" alt=""/>
                                            @else
                                                <img class="default-image" src="{{ asset('public/upload/product/no-image.png') }}" alt=""/>
                                            @endif

                                            @if($hoverImage != '')
                                                <img class="hover-image" src="{{asset('public/upload/product/large/'.$hoverImage->image)}}" alt=""/>
                                            @else
                                                <img class="hover-image" src="{{asset('public/upload/product/no-image.png')}}" alt=""/>
                                            @endif

                                            <div class="pdt-tags">
                                                @if($recentProduct->sale_product == 1)
                                                <span class="product-badge green">sale</span>
                                                @endif
                                                @if($recentProduct->new_product == 1)
                                                <span class="product-badge red">New</span>
                                                @endif
                                                @if($recentProduct->hot_product == 1)
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
                                    <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray text-black-hover font-weight-500 d-inline-block">{{ $recentProduct->name }}</a>
                                        @php 
                                            $ProductminPrice = DB::table('product_attribute')->where('pid',$recentProduct->id)->min('price');

                                            /*echo "<pre>";print_r($ProductminPrice);echo "</pre>";*/

                                        @endphp

                                        @if($recentProduct->discount_type != '')

                                            @if($recentProduct->discount_type == 0)
                                                @php
                                                $new_disc_price = $ProductminPrice * $recentProduct->discount/100;

                                                $new_price = $ProductminPrice - $new_disc_price;
                                                @endphp
                                        
                                            @elseif($recentProduct->discount_type == 1)
                                                @php
                                                $new_price = $ProductminPrice - $recentProduct->discount;
                                                @endphp

                                            @else
                                                @php
                                                $new_price = 0;
                                                @endphp
                                            @endif

                                        @else
                                            @php
                                            $new_price = 0;
                                            @endphp
                                        @endif

                                        @if($ProductminPrice != '')
                                            <div class="product-price text-medium">
                                                @if($new_price != '0')
                                                <del>&#8377;{{ $ProductminPrice }}</del>
                                                    &#8377;{{ $new_price }}
                                                @else
                                                    &#8377;{{ $ProductminPrice }}
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            
                            @endforeach
                            @endif
                            <!-- end shop item -->

                            {{--

                            <!-- start shop item -->
                            <li class="grid-item featured-products">
                                <div class="product-box margin-45px-bottom lg-margin-25px-bottom xs-no-margin-bottom">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/F6.jpg')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/1_1.webp')}}" alt=""/>
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
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray text-black-hover font-weight-500 d-inline-block">Cotton Jacket</a>
                                        <div class="product-price text-medium">&#8377;370</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item best-sellers">
                                <div class="product-box margin-45px-bottom lg-margin-25px-bottom xs-no-margin-bottom">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/F7.jpg')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/1_2.webp')}}" alt=""/>
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
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray text-black-hover font-weight-500 d-inline-block">Tennis Shorts</a>
                                        <div class="product-price text-medium">&#8377;350</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item featured-products">
                                <div class="product-box margin-45px-bottom lg-margin-25px-bottom xs-no-margin-bottom">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/F4.jpg')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/4.webp')}}" alt=""/>
                                            <div class="pdt-tags"> <span class="product-badge green">sale</span></div>
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
                                        <a href="{{url('single-product')}}" class="text-extra-dark-gray text-black-hover font-weight-500 d-inline-block">Cotton Dark Shirt</a>
                                        <div class="product-price text-medium">&#8377;370</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                           <!-- start shop item -->
                           <li class="grid-item featured-products">
                            <div class="product-box margin-45px-bottom lg-margin-25px-bottom xs-no-margin-bottom">
                                <!-- start product image -->
                                <div class="product-image">
                                    <a href="#">
                                        <img class="default-image" src="{{asset('public/site/images/F3.jpg')}}" alt=""/>
                                        <img class="hover-image" src="{{asset('public/site/images/3.webp')}}" alt=""/>
                                       <div class="pdt-tags"> <span class="product-badge green">sale</span>
                                        <span class="product-badge red">New</span> <span class="product-badge orange">New</span></div>
                                    </a>
                                    <div class="product-overlay bg-gradient-extra-midium-gray-transparent"></div>
                                    <div class="product-hover-bottom text-center padding-35px-tb">
                                        <!--<a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a>-->
                                        <!--<a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a>-->
                                        <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="feather icon-feather-heart"></i> 
<!--<i class='fa fa-heart'></i>-->
</a>
                                    </div>
                                </div>
                                <!-- end product image -->
                                <!-- start product footer -->
                                <div class="product-footer text-center padding-25px-top xs-padding-10px-top">
                                    <a href="{{url('single-product')}}" class="text-extra-dark-gray text-black-hover font-weight-500 d-inline-block">Cotton Dark Shirt</a>
                                    <div class="product-price text-medium">&#8377;370 <span><del>&#8377;599</del></span></div>
                                </div>
                                <!-- end product footer -->
                            </div>
                        </li>
                        <!-- end shop item -->
                        --}}
                        </ul>
                    </div>
                    <!--<div class="col-12 text-center margin-3-rem-top wow animate__fadeIn" data-wow-delay="0.4s">
                        <a href="#" class="btn btn-medium btn-fancy btn-transparent-black">More collection</a>
                    </div>-->
                </div>
            </div>
        </section>
        <!-- end section -->

        @if(isset($sub_banner_data) && count($sub_banner_data) > 0)

        <!-- start section -->
        <section class="bg-light-gray">
           
            <div class="container">  
                <div class="row row-cols-1 row-cols-lg-2">

                    @foreach($sub_banner_data as $sub_banner)
                    <!-- start info banner item -->
                    
                    <div class="col md-margin-30px-bottom wow animate__fadeIn" data-wow-delay="0.2s">

                        @if($sub_banner->link != '')
                        <a href="{{ $sub_banner->link }}"><div class="d-flex align-items-center cover-background h-100 offer_banner_section">
                           <!-- <div class="w-60 md-w-40 sm-w-70 padding-5-rem-all lg-padding-3-rem-lr md-padding-7-rem-tb xs-w-80">
                                <span class="alt-font font-weight-500 text-small text-extra-dark-gray opacity-6 text-uppercase d-block margin-15px-bottom">New fashion</span>
                                <h6 class="alt-font title-extra-small font-weight-600 text-extra-dark-gray">Summer <br />collection</h6>
                                <a href="#" class="btn btn-small btn-fancy btn-white btn-box-shadow">Shop collection</a>
                            </div>-->
                            <img src="{{asset('public/upload/subbanner/'.$sub_banner->image)}}">
                            </div>
                        </a>
                        @elseif($sub_banner->video_link != '' && $sub_banner->link == '')

                            <div class="d-flex align-items-center cover-background h-100">
                            <div class="offer_banner_section">
                                <a href="{{ $sub_banner->video_link }}" class="popup-youtube video-icon-box video-icon-medium d-inline-block">
                                    <!--<span>
                                        <span class="video-icon bg-white">
                                            <i class="fas fa-play text-gradient-orange-pink"></i>
                                        </span>
                                    </span>-->
                                     <img src="{{asset('public/upload/subbanner/'.$sub_banner->image)}}">
                                </a>
                                <!--<h6 class="alt-font font-weight-300 text-white mb-0">Fashion <span class="title-extra-small font-weight-600 d-block">Lookbook</span></h6>-->
                            </div>
                        </div>

                        @else

                        <a href="javascript:void(0)"><div class="d-flex align-items-center cover-background h-100 offer_banner_section">
                           <!-- <div class="w-60 md-w-40 sm-w-70 padding-5-rem-all lg-padding-3-rem-lr md-padding-7-rem-tb xs-w-80">
                                <span class="alt-font font-weight-500 text-small text-extra-dark-gray opacity-6 text-uppercase d-block margin-15px-bottom">New fashion</span>
                                <h6 class="alt-font title-extra-small font-weight-600 text-extra-dark-gray">Summer <br />collection</h6>
                                <a href="#" class="btn btn-small btn-fancy btn-white btn-box-shadow">Shop collection</a>
                            </div>-->
                            <img src="{{asset('public/upload/subbanner/'.$sub_banner->image)}}">
                            </div>
                        </a>

                        @endif


                    </div>
                    
                    <!-- end info banner item -->
                    <!-- start info banner item -->
                    @if($sub_banner->video_link != '' && $sub_banner->link == '')
                    
                    {{--<div class="col md-margin-20px-bottom wow animate__fadeIn" data-wow-delay="0.4s">
                        <div class="d-flex align-items-center cover-background h-100">
                            <div class="offer_banner_section">
                                <a href="{{ $sub_banner->video_link }}" class="popup-youtube video-icon-box video-icon-medium d-inline-block">
                                    <!--<span>
                                        <span class="video-icon bg-white">
                                            <i class="fas fa-play text-gradient-orange-pink"></i>
                                        </span>
                                    </span>-->
                                     <img src="{{asset('public/upload/subbanner/'.$sub_banner->image)}}">
                                </a>
                                <!--<h6 class="alt-font font-weight-300 text-white mb-0">Fashion <span class="title-extra-small font-weight-600 d-block">Lookbook</span></h6>-->
                            </div>
                        </div>
                    </div>--}}
                    @endif

                    @endforeach
                    <!-- end info banner item -->
                </div>
            </div>
            
        </section>
        <!-- end section -->
        @endif
        <!-- start section -->
        <section class="bg-light-gray pt-0">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-3 lg-margin-30px-bottom text-lg-start text-center wow animate__fadeIn" data-wow-delay="0.2s">
                        <h5 class="alt-font text-extra-dark-gray font-weight-600 letter-spacing-minus-1px d-inline-block mb-0">Don't miss out on this deal</h5>
                    </div>
                    <div class="col-xl-6 col-lg-7 md-margin-30px-bottom text-center wow animate__fadeIn" data-wow-delay="0.4s">
                        <div data-enddate="2021/11/14 12:00:00" class="countdown countdown-style-02 text-center alt-font"></div>
                    </div>
                    <div class="col-12 col-xl-3 text-xl-end text-center lg-margin-30px-top wow animate__fadeIn" data-wow-delay="0.6s">
                        <a href="#" class="btn btn-large btn-fancy btn-dark-gray">Shop collection</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5 col-md-6 text-center margin-5-rem-bottom md-margin-3-rem-bottom wow animate__fadeIn">
                        <h4 class="alt-font font-weight-600 text-extra-dark-gray letter-spacing-minus-1px">Love fashion story</h4>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-12 blog-content px-md-0">
                        <ul class="blog-classic blog-wrapper grid grid-loading grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large">
                            <li class="grid-sizer"></li>
                            <!-- start blog item -->
                            <li class="grid-item wow animate__fadeIn">
                                <div class="blog-post">
                                    <div class="blog-post-image margin-40px-bottom md-margin-35px-bottom xs-margin-25px-bottom">
                                        <a href="#"><img src="{{asset('public/site/images/bg1.webp')}}" alt=""/></a>
                                    </div>
                                    <div class="post-details">
                                        <a href="#" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-black-hover d-block margin-20px-bottom xs-margin-10px-bottom">The best way to predict the future is to create it</a>
                                        <p class="w-95">Lorem ipsum is simply dummy text printing typesetting industry lorem ipsum has dummy...</p>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            <!-- start blog item -->
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.2s">
                                <div class="blog-post">
                                    <div class="blog-post-image margin-40px-bottom md-margin-35px-bottom xs-margin-25px-bottom">
                                        <a href="#"><img src="{{asset('public/site/images/bg2.webp')}}" alt=""/></a>
                                    </div>
                                    <div class="post-details">
                                        <a href="#" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-black-hover d-block margin-20px-bottom xs-margin-10px-bottom">Winners make a habit of facturing positive</a>
                                        <p class="w-95">Lorem ipsum is simply dummy text printing typesetting industry lorem ipsum has dummy...</p>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            <!-- start blog item -->
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.4s">
                                <div class="blog-post">
                                    <div class="blog-post-image margin-40px-bottom md-margin-35px-bottom xs-margin-25px-bottom">
                                        <a href="#"><img src="{{asset('public/site/images/bg3.webp')}}" alt=""/></a>
                                    </div>
                                    <div class="post-details">
                                        <a href="#" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-black-hover d-block margin-20px-bottom xs-margin-10px-bottom">Computers are to design as microwaves are to cooking</a>
                                        <p class="w-95">Lorem ipsum is simply dummy text printing typesetting industry lorem ipsum has dummy...</p>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                            <!-- start blog item -->
                            <li class="grid-item wow animate__fadeIn" data-wow-delay="0.6s">
                                <div class="blog-post">
                                    <div class="blog-post-image margin-40px-bottom md-margin-35px-bottom xs-margin-25px-bottom">
                                        <a href="#"><img src="{{asset('public/site/images/bg4.webp')}}" alt=""/></a>
                                    </div>
                                    <div class="post-details">
                                        <a href="#" class="alt-font font-weight-500 text-extra-medium text-extra-dark-gray text-black-hover d-block margin-20px-bottom xs-margin-10px-bottom"> A company is only as good as the people it keeps</a>
                                        <p class="w-95">Lorem ipsum is simply dummy text printing typesetting industry lorem ipsum has dummy...</p>
                                    </div>
                                </div>
                            </li>
                            <!-- end blog item -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="overflow-visible position-relative pt-0 pb-md-0">
            <div class="container">
                <div class="z-index-6 bg-gradient-orange-pink border-radius-6px padding-55px-tb overlap-section-bottom md-padding-40px-all xs-padding-20px-lr">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-lg-5 md-margin-25px-bottom">
                            <h5 class="alt-font font-weight-300 text-white w-90 mb-0 lg-w-100"><span class="font-weight-600">Join our newsletter</span> and get 15% sale discount</h5>
                        </div>
                        <div class="col-12 col-lg-5">
                            <form action="email-templates/subscribe-newsletter.php" method="post">
                                <div class="newsletter-email position-relative d-inline-block w-90 lg-w-100">
                                    <input class="border-radius-5px large-input bg-white border-color-white box-shadow-large m-0 required" name="email" placeholder="Enter your email address" type="email">
                                    <input type="hidden" name="redirect" value="">
                                    <button class="btn border-transperent submit" type="submit"><i class="far fa-envelope icon-extra-small text-gradient-orange-pink"></i></button>
                                    <div class="form-results border-radius-5px position-absolute d-none"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
@include('front.includes.footer')