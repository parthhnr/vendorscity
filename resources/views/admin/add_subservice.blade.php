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


                                <div class="form-group">

                                    <label for="name">Sub Service Name</label>
                                    <input id="subservicename" name="subservicename" type="text" class="form-control"
                                        placeholder="Enter Sub Service Name" value="" />

                                </div>

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

                                </div>


                                <div class="form-group">

                                    <label for="name">Image (600px x 765px)</label>

                                    <input id="image" name="image" type="file" class="form-control"value="" />

                                </div>

                                <div class="form-group">

                                    <label style="width: 100%;">Is Bookable</label>

                                    <div style="padding: 9px 0;">

                                        <input type="radio" name="is_bookable" value="0" id="book">

                                        Book Now

                                        <input type="radio" name="is_bookable" value="1" id="book"> Enquiry

                                    </div>

                                    <p id="discount_type_error" style="display: none;color: red"></p>

                                </div>

                                <div class="form-group">

                                    <label for="name">Charge</label>

                                    <input id="charge" name="charge" type="text" class="form-control"
                                        placeholder="Enter Charge" value="" />

                                </div>
                                <div class="form-group">

                                    <label for="name">No Of Inquiry</label>

                                    <input id="no_of_inquiry" name="no_of_inquiry" type="text" class="form-control"
                                        placeholder="No Of Inquiry" value="" />

                                </div>
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

                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

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



            var servicename = jQuery("#servicename").val();

            if (servicename == '') {

                jQuery('#validate').html("Please Select Service");

                jQuery('#validate').show().delay(0).fadeIn('show');

                jQuery('#validate').show().delay(2000).fadeOut('show');

                return false;

            }
            var subservicename = jQuery("#subservicename").val();

            if (subservicename == '') {

                jQuery('#validate').html("Please Enter Sub Service Name");

                jQuery('#validate').show().delay(0).fadeIn('show');

                jQuery('#validate').show().delay(2000).fadeOut('show');

                return false;

            }



            var serviceid = jQuery("#serviceid").val();

            if (serviceid == '') {

                jQuery('#validate').html("Please Enter Service Id");

                jQuery('#validate').show().delay(0).fadeIn('show');

                jQuery('#validate').show().delay(2000).fadeOut('show');

                return false;

            }



            var image = jQuery("#image").val();

            if (image == '') {

                jQuery('#validate').html("Please Select Image");

                jQuery('#validate').show().delay(0).fadeIn('show');

                jQuery('#validate').show().delay(2000).fadeOut('show');

                return false;

            }




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
    </script>

@stop
