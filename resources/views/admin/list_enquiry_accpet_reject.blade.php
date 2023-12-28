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

    <style>
        #delete_model_1 .modal-dialog {
            max-width: 50% !important;
        }
    </style>


    <div class="content container-fluid">

        <!-- Page Header -->

        <div class="page-header">

            <div class="row align-items-center">

                <div class="col">

                    <h3 class="page-title">Packages Enquiry Detail</h3>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>

                        </li>

                        <li class="breadcrumb-item active">Packages Enquiry Detail</li>

                    </ul>

                </div>


            </div>


        </div>

        <!-- /Page Header -->


        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">

                <strong>Success!</strong> {{ $message }}

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

            </div>
        @endif

        @php
            $userId = Auth::id();
        @endphp

        <div class="row">

            <div class="col-sm-12">

                <div class="card card-table">

                    <div class="card-body">

                        <form id="form" action="{{-- route('delete_price') --}}" enctype="multipart/form-data">

                            <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">

                            @csrf

                            <div class="table-responsive">

                                <table class="table table-center table-hover">


                                    @if ($packages_enquiry != '')

                                        @foreach ($packages_enquiry as $packages_enquiry_data)
                                            @if ($packages_enquiry_data->formfield_value != '')
                                                <thead class="thead-light">

                                                    <tr>
                                                        <th>{!! Helper::form_fields($packages_enquiry_data->form_field_id) !!}</th>
                                                    </tr>

                                                </thead>
                                            @endif

                                            <tbody>

                                                <tr>

                                                    @if ($packages_enquiry_data->formfield_value != '')
                                                        <td>{{ $packages_enquiry_data->formfield_value }}</td>
                                                    @endif
                                                </tr>



                                            </tbody>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>no data found</td>
                                        </tr>
                                    @endif



                                </table>


                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>
        {{-- @php
            echo '<pre>';
            print_r($packages_enquiry_data);
            echo '</pre>';
            exit();
        @endphp --}}

        <div class="col-auto" style="float: inline-end;">

            <a class="btn btn-primary me-1" href="javascript:void('0');"
                onclick="delete_category('{{ $packages_enquiry_data->package_inquiry_id }}','{{ $userId }}');">

                <i class="fas fa-plus"></i> Accept

            </a>

            <a class="btn btn-danger" href="javascript:void('0');"
                onclick="Enquiry('{{ $packages_enquiry_data->package_inquiry_id }}','{{ $userId }}');">Reject

            </a>


        </div>



    </div>

    <!-- Delete  Modal -->

    <div class="modal custom-modal fade" id="delete_model" role="dialog">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">


                    <div class="modal-text text-center">

                        <h3>Are you sure want to Accept</h3>

                        <p></p>

                    </div>

                </div>

                <div class="modal-footer text-center">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                    <button type="button" class="btn btn-primary" onclick="form_sub();">Yes</button>

                </div>

            </div>

        </div>

    </div>

    <div class="modal custom-modal fade" id="reject_model" role="dialog">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body">


                    <div class="modal-text ">

                        <!-- <h3>Delete Expense Category</h3> -->


                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">

                                        <tbody>
                                            <form id="reject_form" method="post"
                                                action="{{ route('reason_reject_form') }}">
                                                @csrf
                                                <div class="row">

                                                    <div class="form-group">
                                                        <label for="name">Reason</label>
                                                        <textarea name="reject_reason" id="reject_reason" cols="30" rows="10"class="form-control"></textarea>
                                                        <input type="hidden" name="inquiry_id" id="inquiry_id"
                                                            value="">
                                                        <input type="hidden" name="vendor_id" id="vendor_id"
                                                            value="">
                                                    </div>

                                                </div>
                                                <p class="form-error-text" id="reject_error"
                                                    style="color: red; margin-top: 10px;">
                                                </p>
                                                <button class="btn btn-primary" style="float: inline-end;" type="button"
                                                    onclick="javascript:reject_validation()">Add</button>
                                            </form>



                                        </tbody>
                                    </table>


                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- /Delete Modal -->

    <form id="form_new" action="{{ route('accept_vendor_inquiry') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="inquiry_id" id="inquiry1_id" value="">
        <input type="hidden" name="vendor_id" id="vendor1_id" value="">
    </form>
@stop

<script>
    function delete_category(id, vendor_id) {

        $('#inquiry1_id').val(id);

        $('#vendor1_id').val(vendor_id);

        $('#delete_model').modal('show');
    }

    function form_sub() {

        $('#form_new').submit();

    }
</script>

<script>
    function Enquiry(id, userId) {


        $('#inquiry_id').val(id);

        $('#vendor_id').val(userId);

        $('#reject_model').modal('show');


    }
</script>

<script>
    function reject_validation() {

        var reject_reason = jQuery("#reject_reason").val();
        if (reject_reason == '') {
            jQuery('#reject_error').html("Please Enter Reason");
            jQuery('#reject_error').show().delay(0).fadeIn('show');
            jQuery('#reject_error').show().delay(2000).fadeOut('show');
            $('html, body').animate({
                scrollTop: $('#reject_reason').offset().top - 150
            }, 1000);
            return false;
        }

        $('#reject_form').submit();


    }
</script>
