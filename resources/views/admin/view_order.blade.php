@extends('admin.includes.Template')

@section('content')

<div class="content container-fluid">

    <div class="row justify-content-center">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <!-- <img src="{{asset('public/admin/assets/img/logo.png')}}" alt="logo"> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Order:</strong> #{{$order->order_id}} <br>
                                    <strong>Issued:</strong>
                                    @php
                                    $order_date = strtotime( $order->created_at );
                                    echo $mysqldate = date( 'l, F d, Y', $order_date );

                                    @endphp 
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item" style="margin-top:20px;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <strong class="customer-text">Shipping To</strong>
                                    <p class="invoice-details invoice-details-two">
                                        {{$order->first_name}} {{$order->last_name}} <br>
                                        {{$order->address1}}, {{$order->address2}},<br>
                                        {{$order->city}},{{ Helper::state_name($order->state)}}, {{ Helper::countryname($order->country)}}<br>
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Invoice To</strong>
                                    <p class="invoice-details">
                                        Walter Roberson <br>
                                        299 Star Trek Drive, Panama City, <br>
                                        Florida, 32405, USA <br>
                                    </p>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <strong class="customer-text">Payment Method</strong>
                                    
                                    <p class="invoice-details">
                                        @if ($order->paymentmode == '1')
                                        Cash On Delivery
                                    @elseif ($order->paymentmode == '2')
                                        Online Payment
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                    <!-- Invoice Item -->
                    <!-- <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="invoice-info">
                                    <strong class="customer-text">Payment Method</strong>
                                    
                                    <p class="invoice-details invoice-details-two">
                                        @if ($order->paymentmode == '1')
                                        Cash On Delivery
                                    @elseif ($order->paymentmode == '2')
                                        Online Payment
                                    @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- /Invoice Item -->

                    <div class="col-md-12">
                        <strong class="customer-text" style="font-size: 18px;color:#272b41;">Customer Details</strong>
                        <div class="table-responsive">
                            <table class="invoice-table table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">First Name</th>
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Email ID</th>
                                        <th class="text-center">Mobile No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">{{$order->user_name}}</td>
                                        <td class="text-center">{{$order->last_name}}</td>
                                        <td class="text-center">{{$order->user_email}}</td>
                                        <td class="text-center">{{$order->user_mobile}}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>&nbsp;
                    
                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <strong class="customer-text" style="font-size: 18px;color:#272b41;">Order Summary</strong>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Product Image</th>
                                                <th class="text-center">Product Name</th>
                                                <th class="text-center">Product Code</th>
                                                <th class="text-center">Product Size</th>
                                                
                                                <th class="text-center">Product Color</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-center">Totals</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php 
                                                $sub_total = 0;
                                            @endphp
                                            @foreach($order->items as $item)
                                            @php
                                                /*echo "<pre>";print_r($item);echo "</pre>"; */
                                            @endphp
                                            <tr>
                                                <td class="text-center">
                                                    @if($item->base_image != '')
                                                        <img src="{{ url('public/upload/product/small/' . $item->base_image) }}" width="50px" height="50px">
                                                    @else
                                                        <img src="{{ url('public/upload/product/small/no-image.png') }}" width="50px" height="50px">
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$item->order_item_name}}</td>
                                                <td class="text-center">{{$item->product_code}}</td>
                                                <td class="text-center">{{$item->size_name}}</td>
                                                
                                                <td class="text-center">{{$item->colour_name}}</td>
                                                <td class="text-center">&#8377;{{$item->product_discount_amount}}</td>
                                                <td class="text-center">{{$item->product_quantity}}</td>
                                                @php

                                                    $total = $item->product_discount_amount * $item->product_quantity;
                                                    $sub_total += $total;
                                                @endphp
                                                <td class="text-center">&#8377;{{$total}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td style="border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-right-style: hidden;"></td>
                                                <td style="border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-right-style: hidden;" class="thick-line"></td>
                                                <td class="thick-line"></td>
                                                <td colspan="2" class="thick-line text-center">
                                                    <strong>Subtotal</strong></td>
                                                <td colspan="2" class="thick-line  text-center">&#8377;{{ $sub_total }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top-style: hidden;border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-top-style: hidden;" class="thick-line"></td>
                                                <td colspan="2" class="no-line text-center">
                                                    <strong>Discount</strong></td>
                                                <td colspan="2" class="no-line text-center">&#8377;{{$order->coupondiscount}}
                                                </td>
                                                
                                            </tr>

                                            <tr>
                                                <td style="border-top-style: hidden;border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-top-style: hidden;" class="thick-line"></td>
                                                <td colspan="2" class="no-line text-center">
                                                    <strong>Shipping</strong></td>
                                                <td colspan="2" class="no-line text-center">&#8377;{{$order->shippingcost}}
                                                </td>
                                                
                                            </tr>

                                            <tr>
                                                <td style="border-top-style: hidden;border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;"></td>
                                                <td style="border-top-style: hidden;border-right-style: hidden;" class="thick-line"></td>
                                                <td style="border-top-style: hidden;" class="thick-line"></td>
                                                <td colspan="2" class="no-line text-center">
                                                    <strong>Total</strong></td>
                                                <td colspan="2" class="no-line text-center">&#8377;{{$order->order_total}}
                                                </td>
                                                
                                            </tr>


                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           <!--  <div class="col-md-6 col-xl-4 ms-auto">
                                <div class="table-responsive">
                                    <table class="invoice-table-two table">
                                        <tbody>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td><span>$350</span></td>
                                        </tr>
                                        <tr>
                                            <th>Discount:</th>
                                            <td><span>-10%</span></td>
                                        </tr>
                                        <tr>
                                            <th>Total Amount:</th>
                                            <td><span>$315</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- /Invoice Item -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
           
@stop
