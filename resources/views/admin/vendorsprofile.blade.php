   @extends('admin.includes.Template')

   @section('content')


       {{-- @php
    echo"<pre>";
        print_r(Auth::user());
    echo"</pre>";exit;
@endphp --}}



       <!-- Page Wrapper -->
       <!-- <div class="page-wrapper"> -->
       <div class="content container-fluid">

           <div class="row justify-content-lg-center">
               <div class="col-lg-10">

                   <!-- Page Header -->
                   <div class="page-header">
                       <div class="row">
                           <div class="col">
                               <h3 class="page-title">Profile</h3>
                               <ul class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="{{ url('/vendors') }}">Dashboard</a></li>
                                   <li class="breadcrumb-item active">Profile</li>
                               </ul>
                           </div>
                       </div>
                   </div>
                   <!-- /Page Header -->

                   <div class="profile-cover">

                   </div>

                   <div class="text-center mb-5">
                       <label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
                           <img class="avatar-img" src="{{ asset('public/upload/no-image.jpg') }}" alt="Profile Image">

                       </label>
                       <h2>{{ Auth::user()->name }} <i class="fas fa-certificate text-primary small" data-toggle="tooltip"
                               data-placement="top" title="" data-original-title="Verified"></i></h2>
                       <ul class="list-inline">
                           <li class="list-inline-item">
                               <i class="far fa-building"></i> <span>{{ Auth::user()->companywebsite }}</span>
                           </li>
                           @if (Auth::user()->mobile != '')
                               <li class="list-inline-item">
                                   <i class="fa-solid fa-mobile"></i>{{ Auth::user()->mobile }}
                               </li>
                           @endif

                       </ul>
                   </div>

                   <div class="row">
                       <div class="col-lg-12">


                           @php
                               $addmore = DB::table('vendors_attribute')
                                   ->where('pid', Auth::user()->id)
                                   ->first();
                           @endphp

                           <div class="card">
                               <div class="card-header">
                                   <h5 class="card-title d-flex justify-content-between">
                                       <span>Profile</span>
                                       <a class="btn btn-sm btn-white"
                                           href="{{ route('vendorsprofile.edit', Auth::user()->id) }}">Edit</a>
                                   </h5>
                               </div>
                               <div class="card-body">

                                   <ul class="list-unstyled mb-0">
                                       <div class="row">

                                           <div class="col-lg-12">
                                               <li class="py-0">
                                                   <small class="text-dark">Company Name</small>
                                               </li>
                                               <li>
                                                   {{ Auth::user()->name }}
                                               </li>
                                           </div>

                                           <div class="row mt-2 mb-2">
                                               <div class="col-lg-3">
                                                   <li class="pt-2 pb-0">
                                                       <small class="text-dark">POC Full</small>
                                                   </li>
                                                   <li class="pb-2">
                                                       @if ($addmore && $addmore->poc !== null)
                                                           {{ $addmore->poc }}
                                                       @else
                                                           {{ '-' }}
                                                       @endif


                                                   </li>
                                               </div>
                                               <div class="col-lg-3">
                                                   <li class="pt-2 pb-0">
                                                       <small class="text-dark">POC Title</small>
                                                   </li>
                                                   <li class="pb-2">
                                                       @if ($addmore && $addmore->poctitle !== null)
                                                           {{ $addmore->poctitle }}
                                                       @else
                                                           {{ '-' }}
                                                       @endif
                                                   </li>
                                               </div>
                                               <div class="col-lg-3">
                                                   <li class="pt-2 pb-0">
                                                       <small class="text-dark">Company
                                                           Email</small>
                                                   </li>
                                                   <li class="pb-2">
                                                       @if ($addmore && $addmore->c_email !== null)
                                                           {{ $addmore->c_email }}
                                                       @else
                                                           {{ '-' }}
                                                       @endif
                                                   </li>
                                               </div>
                                               <div class="col-lg-3">
                                                   <li class="pt-2 pb-0">
                                                       <small class="text-dark">Company Telephone</small>
                                                   </li>
                                                   <li class="pb-2">
                                                       @if ($addmore && $addmore->telephone !== null)
                                                           {{ $addmore->telephone }}
                                                       @else
                                                           {{ '-' }}
                                                       @endif
                                                   </li>
                                               </div>
                                           </div>


                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Company Website</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->companywebsite }}
                                               </li>
                                           </div>


                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Company City</small>
                                               </li>
                                               <li class="pb-2">
                                                   {!! Helper::cityname(Auth::user()->city) !!}
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Company Role</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->crole }}
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Parent Company Name</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->parentcname }}
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Establishment Date</small>
                                               </li>
                                               <li class="pb-2">
                                                   @php
                                                       $establishment_Date = Auth::user()->establishment_date;
                                                   @endphp
                                                   {{ \Carbon\Carbon::parse($establishment_Date)->format('d-m-Y') }}

                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">VAT Certificate</small>
                                               </li>
                                               <li class="pb-2">
                                                   <img src="{{ asset('public/upload/vendors/' . Auth::user()->vatcertificate) }}"
                                                       style="width: 10%;margin-top: 10px;" />
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">TRN Certificate</small>
                                               </li>
                                               <li class="pb-2">
                                                   <img src="{{ asset('public/upload/vendors/' . Auth::user()->trncertificate) }}"
                                                       style="width: 10%;margin-top: 10px;" />
                                               </li>
                                           </div>


                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Trade License</small>
                                               </li>
                                               <li class="pb-2">
                                                   <img src="{{ asset('public/upload/vendors/' . Auth::user()->tradelicense) }}"
                                                       style="width: 10%;margin-top: 10px;" />
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">TL expiry date</small>
                                               </li>
                                               <li class="pb-2">
                                                   @php
                                                       $Tl_Date = Auth::user()->tlexpiry;
                                                   @endphp
                                                   {{ \Carbon\Carbon::parse($Tl_Date)->format('d-m-Y') }}



                                               </li>
                                           </div>


                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">No Of Staff</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->staff }}
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Remarks</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->remarks }}
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Social Media</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->socialmedai }}
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Email For Login</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->email }}
                                               </li>
                                           </div>

                                           <div class="col-lg-6">
                                               <li class="pt-2 pb-0">
                                                   <small class="text-dark">Company Mobile No</small>
                                               </li>
                                               <li class="pb-2">
                                                   {{ Auth::user()->mobile }}
                                               </li>
                                           </div>
                                       </div>
                                   </ul>
                               </div>
                           </div>

                       </div>


                   </div>
               </div>
           </div>
       </div>

       <!-- </div> -->
       <!-- /Page Wrapper -->

       </div>
       <!--  /Main Wrapper -->

       <!-- jQuery -->
       <script src="assets/js/jquery-3.6.0.min.js"></script>

       <!-- Bootstrap Core JS -->
       <script src="assets/js/bootstrap.bundle.min.js"></script>

       <!-- Feather Icon JS -->
       <script src="assets/js/feather.min.js"></script>

       <!-- Slimscroll JS -->
       <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

       <!-- Custom JS -->
       <script src="assets/js/script.js"></script>

       </body>

       </html> -->

       <div class="col">

           <h2 class="page-title">Dashboard</h2>

       </div>

       </div>

       </div>
       <!--  @php

           // Now you can access user data

           echo '<pre>';
           print_r(Auth::user()->vendor);
           echo '</pre>';

       @endphp -->
       <h4>Welcome To {{-- Auth::user()->name --}}</h4>

       </div>

   @stop
