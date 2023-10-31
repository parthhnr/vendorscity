@extends('admin.includes.Template')

@section('content')

    <div class="content container-fluid">



        <!-- Page Header -->

        <div class="page-header">

            <div class="row">

                <div class="col-sm-12">

                    <h3 class="page-title">Collection</h3>

                    <ul class="breadcrumb">

                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>

                        <li class="breadcrumb-item"><a href="{{ route('collection.index') }}">Collection</a></li>

                        <li class="breadcrumb-item active">Add Collection</li>

                    </ul>

                </div>

            </div>

        </div>

        <!-- /Page Header -->



        <div id="validator"  class="alert alert-danger alert-dismissable" style="display:none;">

            <i class="fa fa-warning"></i>

            <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->

            <b>Error &nbsp;:  </b><span id="error_msg1"></span>

        </div>



        <!-- <div id="validate" class="alert alert-danger alert-dismissible fade show" style="display: none;">

			<span id="login_error"></span>

				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>

		</div> -->



        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-body">

                        <!-- <h4 class="card-title">Basic Info</h4> -->

                        <form action="{{ route('collection.store') }}" method="POST" id="form" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                            



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label>Name</label>

                                        <input type="text" class="form-control" id="name" name="name">

                                        @error('name')

                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                                        @enderror

                                    </div>

                                    

                                </div>

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label>Page Url</label>

                                        <input type="text" class="form-control" id="page_url" name="page_url">

                                        @error('Page_url')

                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                                        @enderror

                                    </div>

                                    

                                </div>



                                



                                <div class="col-md-12">

                                    <div class="form-group">

                                        <label>Image (Size : 600px X 800px )</label>

                                        <input type="file" class="form-control" id="image" name="image">

                                        @error('image')

                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                                        @enderror

                                    </div>

                                    

                                </div>


                                <div class="col-md-12" style="display: none;">

									<div class="form-group">

										<label for="description" style="margin:15px 0 5px 0px; width:100%;">

											Description</label>

										<textarea id="description" name="description" class="form-control"

											placeholder="Enter Description"></textarea>

									</div>

								</div>

                               

                            </div>

                            <div class="text-end mt-4">

                                <a href="{{ route('collection.index') }}" class="btn btn-primary text-light">Cancel</a>
								
								<button class="btn btn-primary mb-1" type="button" disabled id="spinner_button" style="display: none;">
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										Loading...
								</button>

                                <button type="button" onclick="validation();" id="submit_button" class="btn btn-primary">Submit</button>

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

    function validation(){



        var name = $("#name").val();

		if(name == ''){

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

		if(page_url == ''){

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


        var image = $("#image").val();

        if(image == ''){

            //alert('Please Enter Category ');

            $("#error_msg1").html("Please Select Image.");

            //$("#validator").css("display","block");

            $('#validator').show().delay(0).fadeIn('show');

            $('#validator').show().delay(5000).fadeOut('show');

            $('html, body').animate({

                scrollTop: $("#error_msg1").offset().top - 150

            }, 100);

            return false;

        }

		$('#spinner_button').show();
        $('#submit_button').hide();

        $('#form').submit();



    }

</script>



<script>

$(document).ready(function(){



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

    .catch(error=>{

    console.error(error);

    });

</script>

@stop



