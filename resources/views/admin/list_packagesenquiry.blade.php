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

                    <h3 class="page-title">Packages Enquiry</h3>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>

                        </li>

                        <li class="breadcrumb-item active">Packages Enquiry</li>

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

                                <table class="table table-center table-hover datatable">

                                    <thead class="thead-light">

                                        <tr>
                                            <th>Sr No</th>
                                            <th>Name</th>
                                            <th>Email</th>

                                            <th>Mobile</th>

                                            <th>Service</th>

                                            <th>Sub Service</th>

                                            {{-- <th>Package Category</th> --}}

                                            <th>Packages Enquiry</th>





                                        </tr>

                                    </thead>

                                    <tbody>

                                        @php

                                        $i=1;
                                        @endphp

                                        @foreach ($packages_data as $data)
                                            <tr>

                                                <td>

                                                    {{ $i }}

                                                </td>
                                                <td>

                                                    {{ $data->name }}

                                                </td>
                                                <td>
                                                    {{ $data->email }}
                                                </td>

                                                <td>
                                                    {{ $data->mobile }}

                                                </td>

                                                <td>
                                                    {!! Helper::servicename($data->service_id) !!}
                                                </td>

                                                <td>
                                                    {!! Helper::subservicename($data->subservice_id) !!}
                                                </td>

                                                {{-- <td>
                                                    {!! Helper::packagescategory($data->packagecategory_id) !!}
                                                </td> --}}

                                                <td>
                                                    {!! Helper::packages_enquiry($data->pakage_id) !!}
                                                </td>




                                            </tr>

                                            @php

                                        $i++;
                                        @endphp
                                        @endforeach



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
<script type="text/javascript">

</script>