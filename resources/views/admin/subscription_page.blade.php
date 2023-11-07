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

           <!-- Page Header -->

           <!-- <div class="page-header">

               <div class="row align-items-center">

                   <div class="col">

                       <h2 class="page-title">Dashboard</h2>

                   </div>

               </div>

           </div> -->

           @if ($message = Session::get('success'))

               <div class="alert alert-success alert-dismissible fade show">

                   <strong>Success!</strong> {{ $message }}

                   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

               </div>

           @endif
           
           <h4>Subscription</h4>

        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header text-center" style="display:block">
                            <div class="dash-count">
                                <div class="dash-title"><a href="{{ route('base_on_service_lead') }}" style=" margin-bottom: 25px;display: inline-block;">Based on Services Leads</a></div>
                                <a href="{{ route('base_on_service_lead') }}" class="btn btn-rounded btn-outline-primary">Buy Now</a>
                                
                                <!-- <div class="dash-counts">
                                    <p>This is Box</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                       <!--  <div class="dash-widget-header">
                          
                            <div class="dash-count">
                                <div class="dash-title"><a href="{{ route('based_on_booking_services') }}">Based on Booking Services</a></div>
                               
                            </div>
                        </div> -->

                        <div class="dash-widget-header text-center" style="display:block">
                            <div class="dash-count">
                                <div class="dash-title"><a href="{{ route('based_on_booking_services') }}" style=" margin-bottom: 25px;display: inline-block;">Based on Booking Services</a></div>
                                <a href="{{ route('based_on_booking_services') }}" class="btn btn-rounded btn-outline-primary">Buy Now</a>
                                
                                <!-- <div class="dash-counts">
                                    <p>This is Box</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="dash-widget-header">
                            
                            <div class="dash-count">
                                <div class="dash-title"><a href="{{ route('based_on_listing_criteria') }}">Based on Listing Criteria</a></div>
                                
                            </div>
                        </div> -->

                        <div class="dash-widget-header text-center" style="display:block">
                            <div class="dash-count">
                                <div class="dash-title"><a href="{{ route('based_on_listing_criteria') }}" style=" margin-bottom: 25px;display: inline-block;">Based on Listing Criteria</a></div>
                                <a href="{{ route('based_on_listing_criteria') }}" class="btn btn-rounded btn-outline-primary">Buy Now</a>
                                
                                <!-- <div class="dash-counts">
                                    <p>This is Box</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Your Subscription Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John</td>
                                                    <td>Doe</td>
                                                    <td>john@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Mary</td>
                                                    <td>Moe</td>
                                                    <td>mary@example.com</td>
                                                </tr>
                                                <tr>
                                                    <td>July</td>
                                                    <td>Dooley</td>
                                                    <td>july@example.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

        </div>
           

       </div>

   @stop
