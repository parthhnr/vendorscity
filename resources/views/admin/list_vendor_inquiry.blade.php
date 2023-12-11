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

                       <h3 class="page-title">Inquiry</h3>

                       <ul class="breadcrumb">

                           <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>

                           </li>

                           <li class="breadcrumb-item active">Inquiry</li>

                       </ul>

                   </div>

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

                           <form id="form" action="" enctype="multipart/form-data">

                               <INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand(); ?>">

                               @csrf

                               @php
                                    $userId = Auth::id();
                                    $currentDate = now();

                                    $vendor_subscription = DB::table('subscription')
                                               ->select('*')
                                               ->where('vendor_id', '=', $userId)
                                               ->where('enddate', '>=', $currentDate)
                                               ->orderBy('id', 'desc')
                                               ->get();

                                    $resultArray = [];

                                    foreach($vendor_subscription as $vendor_subscription_data){

                                        $vendor_subscription_att = DB::table('subscription_subservice_attribute')
                                               ->select('*')
                                               ->where('subscription_id', '=', $vendor_subscription_data->id)
                                               ->get();

                                        



                                        foreach($vendor_subscription_att as $vendor_subscription_att_data){

                                            $resultArray[] = [
                                                'service_id' => $vendor_subscription_att_data->service_id,
                                                'subservice_id' => $vendor_subscription_att_data->subservice_id,
                                            ];
                                        }

                                        
                                    }

                                    //echo"<pre>";print_r($resultArray);echo"</pre>";


                                    
                                    

                               @endphp

                               <div class="table-responsive">

                                   <table class="table table-center table-hover datatable">

                                       <thead class="thead-light">

                                           <tr>
                                               <th>Sr No</th>
                                               <th>Name</th>
                                               
                                               <th>Service</th>
                                               <th>Sub Service</th>

                                               <th>Action</th>
                                               <!-- <th>Price</th>
                                               <th>Inquiry Date</th> -->
                                           </tr>

                                       </thead>

                                       <tbody>

                                        @if($vendor_subscription != '')

                                         

                                           @foreach ($resultArray as $resultArray_data)

                                           @php

                                                $packages_enquiry = DB::table('packages_enquiry')
                                                           ->select('*')
                                                           ->where('service_id', '=', $resultArray_data['service_id'])
                                                           ->where('subservice_id', '=', $resultArray_data['subservice_id'])
                                                           ->where('is_accept', '=', 0)
                                                           ->orderBy('id', 'desc')
                                                           ->get();

                                                

                                           @endphp

                                           @php
                                                $i=1;
                                               @endphp

                                            @foreach ($packages_enquiry as $packages_enquiry_data)

                                            @php
                                            //echo"<pre>";print_r($packages_enquiry_data->name);echo"</pre>";
                                            @endphp
                                               <tr>

                                                   <td>{{$i}}</td>
                                                   <td>{{ $packages_enquiry_data->name }}</td>
                                                  
                                                   <td>
                                                       @if ($packages_enquiry_data->service_id != '')
                                                           {!! Helper::servicename(strval($packages_enquiry_data->service_id)) !!}
                                                       @endif
                                                   </td>
                                                   <td>
                                                        @if ($packages_enquiry_data->subservice_id != '')
                                                           {!! Helper::subservicename(strval($packages_enquiry_data->subservice_id)) !!}
                                                       @endif
                                                    
                                                    </td>
                                                    <td><a class="btn btn-primary" href="javascript:void('0');" onclick="delete_category('{{$packages_enquiry_data->id}}','{{$userId}}');">
                            Accept
                        </a></td>
                                                 
                                               </tr>
                                               @php
                                                $i++;
                                               @endphp
                                               @endforeach
                                               
                                           @endforeach

                                           @else

                                            <p>No Data Found</p>
                                           @endif



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

                  <!--  <div class="modal-icon text-center mb-3">

                       <i class="fas fa-trash-alt text-danger"></i>

                   </div> -->

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

   <div class="modal custom-modal fade" id="set_order_model" role="dialog">

       <div class="modal-dialog modal-dialog-centered">

           <div class="modal-content">

               <div class="modal-body">

                   <div class="modal-text text-center">

                       <h3>Are you sure you want to Set order of Groups</h3>

                       <input type="hidden" name="set_order_val" id="set_order_val" value="">

                       <input type="hidden" name="set_order_id" id="set_order_id" value="">

                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                       <button type="button" class="btn btn-primary" onclick="updateorder();">Yes</button>

                   </div>

               </div>

           </div>

       </div>

   </div>

   <!-- /set orderModal -->
   <form id="form_new" action="{{ route('accept_vendor_inquiry') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="inquiry_id" id="inquiry_id" value="">
        <input type="hidden" name="vendor_id" id="vendor_id" value="">
   </form>


   <script>

       function delete_category(id,vendor_id) {
            $('#inquiry_id').val(id);

            $('#vendor_id').val(vendor_id);

            $('#delete_model').modal('show');
       }



       function form_sub() {

           $('#form_new').submit();

       }



   </script>

