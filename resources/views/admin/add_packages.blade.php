@extends('admin.includes.Template')
@section('content')


    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Add Packages </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Add Packages </a>
                        </li>
                        <li class="breadcrumb-item active">Add Packages </li>
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
                        <!-- <h4 class="card-title">Category</h4> -->
                        <form action="{{ route('packages.store') }}" id="category_form_new" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="service">Service</label>
                                        <select class="form-control" id="service_id" name="service_id"
                                            onchange="subservice_change(this.value);">
                                            <option value="">Select Service</option>
                                            @foreach ($service_data as $service)
                                                <option value="{{ $service->id }}">{{ $service->servicename }}</option>
                                            @endforeach
                                        </select>
                                        <p class="form-error-text" id="service_error" style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="state">Sub Service</label>
                                        <span id="subservice_chang">
                                            <select class="form-control" id="subservice_id" name="subservice_id"
                                                onchange="packagecategory_change(this.value);">
                                                <option value="">Select Sub Service</option>
                                                {{-- @foreach ($subservice_data as $subservice)
                                                <option value="{{ $subservice->id }}">{{ $subservice->subservicename }}
                                                </option>
                                            @endforeach --}}

                                            </select>
                                        </span>
                                        <p class="form-error-text" id="subservice_error"
                                            style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="state">Package Category</label>
                                        <span id="packagecategory_chang">
                                            <select class="form-control" id="packagecategory_id" name="packagecategory_id">
                                                <option value="">Select Package Category</option>
                                            </select>
                                        </span>
                                        <p class="form-error-text" id="packagecategory_error"
                                            style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Enter  Name" value="" />
                                        <p class="form-error-text" id="name_error" style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Price</label>
                                        <input id="price" name="price" type="text" class="form-control"
                                            placeholder="Enter Price" onkeypress="return validateNumber(event)"
                                            value="" />
                                        <p class="form-error-text" id="price_error" style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Image (100px x 100px)</label>
                                        <input id="image" name="image" type="file" class="form-control"
                                            placeholder="Enter" value="" />
                                        <p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;">
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text" class="form-control" id="discount" name="discount"
                                            placeholder="Enter Discount" onkeypress="return validateNumber(event)">
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="width: 100%;">Discount Type</label>
                                        <div style="padding: 9px 0;">
                                            <input type="radio" name="discount_type" value="0"
                                                id="percentageRadio">
                                            Percentage
                                            <input type="radio" name="discount_type" value="1" id="priceRadio">
                                            Price
                                            <input type="radio" name="discount_type" value="2" checked
                                                id="noneRadio">None
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name"> Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                </div>

                            </div>
                            <div class="text-end mt-4">
                                <a class="btn btn-primary" href="{{ route('packages.index') }}"> Cancel</a>
                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="button" class="btn btn-primary"
                                    onclick="javascript:category_validation()"id="submit_button">Submit</button>
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

    <script type="text/javascript">
        function subservice_change(service_id) {

            var url = '{{ url('subservice_show') }}';

            $.ajax({
                url: url,
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "service_id": service_id
                },
                success: function(msg) {
                    document.getElementById('subservice_chang').innerHTML = msg;
                }
            });
        }

        function packagecategory_change(subservice_id) {

            var url = '{{ url('packagecategory_show') }}';
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "subservice_id": subservice_id
                },
                success: function(msg) {
                    document.getElementById('packagecategory_chang').innerHTML = msg;
                }
            });

        }
    </script>

    <script>
        function category_validation() {
            var service_id = jQuery("#service_id").val();
            if (service_id == '') {
                jQuery('#service_error').html("Please Select Service");
                jQuery('#service_error').show().delay(0).fadeIn('show');
                jQuery('#service_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#service_id').offset().top - 150
                }, 1000);
                return false;
            }
            var subservice_id = jQuery("#subservice_id").val();
            if (subservice_id == '') {
                jQuery('#subservice_error').html("Please Select Sub Service");
                jQuery('#subservice_error').show().delay(0).fadeIn('show');
                jQuery('#subservice_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#subservice_id').offset().top - 150
                }, 1000);
                return false;
            }
            var packagecategory_id = jQuery("#packagecategory_id").val();
            if (packagecategory_id == '') {
                jQuery('#packagecategory_error').html("Please Selcect Package Category");
                jQuery('#packagecategory_error').show().delay(0).fadeIn('show');
                jQuery('#packagecategory_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#packagecategory_id').offset().top - 150
                }, 1000);
                return false;
            }
            var name = jQuery("#name").val();
            if (name == '') {
                jQuery('#name_error').html("Please Enter Name");
                jQuery('#name_error').show().delay(0).fadeIn('show');
                jQuery('#name_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#name').offset().top - 150
                }, 1000);
                return false;
            }
            var price = jQuery("#price").val();
            if (price == '') {
                jQuery('#price_error').html("Please Enter Price");
                jQuery('#price_error').show().delay(0).fadeIn('show');
                jQuery('#price_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#price').offset().top - 150
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



            $('#spinner_button').show();
            $('#submit_button').hide();

            $('#category_form_new').submit();
        }

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
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>



    <script>
        ClassicEditor

            .create(document.querySelector('#description'))

            .catch(error => {

                console.error(error);

            });
    </script>
@stop
