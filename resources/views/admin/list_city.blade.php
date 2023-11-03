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
                       <h3 class="page-title">City</h3>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                           </li>
                           <li class="breadcrumb-item active">City</li>
                       </ul>
                   </div>
                   @if (in_array('3', $edit_perm))
                       <div class="col-auto">
                           <a class="btn btn-primary me-1" href="{{ route('city.create') }}">
                               <i class="fas fa-plus"></i> Add City
                           </a>
                           <a class="btn btn-danger me-1" href="javascript:void('0');"
                               onclick="delete_city();return false;">
                               <i class="fas fa-trash"></i> Delete
                           </a>
                           <!-- <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                                                                 <i class="fas fa-filter"></i>
                                                                </a> -->
                       </div>
                   @endif
               </div>
           </div>
           <!-- /Page Header -->

           @if ($message = Session::get('success'))
               <div class="alert alert-success alert-dismissible fade show">
                   <strong>Success!</strong> {{ $message }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               </div>
           @endif

           <!-- Search Filter -->
           <!-- <div id="filter_inputs" class="card filter-card">
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
                                                             </div> -->
           <!-- /Search Filter -->



           <div class="row">
               <div class="col-sm-12">

                   <div class="card card-table">
                       <div class="card-body">
                           <form id="form" action="{{ route('delete_city') }}" enctype="multipart/form-data">
                               <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">
                               @csrf
                               <div class="table-responsive">
                                   <table class="table table-center table-hover datatable">
                                       <thead class="thead-light">
                                           <tr>
                                               <th>Select</th>
                                               <th>Country</th>
                                               <th>State</th>
                                               <th>City</th>
                                               <!-- <th>Page Url</th> -->
                                               @if (in_array('3', $edit_perm))
                                                   <th class="text-right">Actions</th>
                                               @endif
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($city_data as $data)
                                               <tr>
                                                   <td>
                                                       <input name="selected[]" id="selected" value="{{ $data->id }}"
                                                           type="checkbox" class="minimal-red"
                                                           style="height: 20px;width: 20px;border-radius: 0px;color: red;">
                                                   </td>

                                                   <td>{!! Helper::countryname($data->country) !!}</td>

                                                   <td>{!! Helper::state_name($data->state) !!}</td>

                                                   <td>{{ $data->name }}</td>


                                                   @if (in_array('3', $edit_perm))
                                                       <td class="text-right">
                                                           <a class="btn btn-primary"
                                                               href="{{ route('city.edit', $data['id']) }}"><i
                                                                   class="far fa-edit"></i></a>
                                                       </td>
                                                   @endif
                                               </tr>
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

       <!-- /Page Wrapper -->
   @stop
   <!-- Delete Category Modal -->
   <div class="modal custom-modal fade" id="delete_city" role="dialog">
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
   <!-- /Delete Category Modal -->

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
   @section('footer_js')

       <script>
           // function delete_city()
           // {
           // 	 //alert('test');
           // 	var checked = $("#form input:checked").length > 0;
           // 	// alert(checked);
           //     if (!checked)
           // 		{
           //         alert("Please select at least one record to delete");
           //         return false;
           //     }
           // 	else
           // 	{
           // 		var conf = confirm("Do you really want to Delete?");
           // 		if(conf == true){
           // 			$('#form').submit(); 
           // 			return true;
           // 		}else{
           // 			return false;
           // 		}
           // 	}
           // }
       </script>
       <script>
           function delete_city() {
               // alert('test');
               var checked = $("#form input:checked").length > 0;
               if (!checked) {
                   $('#select_one_record').modal('show');
               } else {
                   $('#delete_city').modal('show');
               }
           }

           function form_sub() {
               $('#form').submit();
           }
       </script>

   @stop
