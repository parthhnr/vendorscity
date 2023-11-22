@extends('admin.includes.Template')
@section('content')


    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Edit Packages </h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Edit Packages </a>
                        </li>
                        <li class="breadcrumb-item active">Edit Packages </li>
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

                        <form id="category_form" action="{{ route('packages.update', $packages->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group">
                                    <label for="service">Service</label>
                                    <select class="form-control" id="service_id" name="service_id"
                                        onchange="subservice_change(this.value);">
                                        <option value="">Select Service</option>
                                        @foreach ($service_data as $service)
                                            <option value="{{ $service->id }}"
                                                {{ $service->id == $packages->service_id ? 'selected' : '' }}>
                                                {{ $service->servicename }}</option>
                                        @endforeach
                                    </select>
                                    <p class="form-error-text" id="service_error" style="color: red; margin-top: 10px;"></p>
                                </div>

                                <div class="form-group">
                                    <label for="subservice">Sub Service</label>
                                    <span id="subservice_chang">
                                        <select class="form-control" id="subservice_id" name="subservice_id"
                                            onchange="packagecategory_change(this.value);">
                                            <option value="">Select Sub Service</option>
                                            @foreach ($subservice_data as $subservice)
                                                <option value="{{ $subservice->id }}"
                                                    {{ $subservice->id == $packages->subservice_id ? 'selected' : '' }}>
                                                    {{ $subservice->subservicename }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </span>
                                    <p class="form-error-text" id="subservice_error" style="color: red; margin-top: 10px;">
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label for="state">Package Category</label>
                                    <span id="packagecategory_chang">
                                        <select class="form-control" id="packagecategory_id" name="packagecategory_id">
                                            <option value="">Select Package Category</option>
                                            @foreach ($packagecat_data as $packagecat)
                                                <option value="{{ $packagecat->id }}"
                                                    {{ $packagecat->id == $packages->packagecategory_id ? 'selected' : '' }}>
                                                    {{ $packagecat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </span>
                                    <p class="form-error-text" id="packagecategory_error"
                                        style="color: red; margin-top: 10px;">
                                    </p>
                                </div>


                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Enter Packages Name" value="{{ $packages->name }}" />
                                    <p class="form-error-text" id="name_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Price</label>
                                    <input id="price" name="price" type="text" class="form-control"
                                        placeholder="Enter Price" onkeypress="return validateNumber(event)"
                                        value="{{ $packages->price }}" />
                                    <p class="form-error-text" id="price_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <div class="form-group">
                                    <label for="name">Image</label>
                                    <input id="image" name="image" type="file" class="form-control"
                                        placeholder="Enter" value="" />
                                    @if ($packages->image != '')
                                        <img src="{{ url('public/upload/packages/large/' . $packages->image) }}"
                                            style="height: 50px;width: 50px;">
                                    @endif
                                    <p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Description</label>
                                    <textarea name="description" id="description" cols="30" rows="10">{{ $packages->description }}</textarea>
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
            var name = jQuery("#name").val();
            if (name == '') {
                jQuery('#name_error').html("Please Enter Packages ");
                jQuery('#name_error').show().delay(0).fadeIn('show');
                jQuery('#name_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#name').offset().top - 150
                }, 1000);
                return false;
            }


            $('#spinner_button').show();
            $('#submit_button').hide();

            $('#category_form').submit();
        }
    </script>
@stop
