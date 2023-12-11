@extends('admin.includes.Template')

@section('content')

    <div class="content container-fluid">



        <!-- Page Header -->

        <div class="page-header">

            <div class="row">

                <div class="col-sm-12">

                    <h3 class="page-title">Edit Service</h3>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Service</a></li>

                        <li class="breadcrumb-item active">Edit Service</li>

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

                        <form id="service_form" action="{{ route('service.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            @method('PUT')

                            <div class="row">

                                {{-- <div class="form-group">

                                    <label for="name">Group</label>

                                    <select name="group_id" id="group_id" class="form-control">

                                        <option value=""> Select Group</option>

                                        @foreach ($all_group as $all_group_data)

                                            <option value="{{ $all_group_data['id'] }}"

                                                @if ($all_group_data['id'] == $service->group_id) {{ 'selected' }} @endif>

                                                {{ $all_group_data['name'] }}</option>

                                        @endforeach

                                    </select>

                                </div> --}}
                                <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control" id="country" name="country"
                                        onchange="state_change(this.value);">
                                        <option value="">Select Country</option>
                                        @foreach ($country_data as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $country->id == $service->country ? 'selected' : '' }}>
                                                {{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                    <p class="form-error-text" id="country_error" style="color: red; margin-top: 10px;"></p>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label for="name">Service Name</label>

                                    <input id="servicename" name="servicename" type="text" class="form-control"
                                        placeholder="Enter Service Name" value="{{ $service->servicename }}" />

                                    <p class="form-error-text" id="service_error" style="color: red; margin-top: 10px;"></p>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label for="name">Page Url</label>

                                    <input id="page_url" name="page_url" type="text" class="form-control"

                                        placeholder="Enter Page Url" value="{{ $service->page_url }}" />

                                    <p class="form-error-text" id="page_url_error" style="color: red; margin-top: 10px;"></p>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label for="title1">Banner Title 1</label>

                                    <input id="title1" name="title1" type="text" class="form-control"

                                        placeholder="Enter Banner Title 1" value="{{ $service->title1 }}" />

                                    <p class="form-error-text" id="title1_error" style="color: red; margin-top: 10px;"></p>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label for="title2">Banner Title 2</label>

                                    <input id="title2" name="title2" type="text" class="form-control"

                                        placeholder="Enter Banner Title 2" value="{{ $service->title2 }}" />

                                    <p class="form-error-text" id="title2_error" style="color: red; margin-top: 10px;"></p>

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label for="banner_url">Banner Url</label>

                                    <input id="banner_url" name="banner_url" type="text" class="form-control"

                                        placeholder="Enter Banner Url" value="{{ $service->banner_url }}" />

                                    <p class="form-error-text" id="banner_url_error" style="color: red; margin-top: 10px;"></p>

                                </div>
                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">

                                    <label for="name">Banner (443 x 305)</label>

                                    <input id="image" name="image" type="file" class="form-control"
                                        value="" />
                                    @if ($service->image != '')
                                        <img src="{{ asset('public/upload/service/large/' . $service->image) }}"
                                            style=" width: 10%;margin-top: 10px;" />
                                    @endif
                                    <p class="form-error-text" id="image_error" style="color: red; margin-top: 10px;"></p>

                                </div>
                            </div>
                               <!--  <div class="form-group">

                                    <label>Banner Description</label>

                                    <textarea class="form-control" id="banner_description" name="banner_description" placeholder="Enter Banner Description">{{ $service->banner_description }}</textarea>

                                    <p id="description_error" style="display: none;color: red"></p>

                                </div> -->

                                

                            </div>



                            {{-- <div class="col-md-12">

                                <div class="form-group">

                                    <label>Meta Title</label>

                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        placeholder="Enter Meta Title" value="{{ $service->meta_title }}">

                                    <p id="meta_title_error" style="display: none;color: red"></p>

                                    @error('meta_title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

                                </div>



                            </div>

                            <div class="col-md-12">

                                <div class="form-group">

                                    <label>Meta Keywords</label>

                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        placeholder="Enter Meta Keywords" value="{{ $service->meta_keywords }}">

                                    <p id="meta_keywords_error" style="display: none;color: red"></p>

                                    @error('meta_keywords')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror

                                </div>



                            </div> --}}



                            {{-- <div class="col-md-12">

                                <div class="form-group">

                                    <label>Meta Description</label>

                                    <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description">{{ $service->meta_description }}</textarea>

                                    <p id="meta_description_error" style="display: none;color: red"></p>

                                </div>

                            </div> --}}



                            <div class="text-end mt-4">

                                <a class="btn btn-primary" href="{{ route('service.index') }}"> Cancel</a>

                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">

                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>

                                    Loading...

                                </button>



                                <button type="button" class="btn btn-primary" id="submit_button"
                                    onclick="javascript:service_validation()">Submit</button>

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

    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>



    <script>
        ClassicEditor

            .create(document.querySelector('#banner_description'))

            .catch(error => {

                console.error(error);

            });
    </script>



    <script>

        $(function() {

            $("#servicename").keyup(function() {

                var Text = $(this).val();

                Text = Text.toLowerCase();

                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');

                $("#page_url").val(Text);

            });

        });

        function service_validation() {

            var country = jQuery("#country").val();

            if (country == '') {
                jQuery('#country_error').html("Please Select Country");
                jQuery('#country_error').show().delay(0).fadeIn('show');
                jQuery('#country_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#country').offset().top - 150
                }, 1000);
                return false;
            }

            var servicename = jQuery("#servicename").val();

            if (servicename == '') {
                jQuery('#service_error').html("Please Enter Service Name");
                jQuery('#service_error').show().delay(0).fadeIn('show');
                jQuery('#service_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#servicename').offset().top - 150
                }, 1000);
                return false;
            }

            var page_url = jQuery("#page_url").val();
            if (page_url == '') {
                jQuery('#page_url_error').html("Please Enter Page Url");
                jQuery('#page_url_error').show().delay(0).fadeIn('show');
                jQuery('#page_url_error').show().delay(2000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $('#page_url').offset().top - 150
                }, 1000);
                return false;
            }



            $('#spinner_button').show();

            $('#submit_button').hide();



            $('#service_form').submit();

        }
    </script>

@stop
