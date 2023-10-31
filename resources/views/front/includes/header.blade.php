 <!doctype html>
<html class="no-js" lang="en">
    <head>
        @if($meta_title != '')
        <title>{{$meta_title}}</title>

        @else
        <title>Sagar Store</title>

        @endif
        
        <meta charset="utf-8">
        @if($meta_keyword != '')
        <meta name="keywords" content="{{$meta_keyword}}" />
        @endif

        @if($meta_description)
        <meta name="description" content="{{$meta_description}}" />
        @endif
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="author" content="ThemeZaa">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
         <meta name="description" content="">  -->
        <!-- favicon icon -->
        <!-- <link rel="shortcut icon" href="images/favicon.png"> -->
        <link rel="apple-touch-icon" href="{{asset('public/site/images/apple-touch-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('public/site/images/apple-touch-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{asset('public/site/images/apple-touch-icon-114x114.png')}}">
        <!-- style sheets and font icons  -->
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/font-icons.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/theme-vendors.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/style.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/css/style-p.css')}}" />

        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <!-- revolution slider -->
        <link rel='stylesheet' href="{{asset('public/site/revolution/revolution-addons/bubblemorph/css/revolution.addon.bubblemorph.css')}}" type='text/css' media='all' />
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/revolution/css/settings.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/revolution/css/layers.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/site/revolution/css/navigation.css')}}">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .valierror {
        background-color: #ee2e34;
        border-color: #ee2e34;
        color: #fff;
    }
    .alert-message {
        background-size: 40px 40px;
        background-image: linear-gradient(
    135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent);
        /* box-shadow: inset 0 -1px 0 rgb(255 255 255 / 40%); */
        width: 100%;
        border: 0px solid;
        color: #fff;
        padding: 10px;
        
        animation: animate-bg 5s linear infinite;
        display: block;
        margin-bottom: 5px;
        top: 0;
    z-index: 9999;
    }
    .successmain {
        background-color: #09c6ab;
        border-color: #09c6ab;
    }
    .size_active {
        background: #ABABAB;
        color: #000;
        border: 1px solid #09c6ab !important;
    }
    .color_active {
        border: 1px solid #09c6ab !important;
    }
    .alert-message_cart {
        background-size: 40px 40px;
        background-image: linear-gradient(
    135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent);
        width: 100%;
        border: 0px solid;
        color: #000;
        padding: 10px;
        animation: animate-bg 5s linear infinite;
    }
    .topalert_cart {
        z-index: 9999;
        text-align: center;
        padding: 10px;
        font-size: 18px;
        color: #fff !important;
        position: fixed;
        top: 0px;
    }
    .successcart {
        background-color: #09c6ab;
        border-color: #09c6ab;
    }    
    @media (min-width: 992px){
        .navbar-expand-lg .navbar-collapse {
        display: flex!important;
        flex-basis: auto;
        float: right;
        }    
    }
    .contact_successmain {
        background-color: #09c6ab;
        border-color: #09c6ab;
        z-index: 9999999;
        position: absolute;
    }
    .contact_successmain1 {
        background-color: #09c6ab;
        border-color: #09c6ab;
        z-index: 9999999;
        /*position: absolute;*/
    }
    .ui-menu{
        z-index: 3500 !important;
    }
     .ad-tag {
        position: absolute; left:initial;
        right: 12px;
        top: 4%;
    }
    </style>
        
    </head>
    <body data-mobile-nav-style="classic">
 <!-- start header -->
 <div id="message_succsess" class="successmain alert-message topalert" style="text-align: center;display: none; position: fixed;"></div>
 <div id="message_error" class="valierror alert-message topalert" style="display:none;text-align: center;
 position: fixed;"></div>

        <header class="header-with-topbar">
            <div class="top-bar bg-extra-dark-gray d-none d-md-inline-block padding-35px-lr md-no-padding-lr">
                <div class="container-fluid nav-header-container">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="col-12 text-center text-sm-start col-sm-auto me-auto ps-lg-0">
                            <p class="text-medium m-0"><span class="font-weight-500 text-white">Offer: </span>Worldwide free shipping for all orders of $150</p>
                        </div>
                        <div class="col-auto d-none d-sm-block text-end px-lg-0 font-size-0">
                            <div class="top-bar-contact">
                                <span class="top-bar-contact-list border-none md-no-padding-right">
                                    <i class="feather icon-feather-phone-call icon-extra-small text-white"></i>+91 9876543210
                                </span>
                                <span class="top-bar-contact-list d-none d-lg-inline-block border-none pe-0">
                                    <i class="feather icon-feather-map-pin icon-extra-small text-white"></i>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start navigation -->
            <nav class="navbar navbar-expand-lg navbar-boxed navbar-light bg-white header-light top-space fixed-top header-reverse-scroll">
                <div class="container-fluid nav-header-container">
                    <div class="col-auto col-sm-6 col-lg-2 me-auto ps-lg-0">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('public/site/images/sagar-logo.png')}}" data-at2x="{{asset('public/site/images/sagar-logo.png')}}" alt="" class="default-logo">
                            <!--<img src="images/sagar-logo.png" data-at2x="images/sagar-logo.png" alt="" class="alt-logo">-->
                            <!--<img src="images/sagar-logo.png" data-at2x="images/sagar-logo.png" class="mobile-logo" alt="">-->
                        </a>
                    </div>
                    <div class="col-auto col-lg-8 menu-order px-lg-0">
                        <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                            <span class="navbar-toggler-line"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav alt-font">
                                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>

                                @php
                                
                               // $groups = DB::select('SELECT * FROM groups ORDER BY set_order ASC');

                               $groups = DB::table('groups')->orderBy('set_order', 'ASC')->get()->toArray();

                                //echo "<pre>";print_r($groups);echo"</pre>";exit;
                                
                                $blank_count= 0;

                                @endphp
                                
                                @if($groups != '')
                                @foreach($groups as $groups_data)

                                

                                <li class="nav-item dropdown megamenu">
                                    <a href="{{url('/product/'.$groups_data->page_url)}}" class="nav-link">{{ $groups_data->name }}</a>
                                    <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                                    <div class="menu-back-div dropdown-menu megamenu-content" role="menu" style="@php if($blank_count == 0){echo "display:none";} @endphp">
                                        <div class="d-lg-flex justify-content-center">
                                            @php                               
                                               //$categories = DB::select('SELECT * FROM categories WHERE group_id = '.$groups_data->id.' ORDER BY set_order ASC');

                                               $categories = DB::table('categories')->where('group_id', $groups_data->id)->orderBy('set_order', 'ASC')->get()->toArray();

                                            //echo "<pre>";print_r($categories);echo"</pre>";
                                            
                                            
                                            @endphp

                                            @if($categories != '')
                                            
                                            @php
                                                $blank_count+=1;
                                            @endphp
                                            @foreach($categories as $categories_data)
                                            <ul class="d-lg-inline-block">
                                                <li class="dropdown-header"><a href="{{url('/product/'.$groups_data->page_url.'/'.$categories_data->page_url)}}"> {{ $categories_data->name }}</a></li>


                                                @php                               
                                               //$subcategories = DB::select('SELECT * FROM subcategories WHERE group_id = '.$groups_data->id.' and cat_id = '.$categories_data->id.' ORDER BY set_order ASC');
                                               $subcategories = DB::table('subcategories')->where('group_id', $groups_data->id)->where('cat_id', $categories_data->id)->orderBy('set_order', 'ASC')->get()->toArray();

                                                 //echo "<pre>";print_r($subcategories);echo"</pre>";
                                                 @endphp


                                                @if($subcategories != '')
                                                @foreach($subcategories as $subcategories_data)
                                                <li>
                                                        <a href="{{url('/product/'.$groups_data->page_url.'/'.$categories_data->page_url.'/'.$subcategories_data->page_url)}}">{{ $subcategories_data->name }}</a>
                                                </li>
                                                @endforeach
                                                @endif

                                                
                                            </ul>
                                            @endforeach
                                            @endif

                                            {{-- <ul class="d-lg-inline-block">
                                                <li class="dropdown-header">Women Casualwear</li>
                                                <li><a href="{{url('/product-listing')}}">Evening Gown</a></li>
                                                <li><a href="{{url('/product-listing')}}">Skirt</a></li>
                                                <li><a href="{{url('/product-listing')}}">Crop Top</a></li>
                                                <li><a href="{{url('/product-listing')}}">Indo Western</a></li>
                                            </ul> --}}
                                           
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                                <!--
                                <li class="nav-item dropdown megamenu">
                                    <a href="javascript:void(0);" class="nav-link">Men's Wear</a>
                                    <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                                    <div class="menu-back-div dropdown-menu megamenu-content" role="menu">
                                        <div class="d-lg-flex justify-content-center">
                                            <ul class="d-lg-inline-block">
                                                <li class="dropdown-header">Men's Wear</li>
                                                <li><a href="{{url('/product-listing')}}">Suit</a></li>
                                                <li><a href="{{url('/product-listing')}}">Indo Western</a></li>
                                                <li><a href="{{url('/product-listing')}}">Suit Blazer</a></li>
                                                <li><a href="{{url('/product-listing')}}">Jackets</a></li>
                                                <li><a href="{{url('/product-listing')}}">Kurta Pajama</a></li>
                                            </ul>
                                          
                                           
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown megamenu">
                                    <a href="javascript:void(0);" class="nav-link">Kid's Wear</a>
                                    <i class="fa fa-angle-down dropdown-toggle" data-bs-toggle="dropdown" aria-hidden="true"></i>
                                    <div class="menu-back-div dropdown-menu megamenu-content" role="menu">
                                        <div class="d-lg-flex justify-content-center">
                                            <ul class="d-lg-inline-block">
                                                <li class="dropdown-header">Boys</li>
                                                <li><a href="{{url('/product-listing')}}">Suit</a></li>
                                                <li><a href="{{url('/product-listing')}}">Blazers</a></li>
                                                <li><a href="{{url('/product-listing')}}">Indo Western</a></li>
                                            </ul>
                                            <ul class="d-lg-inline-block">
                                                <li class="dropdown-header">Girls</li>
                                                <li><a href="{{url('/product-listing')}}">Gown</a></li>
                                                <li><a href="{{url('/product-listing')}}">Crop Top</a></li>
                                                <li><a href="{{url('/product-listing')}}">Skirts</a></li>
                                                <li><a href="{{url('/product-listing')}}">Indo Western</a></li>
                                            </ul>
                                           
                                        </div>
                                    </div>
                                </li>-->
                              
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto col-lg-2 text-end pe-0 font-size-0">
                        <div class="header-search-icon search-form-wrapper">
                            <a href="javascript:void(0)" class="search-form-icon header-search-form"><i class="feather icon-feather-search"></i></a>
                            <!-- start search input --> 
                            <div class="form-wrapper">
                                <button title="Close" type="button" class="search-close alt-font">×</button>
                                <form id="search-form" role="search" method="get" class="search-form text-start" action="search-result.html">
                                    <div class="search-form-box">
                                        <span class="search-label alt-font text-small text-uppercase text-medium-gray">What are you looking for?</span>
                                        <input class="search-input alt-font" id="search-form-input5e219ef164995" placeholder="Enter your keywords..." name="s" value="" type="text" autocomplete="off">
                                        <button type="submit" class="search-button">
                                            <i class="feather icon-feather-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end search input --> 
                        </div>
                        <div class="header-cart-icon dropdown">
                            <a href="javascript:void(0);"><i class="feather icon-feather-shopping-bag"></i>
                               <div id="header_cart_count">
                               <span class="cart-count alt-font bg-extra-dark-gray text-white">{{Cart::count()}}</span>
                               </div>
                            </a>
                            
                            <ul class="dropdown-menu cart-item-list">
                                <div id="header_cart">
                                @if(Cart::count() > 0)

                                @php
                                    $subtotal =0;
                                @endphp
                                @foreach(Cart::content() as $items)
                                <li class="cart-item align-items-center">
                                    <a href="javascript:void(0);" onclick="remove_to_cart('{{ $items->rowId }}'); return false;" class="alt-font close">×</a>
                                    <div class="product-image">
                                        <a href="{{url('product-detail/' . $items->options->page_url)}}"><img src="{{asset('public/upload/product/large/'.$items->options->image)}}" class="cart-thumb" alt="" /></a>
                                    </div>
                                    <div class="product-detail alt-font">
                                        <a href="{{url('product-detail/' . $items->options->page_url)}}">{{$items->name}}</a>

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

                                        @if($disc_price != '0')
                                            <span class="item-ammount"><del>&#8377;{{ $items->price }}</del> &#8377;{{$disc_price}}</span> 
                                        @else
                                            <span class="item-ammount">&#8377;{{$items->price}} </span> 
                                        @endif

                                        <span class="item-ammount">Size: {{$items->options->size_name}} </span>
                                        <span class="item-ammount">Colour: {{$items->options->color_name}} </span>

                                       
                                    </div>
                                </li>
                                @php

                                    if($items->qty >= 1){
                                        $subtotal += $items->qty * round($p_price);
                                    }else{
                                        $subtotal += round($p_price);
                                    }

                                    

                                @endphp
                                 @endforeach
                               <!--  <li class="cart-item align-items-center">
                                    <a href="javascript:void(0);" class="alt-font close">×</a>
                                    <div class="product-image">
                                        <a href="#"><img src="https://via.placeholder.com/150x191" class="cart-thumb" alt="" /></a>
                                    </div>
                                    <div class="product-detail alt-font">
                                        <a href="{{url('single-product')}}">Elegant Peach Semi Organza Printed Saree</a>
                                        <span class="item-ammount">	&#8377; 1999</span> 
                                    </div>
                                </li> -->
                                <li class="cart-item cart-total">
                                    <div class="alt-font margin-15px-bottom"><span class="w-50 d-inline-block text-medium text-uppercase">Subtotal:</span><span class="w-50 d-inline-block text-end text-medium font-weight-500">&#8377;{{$subtotal}}</span></div>
                                    <a href="{{url('/cart')}}" class="btn btn-small btn-dark-gray">view cart</a>
                                    <a href="{{url('/checkout')}}" class="btn btn-small btn-neon-orange">checkout</a>
                                </li>
                                @else
                                    <p>No Product In Cart</p>
                                @endif
                                 </div>
                            </ul>
                           
                        </div>
                        <div class="header-cart-icon">
                            @if(Session::get('userdata') =='')
                            <a href="{{url('/signin')}}"><i class="feather icon-feather-user"></i></a>
                            @else
                            <a href="{{url('/my-profile')}}"><i class="feather icon-feather-user"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>