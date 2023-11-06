@extends('admin.includes.Template')



@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Permission</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('userpermission.index') }}">Permission</a></li>
                        <li class="breadcrumb-item active">Add Permission</li>
                    </ul>
                </div>
            </div>
        </div>



        <!-- /Page Header -->
        <div id="validate" class="alert alert-danger alert-dismissible fade show" style="display: none;">
            <span id="login_error"></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Basic Info</h4> -->
                        <form id="category_form" action="{{ route('userpermission.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label for="name">User Type</label>
                                    <input id="name" name="cname" type="text" class="form-control"
                                        placeholder="Enter User Type" value="" />
                                    <p class="form-error-text" id="name_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <style>
                                    table,
                                    th,
                                    td {
                                        border: 1px solid black;
                                    }
                                </style>
                                <table class="table table-bordered table-striped datatable dataTable">
                                    <tr>
                                        <th>Feature</th>
                                        <th>View</th>
                                        <th>Add / Edit</th>
                                        <!-- <th>Delete</th> -->
                                    </tr>

                                    <p class="form-error-text" id="perm_error"
                                        style="color: red; margin-top: 10px;text-align:center;">
                                    </p>

                                    @foreach ($permission as $per_data)
                                        <tr>
                                            <td>
                                                {{ $per_data->pname }}
                                            </td>
                                            <td>
                                                <input type="checkbox" name="permission[]" id="perm"
                                                    value="{{ $per_data->id }}" multiple="multiple">

                                            </td>
                                            <td>
                                                <input type="checkbox" name="add_edit_perm[]" id="add_edit_perm"
                                                    value="{{ $per_data->id }}" multiple="multiple">
                                            </td>

                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="text-end mt-4">
                                <a class="btn btn-primary" href="{{ route('userpermission.index') }}"> Cancel</a>
                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="button" class="btn btn-primary" onclick="javascript:category_validation()"
                                    id="submit_button">Submit</button>
                                <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop



@section('footer_js')
    <script>
        function category_validation() {
            var name = jQuery("#name").val();
            if (name == '') {
                jQuery('#name_error').html("Please Enter User Type");
                jQuery('#name_error').show().delay(0).fadeIn('show');
                jQuery('#name_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#conf_password').offset().top - 150
                }, 1000);
                return false;
            }
            if ($('#perm:checked').length == 0) {
                jQuery('#perm_error').html("Please Select Atleast One Permission");
                jQuery('#perm_error').show().delay(0).fadeIn('show');
                jQuery('#perm_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#name').offset().top - 150
                }, 1000);
                return false;
            }
            $('#spinner_button').show();
            $('#submit_button').hide();
            $('#category_form').submit();
        }
    </script>



@stop
