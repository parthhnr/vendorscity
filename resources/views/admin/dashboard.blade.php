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

           <div class="page-header">

               <div class="row align-items-center">

                   <div class="col">

                       <h2 class="page-title">Dashboard</h2>

                   </div>

               </div>

           </div>
           {{-- @php

               // Now you can access user data

               echo '<pre>';
               print_r(Auth::user()->vendor);
               echo '</pre>';

           @endphp  --}}
           <h4>Welcome To VendorsCity</h4>
           {{-- <h4>Welcome To {{Auth::user()->name}}</h4>  --}}

       </div>

   @stop
