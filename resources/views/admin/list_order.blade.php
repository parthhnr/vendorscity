@extends('admin.includes.Template')

@section('content')

    @php

        $userId = Auth::id();

        

        $get_user_data = Helper::get_user_data($userId);

        

        $get_permission_data = Helper::get_permission_data($get_user_data->role_id);

        

        $edit_perm = [];

        

        if ($get_permission_data->editperm != '') {

            $edit_perm = $get_permission_data->editperm;

            $edit_perm = explode(',', $edit_perm);

        }

        

    @endphp



    <div class="content container-fluid">





        <!-- Page Header -->

        <div class="page-header">

            <div class="row align-items-center">

                <div class="col">

                    <h3 class="page-title">Order</h3>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>

                        </li>

                        <li class="breadcrumb-item active">Order</li>

                    </ul>

                </div>



                @if (in_array('18', $edit_perm))

                    <div class="col-auto">



                        

                        <a class="btn btn-danger me-1" href="javascript:void('0');" onclick="delete_category();">

                            <i class="fas fa-trash"></i> Delete

                        </a>



                    </div>

                @endif





            </div>

        </div>





        @if ($message = Session::get('success'))

            <div class="alert alert-success alert-dismissible fade show">

                <strong>Success!</strong> {{ $message }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

            </div>

        @endif



        <div class="alert alert-success alert-dismissible fade show success_show" style="display: none;">

            <strong>Success! </strong><span id="success_message"></span>

            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->

        </div>



        <!-- Search Filter -->

        <div id="filter_inputs" class="card filter-card">

            <div class="card-body pb-0">

                <div class="row">

                    <div class="col-sm-6 col-md-3">

                        <div class="form-group">

                            <label>Name</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                    <div class="col-sm-6 col-md-3">

                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                    <div class="col-sm-6 col-md-3">

                        <div class="form-group">

                            <label>Phone</label>

                            <input type="text" class="form-control">

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- /Search Filter -->









        <div class="row">

            <div class="col-sm-12">



                <div class="card card-table">

                    <div class="card-body">

                        <form id="form" action="{{ route('delete_order') }}" enctype="multipart/form-data">

                            <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">

                            @csrf

                            <div class="table-responsive">

                                <table class="table table-center table-hover datatable">

                                    <thead class="thead-light">

                                        <tr>
                                            <!-- <th>select</th> -->
                                            <th>Order Id</th>
                                            <th>Order Date</th>
                                            <th>User Name</th>
                                            <th>Amount</th>
                                            <th>Payment Mode</th>
                                            <th>Payment Status</th>
                                            <th>Order Status</th>
                                            <th>Create Shipment</th>
                                            <th>Schedule Pickup </th>
                                            <th>Label</th>
                                            <th>Track Order</th>
                                            <th>Action</th>

                                           

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php

                                            $i = 1;

                                             //echo "<pre>";print_r($orders_list);echo"</pre>";

                                             if (isset($orders_list) and count($orders_list)) {

                                                foreach ($orders_list as $key => $orders) {



                                        @endphp

                                        

                                            <tr>

                                                <!-- <td></td> -->
                                                <td>{{$orders->order_id}}</td>
                                                <td>
                                                    @php
                                                    $order_date = strtotime( $orders->created_at);
                                                     echo $mysqldate = date( 'F d, Y', $order_date );
                                                    @endphp
                                                </td>
                                                <td>{{$orders->user_name}}</td>
                                                <td>{{number_format($orders->order_total);}}</td>
                                                <td>
                                                    @if ($orders->paymentmode == '1')
                                                        Cash On Delivery
                                                    @elseif ($orders->paymentmode == '2')
                                                        Online Payment
                                                    @endif
                                                </td>
                                                <td>{{$orders->payment_status}}</td>
                                                <td>
                                                    @if ($orders->order_status === 'P')
                                                        Pending
                                                    @elseif ($orders->order_status === 'K')
                                                        Packed
                                                    @elseif ($orders->order_status === 'R')
                                                        Processing
                                                    @elseif ($orders->order_status === 'S')
                                                        Shipped
                                                    @elseif ($orders->order_status === 'O')
                                                        Out For Delivery
                                                    @elseif ($orders->order_status === 'D')
                                                        Delivered
                                                    @else
                                                        Canceled
                                                    @endif
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">
                                                    <a class="btn btn-primary" href="{{ route('detail', [$orders->order_id]) }}"><i class="far fa-eye me-2"></i>Details</a>
                                                </td>





                                            </tr>

                                            @php

                                                $i++;
                                            } }

                                            @endphp

                                        





                                    </tbody>

                                </table>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@stop



<!-- Delete  Modal -->

<div class="modal custom-modal fade" id="delete_model" role="dialog">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-body">

                <div class="modal-icon text-center mb-3">

                    <i class="fas fa-trash-alt text-danger"></i>

                </div>

                <div class="modal-text text-center">

                    <!-- <h3>Delete Expense Category</h3> -->

                    <p>Are you sure want to delete?</p>

                </div>

            </div>

            <div class="modal-footer text-center">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <button type="button" class="btn btn-primary" onclick="form_sub();">Delete</button>

            </div>

        </div>

    </div>

</div>

<!-- /Delete Modal -->



<!-- Select one record Category Modal -->

<div class="modal custom-modal fade" id="select_one_record" role="dialog">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-body">

                <div class="modal-text text-center">

                    <h3>Please select at least one record to delete</h3>

                    <!-- <p>Are you sure want to delete?</p> -->

                </div>

            </div>

        </div>

    </div>

</div>

<!-- /Select one record Category Modal -->



<script>

    function delete_category() {

        // alert('test');

        var checked = $("#form input:checked").length > 0;

        if (!checked) {

            $('#select_one_record').modal('show');

        } else {

            $('#delete_model').modal('show');

        }

    }



    function form_sub() {

        $('#form').submit();

    }

</script>

