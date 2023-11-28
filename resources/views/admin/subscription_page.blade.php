   @extends('admin.includes.Template')

   @section('content')



       <div class="content container-fluid">

           <div class="success">

               @if ($message = Session::get('login_success'))
                   <div class="alert alert-success alert-dismissible fade show" style="text-align: center;">

                       {{ $message }}

                       <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                   </div>
               @endif

           </div>

           @if ($message = Session::get('success'))
               <div class="alert alert-success alert-dismissible fade show">

                   <strong>Success!</strong> {{ $message }}

                   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

               </div>
           @endif

           @php

               $subscriber_name = DB::table('users')
                   ->where('id', $id)
                   ->first();

           @endphp

           <h4>Subscription / {{ $subscriber_name->name }}</h4>

           <div class="row">
               <div class="col-xl-4 col-sm-6 col-12 mt-2">
                   <div class="card">
                       <div class="card-body">
                           <div class="dash-widget-header text-center" style="display:block">
                               <div class="dash-count">
                                   <div class="dash-title"><a href=""
                                           style=" margin-bottom: 25px;display: inline-block;">Total Wallet Amount</a>
                                   </div>
                                   <div class="dash-counts">
                                       <p>{{ $subscriber_name->wallet_amount }}</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-xl-4 col-sm-6 col-12 mt-2">
                   <div class="card">
                       <div class="card-body">
                           <div class="dash-widget-header text-center" style="display:block">
                               <div class="dash-count">
                                   <div class="dash-title"><a href="{{ route('base_on_service_lead', ['id' => $id]) }}"
                                           style=" margin-bottom: 25px;display: inline-block;">Based on Services Leads</a>
                                   </div>
                                   <a href="{{ route('base_on_service_lead', ['id' => $id]) }}"
                                       class="btn btn-rounded btn-outline-primary">Buy Now</a>

                                   {{-- <!-- <div class="dash-counts">
                                        <p>This is Box</p>
                                    </div> --> --}}
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

               @php

                   $price_data = DB::table('prices')
                       ->select('*')
                       ->orderBy('id', 'desc')
                       ->first();

                   //echo "<pre>";print_r($price_data);echo "</pre>";

               @endphp

               @if ($price_data->based_on_booking_service_price != '')
                   <div class="col-xl-4 col-sm-6 col-12 mt-2" style="display: none">
                       <div class="card">
                           <div class="card-body">
                               <div class="dash-widget-header text-center" style="display:block">
                                   <div class="dash-count">
                                       <div class="dash-title"><a
                                               href="{{ route('based_on_booking_services', ['id' => $id]) }}"
                                               style=" margin-bottom: 25px;display: inline-block;">{{ $price_data->based_on_booking_service_label }}</a>
                                       </div>
                                       <a href="{{ route('based_on_booking_services', ['id' => $id]) }}"
                                           class="btn btn-rounded btn-outline-primary">Buy Now</a>


                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               @endif

               @if ($price_data->based_on_listing_criteria_price != '')
                   <div class="col-xl-4 col-sm-6 col-12 mt-2">
                       <div class="card">
                           <div class="card-body">


                               <div class="dash-widget-header text-center" style="display:block">
                                   <div class="dash-count">
                                       <div class="dash-title"><a
                                               href="{{ route('based_on_listing_criteria', ['id' => $id]) }}"
                                               style=" margin-bottom: 25px;display: inline-block;">{{ $price_data->based_on_listing_criteria_label }}</a>
                                       </div>
                                       <a href="{{ route('based_on_listing_criteria', ['id' => $id]) }}"
                                           class="btn btn-rounded btn-outline-primary">Buy Now</a>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               @endif

               @php

                   $currentDate = now();

                   $id = $id;

                   $result = DB::table('subscription')
                       ->select('*')
                       ->where('vendor_id', '=', $id)
                       ->where('enddate', '>=', $currentDate)
                       ->orderBy('id', 'desc')
                       ->get();
                   $result_new = $result->toArray();
                   //echo "<pre>";print_r($result_new);echo "</pre>";
               @endphp

               <div class="col-lg-12">
                   <div class="card">
                       <div class="card-header">
                           <h5 class="card-title">Your Subscription Details</h5>
                       </div>
                       <div class="card-body">
                           <div class="table-responsive">
                               @if (isset($result_new) && !empty($result_new))
                                   <table class="table table-striped mb-0">
                                       <thead>
                                           <tr>
                                               <th>Subscription Name</th>
                                               <th>Total</th>
                                               <th>Start Date</th>
                                               <th>End Date</th>
                                               <th>Status</th>
                                           </tr>
                                       </thead>
                                       <tbody>

                                           @foreach ($result_new as $subs_data)
                                               <tr>
                                                   <td>{{ $subs_data->subscription_name }}</td>
                                                   <td>{{ $subs_data->total }}</td>
                                                   <td>{{ date('d-m-Y', strtotime($subs_data->startdate)) }}</td>
                                                   <td>{{ date('d-m-Y', strtotime($subs_data->enddate)) }}</td>
                                                   <td> <span class="badge badge-pill bg-success-light">Active</span></td>
                                               </tr>
                                           @endforeach

                                       </tbody>
                                   </table>
                               @else
                                   {{ 'No Data Found' }}

                               @endif
                           </div>
                       </div>
                   </div>
               </div>

           </div>


       </div>

   @stop
