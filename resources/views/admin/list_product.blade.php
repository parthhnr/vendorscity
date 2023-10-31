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
           .custom_css_model h3 {
               font-size: 18px;
           }

           .custom_css_model .btn {
               padding: 0 8px !important;
           }
       </style>

       <div class="content container-fluid">

           <!-- Page Header -->
           <div class="page-header">
               <div class="row align-items-center">
                   <div class="col">
                       <h3 class="page-title">Product</h3>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>
                           </li>
                           <li class="breadcrumb-item active">Product</li>
                       </ul>
                   </div>
                   @if (in_array('3', $edit_perm))
                       <div class="col-auto">

                           <a class="btn btn-primary me-1" href="{{ route('product.create') }}">
                               <i class="fas fa-plus"></i> Add Product
                           </a>
                           <a class="btn btn-danger me-1" href="javascript:void('0');" onclick="delete_category();">
                               <i class="fas fa-trash"></i> Delete
                           </a>
                           <!--  <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                                                                                                                                                                                                                                                                                                                                                                                                 <i class="fas fa-filter"></i> Filter
                                                                                                                                                                                                                                                                                                                                                                                                 </a> -->
                       </div>
                   @endif

               </div>
           </div>
           <!-- /Page Header -->

           <!-- @if ($message = Session::get('success'))
    <div class="alert alert-success">
                                                                                                                                                                                                                                                                                                                                                                                                 <p>{{ $message }}</p>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
    @endif -->

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
                           <form id="form" action="{{ route('delete_product') }}" enctype="multipart/form-data">
                               <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">
                               @csrf
                               <div class="table-responsive">
                                   <table class="table table-center table-hover datatable">
                                       <thead class="thead-light">
                                           <tr>
                                               <th>Select</th>
                                               <th>Group</th>
                                               <th>Category</th>
                                               <th>Sub Category</th>
                                               <th>Name</th>
                                               <th>Page Url</th>
                                               <th>Sale</th>
                                               <th>Hot</th>
                                               <th>New</th>
                                               <th>Recent Product</th>
                                               <th>Feature Product</th>
                                               <th>Best Seller</th>
                                               <th>Add Image</th>
                                               @if (in_array('3', $edit_perm))
                                                   <th class="text-right">Actions</th>
                                               @endif
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($category_data as $data)
                                               <tr>
                                                   <td><input name="selected[]" id="selected[]" value="{{ $data->id }}"
                                                           type="checkbox" class="minimal-red"
                                                           style="height: 20px;width: 20px;border-radius: 0px;color: red;">
                                                   </td>

                                                   <td><?php $groupName = DB::table('groups')
                                                       ->where('id', $data->group_id)
                                                       ->get();
                                                   
                                                   for ($i = 0; $i < count($groupName); $i++) {
                                                       echo $groupName[$i]->name;
                                                   }
                                                   ?></td>

                                                   @php
                                                       $categoryName = DB::table('categories')
                                                           ->where('id', $data->cat_id)
                                                           ->get();
                                                       
                                                   @endphp
                                                   <td>
                                                       @for ($i = 0; $i < count($categoryName); $i++)
                                                           {{ $categoryName[$i]->name }}
                                                       @endfor
                                                   </td>



                                                   @php
                                                       $subcategoryname = DB::table('subcategories')
                                                           ->where('id', $data->subcat_id)
                                                           ->get();
                                                       
                                                   @endphp

                                                   <td>

                                                       @for ($i = 0; $i < count($subcategoryname); $i++)
                                                           {{ $subcategoryname[$i]->name }}
                                                       @endfor

                                                   </td>

                                                   <td>

                                                       {{ $data->name }}
                                                   </td>
                                                   <td>{{ $data->page_url }}</td>


                                                   <td>
                                                       <input type="checkbox" id="sale_product" name="sale_product"
                                                           value="1"
                                                           onclick="sale_product_popup('<?php echo $data->id; ?>',this);"
                                                           <?php if ($data->sale_product == '1') {
                                                               echo 'checked';
                                                           } ?>>
                                                   </td>
                                                   <td>
                                                       <input type="checkbox" id="hot_product" name="hot_product"
                                                           value="1"
                                                           onclick="hot_product_popup('<?php echo $data->id; ?>',this);"
                                                           <?php if ($data->hot_product == '1') {
                                                               echo 'checked';
                                                           } ?>>
                                                   </td>
                                                   <td>
                                                       <input type="checkbox" id="new_product" name="new_product"
                                                           value="1"
                                                           onclick="new_product_popup('<?php echo $data->id; ?>',this);"
                                                           <?php if ($data->new_product == '1') {
                                                               echo 'checked';
                                                           } ?>>
                                                   </td>

                                                   <td>
                                                       <input type="checkbox" id="recent_product" name="recent_product"
                                                           value="1"
                                                           onclick="recent_product_popup('<?php echo $data->id; ?>',this);"
                                                           <?php if ($data->recent_product == '1') {
                                                               echo 'checked';
                                                           } ?>>
                                                   </td>

                                                   <td>
                                                       <input type="checkbox" id="feature_product" name="feature_product"
                                                           value="1"
                                                           onclick="feature_product_popup('<?php echo $data->id; ?>',this);"
                                                           <?php if ($data->feature_product == '1') {
                                                               echo 'checked';
                                                           } ?>>
                                                   </td>

                                                   <td>
                                                       <input type="checkbox" id="best_seller" name="best_seller"
                                                           value="1"
                                                           onclick="best_seller_product_popup('<?php echo $data->id; ?>',this);"
                                                           <?php if ($data->best_seller == '1') {
                                                               echo 'checked';
                                                           } ?>>
                                                   </td>

                                                   <td>
                                                       <a class="btn btn-primary me-1"
                                                           href="{{ route('editimage', ['id' => $data->id]) }}">
                                                           Add Image
                                                       </a>
                                                   </td>
                                                   @if (in_array('3', $edit_perm))
                                                       <td class="text-right">
                                                           <a class="btn btn-primary"
                                                               href="{{ route('product.edit', $data->id) }}"><i
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

   <!-- New Modal -->
   <div class="modal custom-modal fade custom_css_model" id="new_model" role="dialog">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="modal-text text-center">
                       <h3 id="new_poup_text"></h3>
                       <input type="hidden" name="new_val" id="new_val" value="">
                       <input type="hidden" name="new_id" id="new_id" value="">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                       <button type="button" class="btn btn-primary" onclick="new_product();">Yes</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /New Modal -->

   <!-- Hot Modal -->
   <div class="modal custom-modal fade custom_css_model" id="hot_model" role="dialog">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="modal-text text-center">
                       <h3 id="hot_poup_text"></h3>
                       <input type="hidden" name="hot_val" id="hot_val" value="">
                       <input type="hidden" name="hot_id" id="hot_id" value="">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                       <button type="button" class="btn btn-primary" onclick="hot_product();">Yes</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /Hot Modal -->

   <!-- sale Modal -->
   <div class="modal custom-modal fade custom_css_model" id="sale_model" role="dialog">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="modal-text text-center">
                       <h3 id="sale_poup_text"></h3>
                       <input type="hidden" name="sale_val" id="sale_val" value="">
                       <input type="hidden" name="sale_id" id="sale_id" value="">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                       <button type="button" class="btn btn-primary" onclick="sale_product();">Yes</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /sale Modal -->

   <!-- Recent Modal -->
   <div class="modal custom-modal fade custom_css_model" id="recent_model" role="dialog">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="modal-text text-center">
                       <h3 id="poup_text"></h3>
                       <input type="hidden" name="recent_val" id="recent_val" value="">
                       <input type="hidden" name="recent_id" id="recent_id" value="">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                       <button type="button" class="btn btn-primary" onclick="recent_product();">Yes</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /recent Modal -->


   <!-- Feature Modal -->
   <div class="modal custom-modal fade custom_css_model" id="feature_model" role="dialog">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="modal-text text-center">
                       <h3 id="feature_poup_text"></h3>
                       <input type="hidden" name="feature_val" id="feature_val" value="">
                       <input type="hidden" name="feature_id" id="feature_id" value="">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                       <button type="button" class="btn btn-primary" onclick="feature_product();">Yes</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /Feature Modal -->

   <!-- best_seller Modal -->
   <div class="modal custom-modal fade custom_css_model" id="best_seller_model" role="dialog">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <div class="modal-body">
                   <div class="modal-text text-center">
                       <h3 id="best_seller_poup_text"></h3>
                       <input type="hidden" name="best_seller_val" id="best_seller_val" value="">
                       <input type="hidden" name="best_seller_id" id="best_seller_id" value="">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                       <button type="button" class="btn btn-primary" onclick="best_seller_product();">Yes</button>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- /best_seller Modal -->

   <script>
       function delete_category() {
           // alert('test');
           var checked = $("#form input[name='selected[]']:checked").length > 0
           if (!checked) {
               $('#select_one_record').modal('show');
           } else {
               $('#delete_model').modal('show');
           }
       }

       function form_sub() {
           $('#form').submit();
       }



       function sale_product_popup(id, value) {

           $('#sale_id').val(id);

           if (value.checked) {
               $('#sale_val').val('1');
               $('#sale_poup_text').text("Are you sure you want Add Sale Product");
               $('#sale_model').modal('show');
           } else {
               $('#sale_val').val('0');
               $('#sale_poup_text').text("Are you sure you want remove From Sale Product");
               $('#sale_model').modal('show');
           }
       }

       function sale_product() {

           var val_new = $('#sale_val').val();
           var id = $('#sale_id').val();

           $.ajax({
               type: "POST",
               url: "{{ url('product_sale') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {

                   if (returnedData == 1) {

                       $('#success_message').text("Set Sale Product has been Updated successfully");
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#sale_model').modal('hide');
                   }
               }
           });

       }


       function hot_product_popup(id, value) {

           $('#hot_id').val(id);

           if (value.checked) {
               $('#hot_val').val('1');
               $('#hot_poup_text').text("Are you sure you want Add Hot Product");
               $('#hot_model').modal('show');
           } else {
               $('#hot_val').val('0');
               $('#hot_poup_text').text("Are you sure you want remove From Hot Product");
               $('#hot_model').modal('show');
           }
       }

       function hot_product() {

           var val_new = $('#hot_val').val();
           var id = $('#hot_id').val();

           $.ajax({
               type: "POST",
               url: "{{ url('product_hot') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {

                   if (returnedData == 1) {

                       $('#success_message').text("Set Hot Product has been Updated successfully");
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#hot_model').modal('hide');
                   }
               }
           });

       }

       function new_product_popup(id, value) {

           $('#new_id').val(id);

           if (value.checked) {
               $('#new_val').val('1');
               $('#new_poup_text').text("Are you sure you want Add New Product");
               $('#new_model').modal('show');
           } else {
               $('#new_val').val('0');
               $('#new_poup_text').text("Are you sure you want remove From New Product");
               $('#new_model').modal('show');
           }
       }

       function new_product() {

           var val_new = $('#new_val').val();
           var id = $('#new_id').val();

           $.ajax({
               type: "POST",
               url: "{{ url('product_new') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {

                   if (returnedData == 1) {

                       $('#success_message').text("Set New Product has been Updated successfully");
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#new_model').modal('hide');
                   }
               }
           });

       }


       function recent_product_popup(id, value) {


           $('#recent_id').val(id);

           if (value.checked) {
               $('#recent_val').val('1');
               $('#poup_text').text("Are you sure you want Add Recent Product");
               $('#recent_model').modal('show');
           } else {
               $('#recent_val').val('0');
               $('#poup_text').text("Are you sure you want remove From Recent Product");
               $('#recent_model').modal('show');
           }
       }

       function recent_product() {

           var val_new = $('#recent_val').val();
           var id = $('#recent_id').val();

           $.ajax({
               type: "POST",
               url: "{{ url('product_recent') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {

                   if (returnedData == 1) {

                       $('#success_message').text("Set Recent Product has been Updated successfully");
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#recent_model').modal('hide');
                   }
               }
           });

       }


       function feature_product_popup(id, value) {


           $('#feature_id').val(id);

           if (value.checked) {
               $('#feature_val').val('1');
               $('#feature_poup_text').text("Are you sure you want Add Feature Product");
               $('#feature_model').modal('show');
           } else {
               $('#feature_val').val('0');
               $('#feature_poup_text').text("Are you sure you want remove From Feature Product");
               $('#feature_model').modal('show');
           }
       }


       function feature_product() {

           var val_new = $('#feature_val').val();
           var id = $('#feature_id').val();

           $.ajax({
               type: "POST",
               url: "{{ url('product_feature') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {
                   // alert(returnedData);
                   if (returnedData == 1) {
                       //alert('yes');
                       $('#success_message').text("Set Feature Product has been Updated successfully");
                       //$('.success_show').show();
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#feature_model').modal('hide');
                   }
               }
           });

       }

       function best_seller_product_popup(id, value) {


           $('#best_seller_id').val(id);

           if (value.checked) {
               $('#best_seller_val').val('1');
               $('#best_seller_poup_text').text("Are you sure you want Add Best Seller");
               $('#best_seller_model').modal('show');
           } else {
               $('#best_seller_val').val('0');
               $('#best_seller_poup_text').text("Are you sure you want remove From Best Seller");
               $('#best_seller_model').modal('show');
           }
       }


       function best_seller_product() {

           var val_new = $('#best_seller_val').val();
           var id = $('#best_seller_id').val();


           $.ajax({
               type: "POST",
               url: "{{ url('product_best_seller') }}",
               data: {
                   "_token": "{{ csrf_token() }}",
                   "id": id,
                   "val": val_new
               },
               success: function(returnedData) {
                   // alert(returnedData);
                   if (returnedData == 1) {
                       //alert('yes');
                       $('#success_message').text("Set Best Seller has been Updated successfully");
                       //$('.success_show').show();
                       $('.success_show').show().delay(0).fadeIn('show');
                       $('.success_show').show().delay(5000).fadeOut('show');
                       $('#best_seller_model').modal('hide');
                   }
               }
           });

       }
   </script>
