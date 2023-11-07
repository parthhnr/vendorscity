   @extends('admin.includes.Template')

   @section('content')

       <!-- Main Wrapper -->
       <!-- <div class="main-wrapper"> -->


       <!-- Page Wrapper -->
       {{-- <div class="page-wrapper"> --}}
       <div class="content container-fluid">
           <div class="page-header">
               <div class="row">
                   <div class="col-sm-6">
                       <h3 class="page-title">Edit Profile</h3>
                       <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ url('/vendors') }}">Dashboard</a>
                           </li>
                           <li class="breadcrumb-item active">Edit Profile</li>
                       </ul>
                   </div>
               </div>
           </div>

           <div class="row">


               <div class="col-xl-12 col-md-12">

                   <div class="card">
                       <div class="card-header">
                           <h5 class="card-title">Basic information</h5>
                       </div>
                       <div class="card-body">

                           <!-- Form -->
                           <form>
                               <div class="row form-group">
                                   <label for="name" class="col-sm-3 col-form-label input-label">Name</label>
                                   <div class="col-sm-9">
                                       <div class="d-flex align-items-center">
                                           <label class="avatar avatar-xxl profile-cover-avatar m-0" for="edit_img">
                                               <img id="avatarImg" class="avatar-img"
                                                   src="{{ asset('public/upload/no-image.jpg') }}" alt="Profile Image">
                                               <input type="file" name="image" id="edit_img">
                                               <span class="avatar-edit">
                                                   <i data-feather="edit-2" class="avatar-uploader-icon shadow-soft"></i>
                                               </span>
                                           </label>
                                       </div>
                                   </div>
                               </div>
                               <div class="row form-group">
                                   <label for="name" class="col-sm-3 col-form-label input-label">Company
                                       Name</label>
                                   <div class="col-sm-9">
                                       <input type="text" class="form-control" id="name" placeholder="Your Name"
                                           value="{{ $vendorsprofile->name }}">
                                   </div>
                               </div>


                               {{-- add more start --}}
                               @if ($attribute_data != '')
                                   <input type="hidden" name="poc1[]" value="">
                                   <input type="hidden" name="poctitle1[]" value="">
                                   <input type="hidden" name="c_email1[]" value="">
                                   <input type="hidden" name="telephone1[]" value="">


                                   @for ($i = 0; $i < count($attribute_data); $i++)
                                       <div class="row">

                                           <input type="hidden" name="updateid1xxx[]" id="updateid1xxx{{ $i + 1 }}"
                                               value="{{ $attribute_data[$i]->id }}">

                                           <div class="col-md-2">
                                               <div class="form-group"> <label for="poc">POC Full</label>
                                                   <input type="text" id="pocu" name="pocu[]" class="form-control"
                                                       placeholder="Enter POC" value="{{ $attribute_data[$i]->poc }}">
                                               </div>
                                           </div>
                                           <div class="col-md-2">
                                               <div class="form-group"> <label for="poctitle">POC Title</label>
                                                   <input type="text" id="poctitleu" name="poctitleu[]"
                                                       class="form-control" placeholder="Enter  POC Title"
                                                       value="{{ $attribute_data[$i]->poctitle }}">
                                               </div>
                                           </div>
                                           <div class="col-md-2">
                                               <div class="form-group"> <label for="email">Company Email</label>
                                                   <input type="text" id="c_emailu" name="c_emailu[]"
                                                       class="form-control" placeholder="Enter Email"
                                                       value="{{ $attribute_data[$i]->c_email }}">
                                               </div>
                                           </div>
                                           <div class="col-md-2">
                                               <div class="form-group"> <label for="telephone">Company Telephone</label>
                                                   <input type="text" id="telephoneu" name="telephoneu[]"
                                                       class="form-control" placeholder="Enter Telephone"
                                                       value="{{ $attribute_data[$i]->telephone }}">
                                               </div>
                                           </div>
                                           <a href="#"
                                               onclick="singledelete('{{ route('remove_vendorsprofile_att', ['pid' => $attribute_data[$i]->pid, 'id' => $attribute_data[$i]->id]) }}')"
                                               class="btn btn-danger pull-right remove_field1"
                                               style="margin-right: 0;margin-top: 22px;width: 9%;float: right;height: 40px;margin-left: 150px;">Remove</a>

                                       </div>
                                   @endfor
                               @endif

                               @php

                                   $test = count($attribute_data);
                                   if ($test > 0) {
                                       $style = 'display:none';
                                   } else {
                                       $style = 'display:block';
                                   }
                               @endphp

                               <span style="@php echo $style; @endphp">
                                   <div class="row">
                                       <div class="col-md-2">
                                           <div class="form-group"> <label for="poc">POC Full</label>
                                               <input type="text" id="poc" name="poc1[]" class="form-control"
                                                   placeholder="Enter POC">
                                           </div>
                                       </div>
                                       <div class="col-md-2">
                                           <div class="form-group"> <label for="poctitle">POC Title</label>
                                               <input type="text" id="poctitle" name="poctitle1[]"
                                                   class="form-control" placeholder="Enter  POC Title">
                                           </div>
                                       </div>
                                       <div class="col-md-2">
                                           <div class="form-group"> <label for="email">Company Email</label>
                                               <input type="text" id="c_email" name="c_email1[]"
                                                   class="form-control" placeholder="Enter Email">
                                           </div>
                                       </div>
                                       <div class="col-md-2">
                                           <div class="form-group"> <label for="telephone">Company Telephone</label>
                                               <input type="text" id="telephone" name="telephone1[]"
                                                   class="form-control" placeholder="Enter Telephone">
                                           </div>
                                       </div>
                                   </div>
                               </span>

                               <div class="input_fields_wrap12"> </div>
                               <div class="form-group">

                                   <div class="col-sm-12">
                                       <button
                                           style="border: medium none;margin-right: 50px;line-height: 26px;margin-top: -62px;"
                                           class="submit btn bg-purple pull-right" type="button"
                                           id="add_field_button12">Add</button>
                                   </div>
                               </div>




                               <div class="text-end">
                                   <button type="submit" class="btn btn-primary">Update</button>
                               </div>
                           </form>
                           <!-- /Form -->

                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- </div> -->
       <!-- /Page Wrapper -->
       {{-- </div> --}}
       <!-- /Main Wrapper -->


   @stop
   @section('footer_js')

       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script>
           function singledelete(url) {

               var t = confirm('Are You Sure To Delete The Attribute ?');

               if (t) {

                   window.location.href = url;

               } else {

                   return false;

               }

           }



           $(document).ready(function() {

               var max_fields = 50;

               var wrapper = $(".input_fields_wrap12");

               var add_button = $("#add_field_button12");



               var b = 0;

               $(add_button).click(function(e) { //alert('ok');

                   e.preventDefault();

                   if (b < max_fields) {

                       b++;

                       $(wrapper).append(

                           '<div class="row"><div class="col-md-2"><div class="form-group"><label for="poc">POC Full</label><input type="text" id="poc" name="poc1[]" class="form-control" placeholder="Enter POC"></div></div><div class="col-md-2"><div class="form-group"> <label for="poctitle">POC Title</label><input type="text" id="poctitle" name="poctitle1[]" class="form-control" placeholder="Enter  POC Title"></div></div><div class="col-md-2"><div class="form-group"> <label for="email">Company Email</label><input type="text" id="c_email" name="c_email1[]" class="form-control" placeholder="Enter Email"></div></div><div class="col-md-2"><div class="form-group"> <label for="telephone">Company Telephone</label><input type="text" id="telephone" name="telephone1[]" class="form-control" placeholder="Enter Telephone"></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 0;margin-top: 22px;width: 9%;float: right;height: 40px;margin-left: 150px;">Remove</a></div>'

                       );

                   }

               });

               $(wrapper).on("click", ".remove_field1", function(e) {

                   e.preventDefault();

                   $(this).parent('div').remove();

                   b--;

               })

           });
       </script>
