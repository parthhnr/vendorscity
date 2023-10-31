@include('front.includes.header')

<style type="text/css">
    .qty-minus-new {
    right: 1px;
    top: 20px;
    padding-left: 2px;
    border-radius: 0;
}
.qty-plus-new {
    top: 1px;
    right: 1px;
    border-bottom: 1px solid #e8e8e8;
    height: 20px;
    line-height: 20px;
    padding-left: 1px;
    border-radius: 0;
}
</style>

@php
    $group_pageurl = \DB::table('groups')
        ->where('id', $product_data->group_id)
        ->first();
    $category_pageurl = \DB::table('categories')
        ->where('id', $product_data->cat_id)
        ->first();
    $subcategory_pageurl = \DB::table('subcategories')
        ->where('id', $product_data->subcat_id)
        ->first();
@endphp
<!-- start section -->
        <section class="big-section wow animate__fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-12 shopping-content d-flex flex-column flex-lg-row align-items-md-center">
                        <div class="w-60 md-w-100">
                            <div class="product-images-box lightbox-portfolio row">
                                <div class="col-12 col-lg-9 position-relative px-lg-0 order-lg-2 product-image md-margin-10px-bottom">
                                    <div class="swiper-container product-image-slider" data-slider-options='{ "spaceBetween": 10, "watchOverflow": true, "navigation": { "nextEl": ".slider-product-next", "prevEl": ".slider-product-prev" }, "thumbs": { "swiper": { "el": ".product-image-thumb", "slidesPerView": "auto", "spaceBetween": 15, "direction": "vertical", "navigation": { "nextEl": ".swiper-thumb-next", "prevEl": ".swiper-thumb-prev" } } } }' data-thumb-slider-md-direction="horizontal">
                                        <div class="swiper-wrapper">
                                            <!-- start slider item -->
                                            @foreach ($product_image as $product)
                                            <div class="swiper-slide">
                                                <a class="gallery-link" href="#"><img class="w-100" src="{{asset('public/upload/product/detailpage/'.$product->image) }}" alt=""></a>
                                            </div>
                                            @endforeach
                                            <!-- end slider item -->
                                            {{--
                                            <!-- start slider item -->
                                            <div class="swiper-slide">
                                                <a class="gallery-link" href="#"><img class="w-100" src="{{asset('public/site/images/product-image-27.jpg')}}" alt=""></a>
                                            </div>
                                            <!-- end slider item -->
                                            <!-- start slider item -->
                                            <div class="swiper-slide">
                                                <a class="gallery-link" href="#"><img class="w-100" src="{{asset('public/site/images/product-image-28.jpg')}}" alt=""></a>
                                            </div>
                                            <!-- end slider item -->
                                            <!-- start slider item -->
                                            <div class="swiper-slide">
                                                <a class="gallery-link" href="#"><img class="w-100" src="{{asset('public/site/images/product-image-29.jpg')}}" alt=""></a>
                                            </div>
                                            <!-- end slider item -->
                                            <!-- start slider item -->
                                            <div class="swiper-slide">
                                                <a class="gallery-link" href="#"><img class="w-100" src="{{asset('public/site/images/product-image-30.jpg')}}" alt=""></a>
                                            </div>
                                            <!-- end slider item -->
                                            <!-- start slider item -->
                                            <div class="swiper-slide">
                                                <a class="gallery-link" href="#"><img class="w-100" src="{{asset('public/site/images/product-image-26.jpg')}}" alt=""></a>
                                            </div>
                                            <!-- end slider item -->
                                            --}}
                                        </div>
                                    </div>
                                    <div class="slider-product-next swiper-button-next text-extra-dark-gray"><i class="fa fa-chevron-right"></i></div>
                                    <div class="slider-product-prev swiper-button-prev text-extra-dark-gray"><i class="fa fa-chevron-left"></i></div>
                                </div>
                                <div class="col-12 col-lg-3 order-lg-1 position-relative single-product-thumb md-margin-50px-bottom sm-margin-40px-bottom">
                                    <div class="swiper-container product-image-thumb slider-vertical padding-15px-lr padding-45px-bottom md-no-padding left-0px">
                                        <div class="swiper-wrapper">
                                            @foreach ($product_image as $product)
                                            <div class="swiper-slide"><img class="w-100" src="{{asset('public/upload/product/medium/'.$product->image)}}" alt=""></div>
                                            @endforeach

                                            {{--
                                            <div class="swiper-slide"><img class="w-100" src="{{asset('public/site/images/product-image-27.jpg')}}" alt=""></div>
                                            <div class="swiper-slide"><img class="w-100" src="{{asset('public/site/images/product-image-28.jpg')}}" alt=""></div>
                                            <div class="swiper-slide"><img class="w-100" src="{{asset('public/site/images/product-image-29.jpg')}}" alt=""></div>
                                            <div class="swiper-slide"><img class="w-100" src="{{asset('public/site/images/product-image-30.jpg')}}" alt=""></div>
                                            <div class="swiper-slide"><img class="w-100" src="{{asset('public/site/images/product-image-26.jpg')}}" alt=""></div>
                                            --}}
                                        </div>
                                    </div>
                                    <div class="swiper-thumb-next-prev text-center">
                                        <div class="swiper-button-prev swiper-thumb-prev"><i class="fa fa-chevron-up"></i></div>
                                        <div class="swiper-button-next swiper-thumb-next"><i class="fa fa-chevron-down"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-40 md-w-100 product-summary padding-7-rem-left lg-padding-5-rem-left md-no-padding-left">
                            <div class="breadcrumb text-small p-0">
                                <!-- start breadcrumb -->
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{url('/product/'.$group_pageurl->page_url)}}">Shop</a></li>
                                    <li>{{ $product_data->name }}</li>
                                </ul>
                                <!-- end breadcrumb -->
                            </div>
                            <div class="d-flex align-items-center margin-3-half-rem-tb md-margin-1-half-rem-tb">
                                <div class="flex-grow-1">
                                    <div class="text-extra-dark-gray font-weight-500 text-extra-large alt-font margin-5px-bottom">{{ $product_data->name }}</div>
                                    @php
                                        $minPrice = DB::table('product_attribute')
                                        ->where('pid', $product_data->id)
                                        ->min('price');

                                       // echo "<pre>";print_r($product_data);echo "</pre>";

                                        if($product_data->discount_type != ''){
                                            if($product_data->discount_type == 0){ //percentage
                                                $disc_price_new = $minPrice * $product_data->discount /100 ;

                                                $disc_price = $minPrice - $disc_price_new;
                                            }elseif($product_data->discount_type == 1){
                                                $disc_price = $minPrice - $product_data->discount;
                                            }else{
                                                $disc_price = '0';
                                            }
                                        }else{
                                            $disc_price = '0';
                                        }
                                    @endphp

                                    @if($minPrice != '')
                                    <span class="product-price text-extra-medium">
                                        @if($disc_price != '0')
                                            <del>&#8377;<span id="disc_old_price">{{ $minPrice }}</span></del>
                                            &#8377;<span id="disc_new_price">{{ $disc_price }}</span>
                                            @else
                                            &#8377;<span id="new_price">{{ $minPrice }}</span>
                                            @endif
                                    </span>
                                    @endif
                                </div>

                                @php

                                    $avg_review = DB::table('reviews')
                                            ->select(DB::raw('AVG(rate) as total_avg'))
                                            ->where('product_id', $product_data->id)
                                            ->where('status', 0)
                                            ->get();

                                        if ($avg_review->count() > 0) {
                                            $avg_review_data = $avg_review;
                                        }

                                        if($avg_review_data[0]->total_avg != ''){
                                            $total_avg = round($avg_review_data[0]->total_avg);
                                        }else{
                                            $total_avg = 0;
                                        }

                                        //echo"<pre>";print_r($total_avg);echo"</pre>";
                                @endphp
                                <div class="text-end line-height-30px">
                                    <div><a href="#" class="letter-spacing-3px">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $total_avg)
                                                <i class="fa fa-star text-very-small text-golden-yellow"></i>
                                            @else
                                                <i class="fa fa-star-o text-very-small text-golden-yellow"></i>
                                            @endif
                                        @endfor
                                        <!-- <i class="fas fa-star text-very-small text-golden-yellow"></i>
                                        <i class="fas fa-star text-very-small text-golden-yellow"></i>
                                        <i class="fas fa-star text-very-small text-golden-yellow"></i>
                                        <i class="fas fa-star text-very-small text-golden-yellow"></i>
                                        <i class="fas fa-star text-very-small text-golden-yellow"></i> -->
                                    </a></div>
                                    <span class="text-small"><span class="text-extra-dark-gray">SKU: </span>{{$product_data->sku_code}}</span>
                                </div>
                            </div>
                            <div class="last-paragraph-no-margin">
                                <p>{{ $product_data->short_description }}</p>
                            </div>
                            <div class="margin-4-rem-top">
                                @if(isset($getcolordetail) && count($getcolordetail) > 0)
                                <div class="margin-20px-bottom">
                                    <label class="text-extra-dark-gray text-extra-small font-weight-500 alt-font text-uppercase w-60px">color</label>
                                    <input type="hidden" name="color_id" value="" id="color_id">
                                    <ul class="alt-font shop-color">
                                        @foreach($getcolordetail as $color)
                                        <li>
                                            <input class="d-none" type="radio" id="color-{{ $color->id }}" name="color" value="{{$color->id}}" onclick="size_change('{{ $product_data->id }}',this.value);"/>
                                            <label for="color-{{ $color->id }}"><span style="background-color: #{{$color->code}}"></span></label>
                                        </li>
                                        @endforeach
                                        {{--
                                        <li>
                                            <input class="d-none" type="radio" id="color-2" name="color" />
                                            <label for="color-2"><span style="background-color: #657fa8"></span></label>
                                        </li>
                                        <li>
                                            <input class="d-none" type="radio" id="color-3" name="color" />
                                            <label for="color-3"><span style="background-color: #936f5e"></span></label>
                                        </li>
                                        <li>
                                            <input class="d-none" type="radio" id="color-4" name="color" />
                                            <label for="color-4"><span style="background-color: #97a27f"></span></label>
                                        </li>
                                        --}}
                                    </ul>
                                </div>
                                @endif
                                <div class="margin-4-rem-bottom">
                                    <label class="text-extra-dark-gray text-extra-small font-weight-500 alt-font text-uppercase w-60px">Size</label>
                                     
                                     <input type="hidden" name="size_id" value="" id="size_id">

                                    <ul class="text-extra-small shop-size">
                                        <span id="size_replace">

                                        @if(isset($getsizedetail) && count($getsizedetail) > 0)
                                        @foreach($getsizedetail as $size)
                                        <li>
                                            <input class="d-none" type="radio" id="size-{{$size->id}}" name="size" value="{{$size->id}}" onclick="price_change(this.value);" />
                                            <label for="size-{{$size->id}}" class="width-80"><span>{{$size->sizename}}</span></label>
                                        </li>
                                        @endforeach
                                        @endif
                                         </span>
                                        {{--
                                        <li>
                                            <input class="d-none" type="radio" id="size-2" name="size" />
                                            <label for="size-2" class="width-80"><span>M</span></label>
                                        </li>
                                        <li>
                                            <input class="d-none" type="radio" id="size-3" name="size" />
                                            <label for="size-3" class="width-80"><span>L</span></label>
                                        </li>
                                        --}}
                                    </ul>
                                    <label class="size-chart text-uppercase w-60px margin-10px-left">
                                        <a class="modal-popup alt-font text-extra-small text-decoration-line-bottom" href="#modal-popup">Size Guide</a>
                                    </label>
                                    <div id="modal-popup" class="white-popup-block mfp-hide w-55 mx-auto position-relative bg-white modal-popup-main padding-5-rem-all xl-w-70 md-w-80 md-padding-4-rem-all xs-w-95 xs-padding-3-rem-all">
                                        <div class="table-style-01">
                                            @php 
                                            $size_guide_image = DB::table('subcategories')->where('id',$product_data->subcat_id)->first();
                                            @endphp

                                            @if($size_guide_image->image != '')
                                            <img src="{{ asset('public/upload/size_guide/large/'.$size_guide_image->image) }}"/>
                                            @else
                                            <img src="{{ asset('public/upload/size_guide/large/no-image.png') }}"/>
                                            @endif
                                            <!-- <table>
                                                <tbody>
                                                    <tr class="alt-font bg-extra-dark-gray font-weight-500 text-white">
                                                        <th>SIZE</th>
                                                        <th>S</th>
                                                        <th>M</th>
                                                        <th>L</th>
                                                        <th>XL</th>
                                                        <th>XXL</th>
                                                        <th>2XL</th>
                                                        <th>3XL</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Collar</td>
                                                        <td>14</td>
                                                        <td>15</td>
                                                        <td>16</td>
                                                        <td>17</td>
                                                        <td>18</td>
                                                        <td>19</td>
                                                        <td>20</td>
                                                    </tr>
                                                    <tr class="bg-light-gray">
                                                        <td>Shoulder</td>
                                                        <td>16</td>
                                                        <td>17</td>
                                                        <td>18</td>
                                                        <td>19</td>
                                                        <td>20</td>
                                                        <td>21</td>
                                                        <td>22</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Chest, waist, hips</td>
                                                        <td>28-29</td>
                                                        <td>30-31</td>
                                                        <td>32-33</td>
                                                        <td>34-35</td>
                                                        <td>36-37</td>
                                                        <td>38-39</td>
                                                        <td>40-41</td>
                                                    </tr>
                                                    <tr class="bg-light-gray">
                                                        <td>Cuff</td>
                                                        <td>9</td>
                                                        <td>9.5</td>
                                                        <td>10</td>
                                                        <td>10.5</td>
                                                        <td>11</td>
                                                        <td>11.5</td>
                                                        <td>12</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Short-sleeve length</td>
                                                        <td>10</td>
                                                        <td>10.5</td>
                                                        <td>11</td>
                                                        <td>11.5</td>
                                                        <td>12</td>
                                                        <td>12.5</td>
                                                        <td>13</td>
                                                    </tr>
                                                    <tr class="bg-light-gray">
                                                        <td>Long-sleeve length</td>
                                                        <td>23</td>
                                                        <td>23.5</td>
                                                        <td>24</td>
                                                        <td>24.5</td>
                                                        <td>25</td>
                                                        <td>25.5</td>
                                                        <td>26</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Arm Hole</td>
                                                        <td>22</td>
                                                        <td>22.5</td>
                                                        <td>32</td>
                                                        <td>23.5</td>
                                                        <td>24</td>
                                                        <td>24.5</td>
                                                        <td>25</td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12"><span id="cartvalidate" class="error alert-message valierror"
                                    style="display:none;"></span> </div>
                            <div class="col-12"><span id="product_added" class="successmain alert-message"
                                    style="display:none;"></span> </div>
                            <div>
                                <div class="quantity margin-15px-right">
                                    <label class="screen-reader-text">Quantity</label>
                                    <input type="button" value="-" class="qty-minus-new qty-btn" data-quantity="minus" data-field="quantity">
                                    <input class="input-text qty-text" type="number" name="quantity" value="1" id="quantity_max" min="1" readonly>
                                    <input type="button" value="+" class="qty-plus-new qty-btn" data-quantity="plus" data-field="quantity">
                                </div>
                                <a href="#" class="btn btn-dark-gray btn-medium" onclick="add_to_cart('{{ $product_data->id }}'); return false;">Add to cart</a>
                                <div class="margin-25px-top">
                                     @php if(Session::get('userdata') != ''){ 

                                        $is_wishlist = Helper::check_wishlist($product_data->id);

                                        if($is_wishlist == "1"){
                                            $icon_class = 'fa-heart';
                                        }else{
                                            $icon_class = 'fa-heart-o';
                                        }
                                    @endphp
                                    <a href="javascript:void(0);" onclick="wishlist_data('{{ $product_data->id }}')" class="text-uppercase text-extra-small alt-font margin-20px-right font-weight-500 "><i class="fa {{ $icon_class }} align-middle margin-5px-right"></i>Add to wishlist</a>
                                    @php }else{ @endphp
                                    <a href="{{ route('signin')}}" class="text-uppercase text-extra-small alt-font margin-20px-right font-weight-500 "><i class="fa fa-heart-o align-middle margin-5px-right"></i>Add to wishlist</a>
                                    @php } @endphp
                                    <!-- <a href="#" class="text-uppercase text-extra-small alt-font margin-20px-right font-weight-500 "><i class="feather icon-feather-shuffle align-middle margin-5px-right"></i>Add to compare</a> -->
                                </div>
                            </div>
                            <!-- <div class="d-flex alt-font margin-4-rem-top align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-uppercase text-extra-small font-weight-500 text-extra-dark-gray d-block">Tags: <a href="#" class="font-weight-400">T-shirt</a></span>
                                </div>
                                <div class="text-end social-icon-style-02 w-50">
                                    <ul class="extra-small-icon">
                                        <li><a class="text-extra-dark-gray facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="text-extra-dark-gray twitter" href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="text-extra-dark-gray linkedin" href="http://www.linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a class="text-extra-dark-gray flickr" href="https://www.pinterest.com/" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->

        @php

        $review_count = DB::table('reviews')
            ->where('product_id', $product_data->id)
            ->where('status', 0)
            ->count();

        @endphp
        <section class="border-top border-width-1px border-color-medium-gray pt-0 wow animate__fadeIn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0 tab-style-07">
                        <ul class="nav nav-tabs justify-content-center text-center alt-font font-weight-500 text-uppercase margin-9-rem-bottom border-bottom border-color-medium-gray md-margin-50px-bottom sm-margin-35px-bottom">
                            <li class="nav-item"><a data-bs-toggle="tab" href="#description" class="nav-link active">Description</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#additionalinformation">Additional information</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#reviews">Reviews ({{$review_count}})</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tab-content">
                    <!-- start tab item -->
                    <div id="description" class="tab-pane fade in active show">
                        <div class="row align-items-center">
                            @if($product_data->image != '')
                            <div class="col-12 col-xl-5 col-lg-6 md-margin-50px-bottom">
                                <p>{!! $product_data->description !!}</p>
                                
                            </div>
                            <div class="col-12 col-lg-6 offset-xl-1">
                                <img src="{{asset('public/upload/product/detail_image/'.$product_data->image)}}" alt="">
                            </div>
                            @else

                            <div class="col-12 col-xl-12 col-lg-12 md-margin-50px-bottom">
                                <p>{!! $product_data->description !!}</p>
                                
                            </div>

                            @endif
                        </div>
                    </div>
                    <!-- end tab item -->
                    <!-- start tab item -->
                    <div id="additionalinformation" class="tab-pane fade">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <table class="table-style-02">
                                    <tbody>
                                        <tr>
                                            <th class="text-extra-dark-gray font-weight-500">Color</th>
                                            @php
                                            $color_data = array();
                                            foreach($getcolordetail as $color_list){
                                                
                                                $color_data[] = $color_list->colorname;
                                                
                                            }
                                            $colors = implode(', ', $color_data);
                                            @endphp
                                            <td>{{ $colors }}</td>
                                        </tr>
                                        <tr class="bg-light-gray">
                                            <th class="text-extra-dark-gray font-weight-500">Size</th>
                                            @php
                                            $size_data = array();
                                            foreach($getsizedetail as $size_list){
                                                
                                                $size_data[] = $size_list->sizename;
                                                
                                            }
                                            $sizes = implode(', ', $size_data);
                                            @endphp
                                            <td>{{ $sizes }}</td>
                                        </tr>

                                        @if($product_data->style_type_id != '')
                                        <tr>
                                            <th class="text-extra-dark-gray font-weight-500">Style/Type</th>
                                            @php

                                            $style_ids_array = explode(",", $product_data->style_type_id);

                                            $style_type_data = array();

                                            foreach($style_ids_array as $style_type){
                                               
                                                $style_type_data_new = DB::table('style_types')->where('id',$style_type)->first();

                                                 $style_type_data[] = $style_type_data_new->name;
                                            }

                                            $styletypedata = implode(', ', $style_type_data);


                                            /*echo "<pre>";print_r($styletypedata);echo "</pre>";*/
                                            @endphp
                                            <td>{{ $styletypedata }}</td>
                                        </tr>
                                        @endif


                                        @if($product_data->lining != '')
                                        <tr class="bg-light-gray">
                                            <th class="text-extra-dark-gray font-weight-500">Lining</th>
                                            <td>{{$product_data->lining}}</td>
                                        </tr>
                                        @endif

                                        @if($product_data->material_id != '')
                                        <tr>
                                            <th class="text-extra-dark-gray font-weight-500">Material</th>
                                            @php

                                            $material_ids_array = explode(",", $product_data->material_id);

                                            $material_data = array();

                                            foreach($material_ids_array as $material){
                                               
                                                $material_data_new = DB::table('materials')->where('id',$material)->first();

                                                $material_data[] = $material_data_new->name;
                                            }

                                            $materialdata = implode(', ', $material_data);


                                            /*echo "<pre>";print_r($materialdata);echo "</pre>";*/
                                            @endphp
                                            <td>{{ $materialdata }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>                                
                        </div>
                    </div>
                    <!-- end tab item -->
                    <!-- start tab item -->
                    <div id="reviews" class="tab-pane fade">
                        @if($review_count != 0)

                        @php

                        $review_data = DB::table('reviews')
                                        ->where('product_id', $product_data->id)
                                        ->where('status', 0)
                                        ->orderBy('id', 'desc')
                                        ->get()->toArray();

                        //echo"<pre>";print_r($review_data);echo"</pre>";

                        @endphp
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12 col-lg-10">
                                <ul class="blog-comment margin-5-half-rem-bottom">
                                    @php
                                        foreach($review_data as $review_data_new){
                                    @endphp
                                    <li>
                                        <div class="d-block d-md-flex w-100 align-items-center align-items-md-start">
                                            <div class="w-75px sm-w-50px sm-margin-10px-bottom">
                                                <img src="https://via.placeholder.com/125x125" class="rounded-circle w-95 sm-w-100" alt=""/>
                                            </div>
                                            <div class="w-100 padding-25px-left last-paragraph-no-margin sm-no-padding-left">
                                                <a href="#" class="text-extra-dark-gray text-fast-blue-hover alt-font font-weight-500 text-medium">{{$review_data_new->name;}}</a>
                                                <span class="text-orange text-extra-small float-end letter-spacing-2px">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review_data_new->rate)
                                                            <i class="fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                    <!-- <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i> -->
                                                </span>
                                                <div class="text-medium text-medium-gray margin-15px-bottom">
                                                @php

                                                $date = new DateTime($review_data_new->created_at);

                                                $formattedDate = $date->format('d F Y, g:i A');

                                                @endphp
                                                {{$formattedDate}}
                                                </div>
                                                <p class="w-85">{{$review_data_new->comment;}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @php
                                     }
                                    @endphp
                                    
                                </ul>
                            </div>                            
                        </div>
                        @endif

                        @if(Session::get('userdata') != '')
                        @php
                            $user_id = Session::get('userdata')['userid'];

                            $user_order_data = DB::table('ci_order_item')->where('user_info_id',$user_id)->where('product_id',$product_data->id)->first();


                        @endphp
                        @if($user_order_data != '')
                            @php 
                                $review_data = DB::table('reviews')->where('user_id',$user_id)->where('product_id',$product_data->id)->first();
                            @endphp
                        @if($review_data == '')
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10 margin-4-rem-bottom ">
                                <h6 class="alt-font text-extra-dark-gray font-weight-500 margin-5px-bottom">Add a review</h6>
                                <div class="margin-5px-bottom">Your email address will not be published. Required fields are marked <span class="text-radical-red">*</span></div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-10">
                                <form action="#" method="post" id="review_data">
                                    @csrf

                            <input type="hidden" name="action" id="action" value="add-review">

                            <input type="hidden" name="product_id" id="product_id" value="{{ $product_data->id }}">
                                    <div class="row align-items-center">
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label class="margin-15px-bottom" for="basic-name">Your name <span class="text-radical-red">*</span></label>
                                            <input id="name" class="medium-input border-radius-4px bg-white margin-30px-bottom" type="text" name="name" placeholder="Enter your name">
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <label class="margin-15px-bottom">Your email address <span class="text-radical-red">*</span></label>                                    
                                            <input class="medium-input border-radius-4px bg-white margin-30px-bottom" type="text" name="email" id="email" placeholder="Enter your email">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 margin-30px-bottom">
                                            <label class="margin-15px-bottom">Your rating <span class="text-radical-red">*</span></label>                                    
                                            <span class="text-orange text-extra-small d-block">
                                                <i class="fa fa-star-o rating__star" data-value="1"></i>
                                                <i class="fa fa-star-o rating__star" data-value="2"></i>
                                                <i class="fa fa-star-o rating__star" data-value="3"></i>
                                                <i class="fa fa-star-o rating__star" data-value="4"></i>
                                                <i class="fa fa-star-o rating__star" data-value="5"></i>
                                            </span>

                                            <input type="hidden" name="rate" id="rate_test" class="rating__result" value="" />
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="margin-15px-bottom">Your comment</div>
                                            <textarea class="medium-textarea border-radius-4px bg-white h-120px margin-2-half-rem-bottom" rows="6" name="comment" id="comment" placeholder="Enter your comment"></textarea>
                                        </div>
                                        <span id="comment_error" class="error alert-message valierror" style="display:none;text-align: left;"></span>
                                        <div class="col-12 sm-margin-20px-bottom">
                                            <input class="btn btn-medium btn-dark-gray mb-0 btn-round-edge-small" type="button"  onclick="javascript:validate();return false;" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endif
                        @endif
                    </div>
                    <!-- end tab item -->
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        @if(isset($relatedproduct) && count($relatedproduct) > 0)
        <section class="border-top border-width-1px border-color-medium-gray wow animate__fadeIn">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5 col-md-6 text-center margin-4-rem-bottom sm-margin-2-rem-bottom">
                        <span class="alt-font font-weight-500 text-uppercase d-inline-block margin-5px-bottom">You may also like</span>
                        <h5 class="alt-font font-weight-500 text-extra-dark-gray letter-spacing-minus-1px">Related products</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="product-listing shop-wrapper grid grid-loading grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                            <li class="grid-sizer"></li>
                            <!-- start shop item -->
                            @foreach($relatedproduct as $all_product)

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
                            <li class="grid-item">
                                <div class="product-box">
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
                                            <!-- <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to cart"><i class="feather icon-feather-shopping-cart"></i></a> -->
                                            <!-- <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Quick shop"><i class="feather icon-feather-zoom-in"></i></a> -->
                                            @php if(Session::get('userdata') != ''){ 

                                                $is_wishlist = Helper::check_wishlist($all_product->id);

                                                if($is_wishlist == "1"){
                                                    $icon_class = 'fa-heart';
                                                }else{
                                                    $icon_class = 'fa-heart-o';
                                                }
                                            @endphp
                                            <a href="javascript:void();" onclick="wishlist_data('{{ $all_product->id }}')" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="fa {{ $icon_class }}"></i></a>
                                            @php }else{ @endphp
                                            <a href="#" class="product-link-icon move-top-bottom" data-bs-toggle="tooltip" data-placement="top" title="" data-original-title="Add to wishlist"><i class="fa fa-heart-o"></i></a>
                                            @php } @endphp
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
                            {{--
                            <li class="grid-item">
                                <div class="product-box">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/F1.jpg')}}" alt=""/>
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
                                        <a href="#" class="text-extra-dark-gray font-weight-500 d-inline-block">Cotton Jacket</a>
                                        <div class="product-price text-medium">&#8377;370</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="product-box">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/F3.jpg')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/1_2.webp')}}" alt=""/>
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
                                        <a href="#" class="text-extra-dark-gray font-weight-500 d-inline-block">Outlaw Jacket</a>
                                        <div class="product-price text-medium">&#8377;400</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            <!-- end shop item -->
                            <!-- start shop item -->
                            <li class="grid-item">
                                <div class="product-box">
                                    <!-- start product image -->
                                    <div class="product-image border-radius-6px">
                                        <a href="#">
                                            <img class="default-image" src="{{asset('public/site/images/F4.jpg')}}" alt=""/>
                                            <img class="hover-image" src="{{asset('public/site/images/1_4.webp')}}" alt=""/>
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
                                        <a href="single-product.html" class="text-extra-dark-gray font-weight-500 d-inline-block">Cotton Dark Shirt</a>
                                        <div class="product-price text-medium">&#8377;370</div>
                                    </div>
                                    <!-- end product footer -->
                                </div>
                            </li>
                            --}}
                            <!-- end shop item -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <!-- end section -->
@include('front.includes.footer')

<script>
    function add_to_cart(product_id) {

        // alert({{$product_data->id}});return false;
        // var color = $('#color-{{ $product_data->id }}').val();
        // var size = $('#size').val();
        // var dimensions = $('#dimensions').val();
        // var finish = $('#finish').val();


        var color = $('#color_id').val();
        var size = $('#size_id').val();
        // alert(size);return false;
        
        if (color == '') {
            $("#cartvalidate").html("Please Select Color");
            $('#cartvalidate').show().delay(0).fadeIn('show');
            $('#cartvalidate').show().delay(2000).fadeOut('show');
            return false;
        }
        if (size == '') {
            $("#cartvalidate").html("Please Select Size");
            $('#cartvalidate').show().delay(0).fadeIn('show');
            $('#cartvalidate').show().delay(2000).fadeOut('show');
            return false;
        }
        
        var qty = $('#quantity_max').val();

        $.ajax({

            type : 'POST',
            url  : '{{ url('add_to_cart ') }}',
            data : {

                    "_token": "{{ csrf_token() }}",
                    'color': color,
                    'qty': qty,
                    'pid': product_id,
                    'size': size,
            },

            success :function(msg){
                if(msg != 0){

                    $("#header_cart").load(location.href + " #header_cart");
                    $("#header_cart_count").load(location.href + " #header_cart_count");

                    $("#message_succsess").html("Product Added To Cart");
                    $('#message_succsess').show().delay(0).fadeIn('show');
                    $('#message_succsess').show().delay(2000).fadeOut('show');
                    return false;
                }
            }
        });


        // $.ajax({

        //     type: 'POST',
        //     url: '{{ url('add_to_cart ') }}',
        //     data: {
        //         "_token": "{{ csrf_token() }}",
        //         'color': color,
        //         'size': size,
        //         'finish': finish,
        //         'dimensions': dimensions,
        //         'finish': finish,
        //         'qty': qty,
        //         'pid': product_id,
        //     },
        //     success: function(msg) {
        //         // alert(msg);return false;
        //         if (msg == 'nostock') {
        //             $("#cartvalidate").html("Out Of Stock");
        //             $('#cartvalidate').show().delay(0).fadeIn('show');
        //             $('#cartvalidate').show().delay(2000).fadeOut('show');
        //             $("#mydiv_pc").load(location.href + " #mydiv_pc");
        //             $("#mydiv_mobile").load(location.href + " #mydiv_mobile");
        //             return false;
        //         } else {
        //             $('.cart-count-total').text(msg);
        //             $("#product_added").html("Product Added to Cart");
        //             $('#product_added').show().delay(0).fadeIn('show');
        //             $('#product_added').show().delay(2000).fadeOut('show');
        //             $("#mydiv_pc").load(location.href + " #mydiv_pc");
        //             $("#mydiv_mobile").load(location.href + " #mydiv_mobile");
        //             return false;
        //         }
        //     }
        // });



    }
</script>
<script>
    function size_change(product_id,color) {

        $('#color_id').val(color);
        $('#size_id').val('');
        // alert(color);
        var url = "{{ url('size_show') }}";
        // alert(url);
        $.ajax({
            url: url,
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "product_id": product_id,
                "color": color
            },
            success: function(msg) {
                //alert(msg);
                 document.getElementById('size_replace').innerHTML = msg;
            }

        });



    }


    function price_change(size_id) {

        $('#size_id').val(size_id);

        var color = $('#color_id').val();
        
        var p_id = '{{ $product_data->id }}';

        var url = '{{ url('price_show') }}';

        var discount = '{{ $product_data->discount }}';

        var discount_type = '{{ $product_data->discount_type }}';

         
        $.ajax({
            url: url,
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "size_id": size_id,
                "color_id": color,
                "p_id": p_id
            },
            success: function(msg) {

               var response_ajax = JSON.parse(msg);

                if (response_ajax.response == "success") {
                    
                    if(discount_type == 2){
                       
                       // document.getElementById('disc_old_price').innerHTML =(response_ajax.price);
                       
                       
                        document.getElementById('new_price').innerHTML =(response_ajax.price);
                       
                    }else{
                        
                        if (discount > 0) {
                            
                            if(discount_type == 0){
                                
                                var msg = response_ajax.price - (response_ajax.price * (discount / 100));
                                document.getElementById('disc_new_price').innerHTML =Math.round(msg);
                                
                                 document.getElementById('disc_old_price').innerHTML =Math.round(response_ajax.price);
                            } 
                            
                            if(discount_type == 1){
                                
                                var msg = response_ajax.price - discount;
                                document.getElementById('disc_new_price').innerHTML =Math.round(msg);
                                
                                 document.getElementById('disc_old_price').innerHTML =Math.round(response_ajax.price);
                            }
                        }
                    }
                   $("#quantity_max").val(1);
                    $("#quantity_max").attr("max", response_ajax.qty);
                }
            }
        });



    }
    
     document.addEventListener("DOMContentLoaded", function() {
    // Get the input element and plus/minus buttons
    var inputElement = document.getElementById("quantity_max");
    var minusButton = document.querySelector(".qty-minus-new");
    var plusButton = document.querySelector(".qty-plus-new");

    // Add click event listener to the minus button
    minusButton.addEventListener("click", function() {
        var currentValue = parseInt(inputElement.value);
        if (currentValue > inputElement.min) {
            inputElement.value = currentValue - 1;
        }
    });

    // Add click event listener to the plus button
    plusButton.addEventListener("click", function() {
        var currentValue = parseInt(inputElement.value);
        if (currentValue < inputElement.max) {
            inputElement.value = currentValue + 1;
        }
    });
});

</script>
<script>
    function wishlist_data(product_id) {
         // alert(product_id);return false;
        $.ajax({
            type: 'POST',
            url: "{{ url('add-to-wishlist') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "product_id": product_id

            },
            success: function(msg) {
                if (msg == '1') {
                    $("#message_succsess").css("display", "block", );
                    $("#message_succsess").css("text-align", "center");
                    $("#message_succsess").css("background-color", "#00cccc");
                    $("#message_succsess").css("color", "white");
                    $("#message_succsess").addClass("success");
                    $('#message_succsess').show().delay(0).fadeIn('slow');
                    $('#message_succsess').hide().delay(2000).fadeOut('slow');
                    $("#message_succsess").html(
                        "<i class='fa fa-check'></i>Product has been added to your Wishlist.");

                    $(".wishlist-btn a i").addClass("active");
                    // $('html, body').animate({
                    //     scrollTop: $('#message_succsess').offset().top - 1000
                    // }, 1000);
                    setTimeout(function() {
                        document.location.reload()
                    }, 2000);

                } else {
                    $("#message_error").css("display", "block");
                    $("#message_error").css("text-align", "center");
                    $('#message_error').show().delay(0).fadeIn('slow');
                    $('#message_error').hide().delay(2000).fadeOut('slow');
                    // $('html, body').animate({
                    //     scrollTop: $('#message_error').offset().top - 1000
                    // }, 1000);
                    $("#message_error").html(
                        "<i class='fa fa-check'></i>Product is already in your wishlist.");
                }

            }


        });

    }
</script>

<script type="text/javascript">
    function validate(){
        // alert('test');
        var name = jQuery("#name").val();
        // alert("name");
        if (name == '') { 
            jQuery('#comment_error').html("Please Enter Name");
            jQuery('#comment_error').show().delay(0).fadeIn('show');
            jQuery('#comment_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var email = jQuery("#email").val();
        if(email == ''){
            jQuery('#comment_error').html("Please Enter Email");
            jQuery('#comment_error').show().delay(0).fadeIn('show');
            jQuery('#comment_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var filter=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!filter.test(email)){
            jQuery('#comment_error').html("Please Enter Valid Email");
            jQuery('#comment_error').show().delay(0).fadeIn('show');
            jQuery('#comment_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var ratting = jQuery("#rate_test").val();
        if (ratting == 0) {

            //alert('phone');
            jQuery('#comment_error').html("Please Give Rating");
            jQuery('#comment_error').show().delay(0).fadeIn('show');
            jQuery('#comment_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var comment = jQuery("#comment").val();
        if(comment == ''){
            jQuery('#comment_error').html("Please Enter Comment");
            jQuery('#comment_error').show().delay(0).fadeIn('show');
            jQuery('#comment_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var product_id = jQuery("#product_id").val();

        //jQuery('#review_data').submit();

        

        $.ajax({
            type: 'POST',
            url: "{{ url('add-review') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "name": name,
                "email": email,
                "rate": ratting,
                "comment": comment,
                "product_id": product_id

            },
            success: function(msg) {
                if (msg == '1') {
                    
                    $("#message_succsess").html("Review Added Successfully");
                    $('#message_succsess').show().delay(0).fadeIn('show');
                    $('#message_succsess').show().delay(2000).fadeOut('show');
                    setTimeout(function() {
                        document.location.reload()
                    }, 2000);
                } else {
                    return false;
                }

            }


        });

        
    }
</script>

<script>
    var selectedStars = 0; // Initialize the selected stars
    // Add click event listeners to the star elements
    var stars = document.querySelectorAll(".rating__star");
    stars.forEach(function(star) {
        star.addEventListener("click", function() {
            selectedStars = parseInt(star.getAttribute("data-value"));
            document.getElementById("rate_test").value = selectedStars;

            stars.forEach(function(s) {
                var value = parseInt(s.getAttribute("data-value"));
                if (value <= selectedStars) {
                    s.classList.remove("fa-star-o");
                    s.classList.add("fa-star");
                } else {
                    s.classList.remove("fa-star");
                    s.classList.add("fa-star-o");
                }
            });
        });
    });
</script>
