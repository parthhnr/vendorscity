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
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #6B1B4B;
}

input:focus + .slider {
  box-shadow: 0 0 1px #6B1B4B;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

    <div class="content container-fluid">


        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Review</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Review</li>
                    </ul>
                </div>

                @if (in_array('22', $edit_perm))
                    <div class="col-auto">

                        {{-- <a class="btn btn-primary me-1" href="{{ route('subscribe.create') }}">
                            <i class="fas fa-plus"></i> Add Subscribe
                        </a> --}}
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
                        <form id="form" action="{{ route('delete_review') }}" enctype="multipart/form-data">
                            <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-center table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Select</th>
                                            <th>User Name</th>
                                            <!-- <th>No</th> -->
                                            <th>User Email</th>
                                            <th>Product Name</th>
                                            <th>Ratting</th>
                                            <th>Comment</th>
                                            <th>Added Date</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- @php
                                            $i = 1;
                                        @endphp -->
                                        @foreach ($all_data as $data)
                                            <tr>
                                                <td><input name="selected[]" id="selected[]" value="{{ $data->id }}"
                                                        type="checkbox" class="minimal-red"
                                                        style="height: 20px;width: 20px;border-radius: 0px;color: red;">
                                                </td>
                                                
                                               

                                                <td>
                                                     @if ($data->user_id != '')

                                                     @php
                                                        $user_data = Helper::get_front_user_data($data->user_id);
                                                     @endphp

                                                        {{$data->name}}
                                                    @endif
                                                </td>

                                                 <td>

                                                    {{ $data->email }}
                                                </td>

                                                <td>
                                                     @if ($data->product_id != '')

                                                     @php
                                                        $product_data = Helper::get_product_data($data->product_id);
                                                     @endphp

                                                        {{$product_data->name}}
                                                    @endif
                                                </td>
                                                <td>

                                                    {{ $data->rate }}
                                                </td>
                                                <td>

                                                    {{ $data->comment }}
                                                </td>
                                                <td>

                                                    {{ $data->created_at }}
                                                </td>

                                                <td>

                                                    <label class="switch">
                                                      <input type="checkbox" id="status_{{ $data->id }}" name="status_{{ $data->id }}"  onclick="fun_status('{{ $data->id }}',this.value);" {{ $data->status == 0 ? 'checked' : '' }}>
                                                      <span class="slider round"></span>
                                                    </label>

                                                </td>


                                            </tr>
                                            <!-- @php
                                                $i++;
                                            @endphp -->
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

<!-- set order Modal -->

<div class="modal custom-modal fade" id="status_modell" role="dialog">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-body">

                <div class="modal-text text-center">

                    <h3>Are you sure you want to change the status </h3>

                    <input type="hidden" name="is_active_id" id="is_active_id" value="">

                    <input type="hidden" name="is_active_val" id="is_active_val" value="">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                    <button type="button" class="btn btn-primary" onclick="fun_review_status();">Yes</button>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- /set orderModal -->

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

    function fun_status(id, value) {

        //alert(value);

        var checkBox = document.getElementById("status_"+ id);

        if (checkBox.checked == true){
            $('#is_active_val').val(0);
        }else{
             $('#is_active_val').val(1);
        }

        if (checkBox){

            $('#is_active_id').val(id);

            

            $('#status_modell').modal('show');
        }

       

    }

     function fun_review_status() {

        var id = $('#is_active_id').val();

        var value = $('#is_active_val').val();

        $.ajax({

            type: "post",

            url: "{{ url('change_status_review') }}",

            data: {

                "_token": "{{ csrf_token() }}",

                "id": id,

                "value": value,

            },

            success: function(returndata) {

                if (returndata == 1)

                $('#success_message').text('Status has been Updated successfully');

                $('.success_show').show().delay(0).fadeIn('show');

                $('.success_show').show().delay(5000).fadeOut('show');

                $('#status_modell').modal('hide');

            }

        });

    }

</script>
