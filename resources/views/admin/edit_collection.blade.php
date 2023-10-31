@extends('admin.includes.Template')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Edit Collection</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('collection.index') }}">Collection</a></li>
                        <li class="breadcrumb-item active">Edit Collection</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div id="validator" class="alert alert-danger alert-dismissable" style="display:none;">
            <i class="fa fa-warning"></i>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
            <b>Error &nbsp;: </b><span id="error_msg1"></span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Basic Info</h4> -->
                        <form id="form" action="{{ route('collection.update', $collection->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Enter Name" value="{{ $collection->name }}" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Page Url</label>
                                    <input id="page_url" name="page_url" type="text" class="form-control"
                                        placeholder="Enter Page Url" value="{{ $collection->page_url }}" />
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Image (Size : 600px X 800px )</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($collection->image != '')
                                            <img src="{{ asset('public/upload/collection/large/' . $collection->image) }}"
                                                style="width: 5%;margin-top: 10px;" />
                                        @endif
                                        @error('image')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;">
                                    <div class="form-group">
                                        <label for="description" style="margin:15px 0 5px 0px; width:100%;">
                                            Description</label>
                                        <textarea id="description" name="description" class="form-control" placeholder="Enter Description">{{ $collection->description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            placeholder="Enter Meta Title" value="{{ $collection->meta_title }}">
                                        
                                        @error('meta_title')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords"
                                            name="meta_keywords" placeholder="Enter Meta Keywords" value="{{ $collection->meta_keywords }}">
                                        
                                        @error('meta_keywords')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description">{{ $collection->meta_description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <a class="btn btn-primary" href="{{ route('collection.index') }}"> Cancel</a>
                                <button class="btn btn-primary mb-1" type="button" disabled id="spinner_button"
                                    style="display: none;">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button type="button" class="btn btn-primary" id="submit_button"
                                    onclick="javascript:validation()">Submit</button>
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
        function validation() {
            //
            var category_name = $("#name").val();
            if (category_name == '') {
                //alert('Please Enter Category ');
                $("#error_msg1").html("Please Enter Name.");
                //$("#validator").css("display","block");
                $('#validator').show().delay(0).fadeIn('show');
                $('#validator').show().delay(5000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $("#error_msg1").offset().top - 150
                }, 100);
                return false;
            }
            var page_url = $("#page_url").val();
            if (page_url == '') {
                //alert('Please Enter Category ');
                $("#error_msg1").html("Please Enter Page Url.");
                //$("#validator").css("display","block");
                $('#validator').show().delay(0).fadeIn('show');
                $('#validator').show().delay(5000).fadeOut('show');
                $('html, body').animate({
                    scrollTop: $("#error_msg1").offset().top - 150
                }, 100);
                return false;
            }
            //alert('sd');
            $('#spinner_button').show();
            $('#submit_button').hide();
            $('#form').submit();
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#name").keyup(function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#page_url").val(Text);
            });
        });
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