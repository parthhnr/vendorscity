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

    {{-- <style>
        #delete_model_1 .modal-dialog {
            max-width: 50% !important;
        }
    </style> --}}

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



    </div>

@stop
