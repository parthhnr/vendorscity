@include('front.includes.header')



<!-- start page title -->

        <section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">

            <div class="container">

                <div class="row align-items-center justify-content-center">

                    <div class="col-12 col-xl-8 col-lg-6">

                        <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Wishlist</h1>

                    </div>

                    <div class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">

                        <ul class="xs-text-center">

                            <li><a href="{{url('/')}}">Home</a></li>

                            <li><a href="{{url('product-listing')}}">Shop</a></li>

                            <li>Wishlist</li>

                        </ul>

                    </div>

                </div>

            </div>

        </section>

        <!-- end page title -->

        <!-- start section -->

        <section class="wow animate__fadeIn">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12 padding-70px-right lg-padding-30px-right md-padding-15px-right">

                        <div class="row align-items-center">

                            <div class="col-12">
                                @php
                                    if(Session::get('userdata') != ''){
                                        $uid = Session::get('userdata')['userid'];
                                        $allwishlist = DB::table('products as p')
                                        ->select('p.*', 'wishlist.id as wish_id')
                                        ->leftJoin('product_image as im', function ($join) {
                                            $join->on('im.pid', '=', 'p.id')
                                                ->where('im.baseimage', '=', 1);
                                        })
                                        ->join('wishlist', 'wishlist.product_id', '=', 'p.id')
                                        ->where('wishlist.userid', $uid)
                                        ->orderBy('wishlist.id', 'desc')
                                        ->addSelect([
                                            DB::raw('(SELECT MIN(price) FROM product_attribute WHERE pid = p.id) AS minprice'),
                                            DB::raw('IFNULL(im.image, "noimage.jpg") AS base_image'),
                                        ])
                                        ->get();
                                       /*echo "<pre>";print_r($allwishlist);echo "</pre>";*/
                                    }else{
                                        $allwishlist = '';  
                                    }

                                    if($allwishlist != ''){
                                @endphp
                                <table class="table cart-products margin-60px-bottom md-margin-40px-bottom sm-no-margin-bottom">

                                    <thead>

                                        <tr>

                                            <th scope="col" class="alt-font"></th>

                                            <th scope="col" class="alt-font"></th>

                                            <th scope="col" class="alt-font">Product</th>

                                            <th scope="col" class="alt-font">Price</th>

                                            <th scope="col" class="alt-font">Stock Status</th>

                                            <th scope="col" class="alt-font"></th>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        @php foreach($allwishlist as $allwishlist_details){ 

                                            $minprice = $allwishlist_details->minprice;

                                            $quantity = DB::table('product_attribute')
                                                ->where('pid', $allwishlist_details->id)
                                                ->where('price', $minprice)
                                                ->value('qty');
                                        @endphp
                                        <tr> 

                                            <td class="product-remove">

                                                <a href="javascript:void(0);" onclick="removeWishlistProduct('{{ route('delete_wishlist', ['id' => $allwishlist_details->id]) }}')" class="btn-default text-large">&times;</a>

                                            </td>
                                            @if($allwishlist_details->base_image != '')
                                            <td class="product-thumbnail"><a href="{{url('product-detail/' . $allwishlist_details->page_url)}}"><img class="cart-product-image" src="{{asset('public/upload/product/small/'.$allwishlist_details->base_image)}}" alt=""></a></td>
                                            @else
                                            <td class="product-thumbnail"><a href="#"><img class="cart-product-image" src="{{asset('public/upload/product/small/no-image.png')}}" alt=""></a></td>
                                            @endif

                                            <td class="product-name">

                                                <a href="{{url('product-detail/' . $allwishlist_details->page_url)}}">{{ $allwishlist_details->name }}</a>

                                                <!-- <span class="variation"> Size: L</span> -->

                                            </td>
                                            @php
                                                if($allwishlist_details->discount_type != ''){
                                                    if($allwishlist_details->discount_type == 0){ //percentage
                                                        $disc_price_new = $minprice * $allwishlist_details->discount /100 ;
                                                        $disc_price = $minprice - $disc_price_new;
                                                    }elseif($allwishlist_details->discount_type == 1){
                                                        $disc_price = $minprice - $allwishlist_details->discount;
                                                    }else{
                                                        $disc_price = '0';
                                                    }
                                                }else{
                                                    $disc_price = '0';
                                                }
                                            @endphp
                                            @if($minprice != '')
                                            <td class="product-price" data-title="Price">
                                            @if($disc_price != '0')
                                            <del>&#8377;{{ $minprice }}</del>
                                            &#8377;{{ $disc_price }}
                                            @else
                                            &#8377;{{ $minprice }}
                                            @endif</td>
                                            @endif

                                            <td class="product-quantity" data-title="Quantity">@if($quantity != 0)
                                                 In Stock
                                                @else
                                                Out of Stock
                                                @endif

                                               

                                            </td> 

                                            <td class="product-subtotal" data-title="Total">

                                                <a href="{{url('product-detail/' . $allwishlist_details->page_url)}}" class="btn btn-fancy btn-small btn-transparent-light-gray">Add To Cart</a>

                                            </td> 

                                        </tr>
                                        @php } @endphp
                                        {{--
                                        <tr> 

                                            <td class="product-remove">

                                                <a href="#" class="btn-default text-large">&times;</a>

                                            </td>

                                            <td class="product-thumbnail"><a href="#"><img class="cart-product-image" src="{{asset('public/site/images/product-image-8.jpg')}}" alt=""></a></td>

                                            <td class="product-name">

                                                <a href="{{url('single-product')}}">Down Bomber</a>

                                                <span class="variation">Size: L</span>

                                            </td>

                                            <td class="product-price" data-title="Price">&#8377;510</td>

                                            <td class="product-quantity" data-title="Quantity">

                                                In Stock

                                            </td>

                                            <td class="product-subtotal" data-title="Total">

                                <a href="#" class="btn btn-fancy btn-small btn-transparent-light-gray">Add To Cart</a>

                                            </td> 

                                        </tr>

                                        <tr>

                                            <td class="product-remove">

                                                <a href="#" class="btn-default text-large">&times;</a> 

                                            </td>

                                            <td class="product-thumbnail"><a href="#"><img class="cart-product-image" src="{{asset('public/site/images/product-image-1.jpg')}}" alt=""></a></td>

                                            <td class="product-name">

                                                <a href="{{url('single-product')}}">Isabel Marant</a>

                                                <span class="variation">Size: L</span>

                                            </td>

                                            <td class="product-price" data-title="Price">&#8377;2990</td>

                                            <td class="product-quantity" data-title="Quantity">

                                                In Stock

                                            </td>

                                            <td class="product-subtotal" data-title="Total">

                                <a href="#" class="btn btn-fancy btn-small btn-transparent-light-gray">Add To Cart</a>

                                            </td> 

                                        </tr>
                                        --}}

                                    </tbody>

                                </table>
                                @php } @endphp

                            </div>

                            

                        </div>

                    </div>

                   

                </div>

            </div>

        </section>

        <!-- end section -->

        

@include('front.includes.footer')
<script>
function removeWishlistProduct(base_url) {
    // alert(base_url);
    var conf = confirm("Are you sure you want to delete");
    if (conf == true) {
        window.location = base_url;
        return true;
    } else {
        return false;
    }
}
</script>