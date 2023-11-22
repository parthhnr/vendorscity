@extends('admin.includes.Template')

@section('content')

    <div class="content container-fluid">



        <!-- Page Header -->

        <div class="page-header">

            <div class="row">

                <div class="col-sm-12">

                    <h3 class="page-title">Sub Service</h3>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('subservice.index') }}">Sub Service</a></li>

                        <li class="breadcrumb-item active">Add Sub Service</li>

                    </ul>

                </div>

            </div>

        </div>

        <!-- /Page Header -->



        <div id="validate" class="alert alert-danger alert-dismissible fade show" style="display: none;">

            <span id="login_error"></span>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>



        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        <!-- <h4 class="card-title">Basic Info</h4> -->

                        <form id="subservice_form" action="{{ route('subservice.store') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="name">Service</label>

                                        <select name="serviceid" id="serviceid" class="form-control">

                                            <option value=""> Select Service</option>

                                            @foreach ($service_data as $all_service_data)
                                                <option value="{{ $all_service_data['id'] }}">
                                                    {{ $all_service_data['servicename'] }}

                                                </option>
                                            @endforeach

                                        </select>
                                        <p class="form-error-text" id="service_error" style="color: red; margin-top: 10px;">
                                        </p>

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="name">Sub Service</label>
                                        <input id="subservicename" name="subservicename" type="text" class="form-control"
                                            placeholder="Enter Sub Service" value="" />

                                        <p class="form-error-text" id="subservice_error"
                                            style="color: red; margin-top: 10px;"></p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="name">Image (600px x 765px)</label>

                                        <input id="image" name="image" type="file" class="form-control"value="" />
                                        <p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label style="width: 100%;">Is Bookable</label>
                                        <div style="padding: 9px 0;">
                                            <input type="checkbox" name="is_bookable[]" value="0" id="is_bookable">
                                            Book Now
                                            <input type="checkbox" name="is_bookable[]" value="1" id="is_bookable">
                                            Inquiry
                                        </div>
                                        <p class="form-error-text" id="book_error" style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="name">Inquiry Charge</label>

                                        <input id="charge" name="charge" type="text" class="form-control"
                                            placeholder="Enter Inquiry Charge" value=""
                                            onkeypress="return validateNumber(event)" />
                                        <p class="form-error-text" id="charge_error" style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="name">No Of Inquiry</label>

                                        <input id="no_of_inquiry" name="no_of_inquiry" type="text" class="form-control"
                                            placeholder="No Of Inquiry" value=""
                                            onkeypress="return validateNumber(event)" />
                                        <p class="form-error-text" id="inquiry_error"
                                            style="color: red; margin-top: 10px;"></p>
                                    </div>
                                </div>
                                {{-- <div class="form-group" style="display: none">

                                    <label for="name">Booking Service Price</label>
                                    <input id="serviceprice" name="serviceprice" type="text" class="form-control"
                                        placeholder="Booking Service Price" value=""
                                        onkeypress="return validateNumber(event)" />
                                    <p class="form-error-text" id="serviceprice_error"
                                        style="color: red; margin-top: 10px;"></p>
                                </div> --}}

                                <div class="form-group">

                                    <label for="description" style="margin:15px 0 5px 0px; width:100%;">

                                        Description</label>

                                    <textarea id="description" name="description" class="form-control" placeholder="Enter Description"></textarea>

                                </div>


                            </div>

                            <div class="text-end mt-4">

                                <a class="btn btn-primary" href="{{ route('subservice.index') }}"> Cancel</a>



                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">

                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>

                                    Loading...

                                </button>



                                <button type="button" class="btn btn-primary" id="submit_button"
                                    onclick="javascript:subservice_validation()">Submit</button>

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
        $(function() {

            $("#name").keyup(function() {

                var Text = $(this).val();

                Text = Text.toLowerCase();

                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');

                $("#page_url").val(Text);

            });

        });
    </script>



    <script>
        function subservice_validation() {

            var serviceid = jQuery("#serviceid").val();

            if (serviceid == '') {
                jQuery('#service_error').html("Please Select Service");
                jQuery('#service_error').show().delay(0).fadeIn('show');
                jQuery('#service_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#serviceid').offset().top - 150
                }, 1000);
                return false;
            }




            var subservicename = jQuery("#subservicename").val();
            if (subservicename == '') {
                jQuery('#subservice_error').html("Please Enter Sub Service");
                jQuery('#subservice_error').show().delay(0).fadeIn('show');
                jQuery('#subservice_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#subservicename').offset().top - 150
                }, 1000);
                return false;
            }



            var image = jQuery("#image").val();
            if (image == '') {
                jQuery('#image_error').html("Please Select Image");
                jQuery('#image_error').show().delay(0).fadeIn('show');
                jQuery('#image_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#image').offset().top - 150
                }, 1000);
                return false;
            }

            var isBookableCheckboxes = jQuery('input[name="is_bookable[]"]:checked');
            if (isBookableCheckboxes.length === 0) {
                jQuery('#book_error').html("Please Select Is Bookable");
                jQuery('#book_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: jQuery('#is_bookable').offset().top - 150
                }, 1000);
                return false;
            }


            var charge = jQuery("#charge").val();
            if (charge == '') {
                jQuery('#charge_error').html("Please Enter Inquiry Charge");
                jQuery('#charge_error').show().delay(0).fadeIn('show');
                jQuery('#charge_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#charge').offset().top - 150
                }, 1000);
                return false;
            }

            var no_of_inquiry = jQuery("#no_of_inquiry").val();
            if (no_of_inquiry == '') {
                jQuery('#inquiry_error').html("Please Enter No Of Inquiry");
                jQuery('#inquiry_error').show().delay(0).fadeIn('show');
                jQuery('#inquiry_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#no_of_inquiry').offset().top - 150
                }, 1000);
                return false;
            }
            // var serviceprice = jQuery("#serviceprice").val();
            // if (serviceprice == '') {
            //     jQuery('#serviceprice_error').html("Please Enter  Booking Service Price");
            //     jQuery('#serviceprice_error').show().delay(0).fadeIn('show');
            //     jQuery('#serviceprice_error').show().delay(2000).fadeOut('show');
            //     $('html, body').animate({
            //         scrollTop: $('#serviceprice').offset().top - 150
            //     }, 1000);
            //     return false;
            // }




            $('#spinner_button').show();

            $('#submit_button').hide();



            $('#subservice_form').submit();

        }
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor

            .create(document.querySelector('#description'))

            .catch(error => {

                console.error(error);

            });


        function validateNumber(event) {

            var key = window.event ? event.keyCode : event.which;

            if (event.keyCode === 8 || event.keyCode === 46) {

                return true;

            } else if (key < 48 || key > 57) {

                return false;

            } else {

                return true;

            }

        }
    </script>

@stop
