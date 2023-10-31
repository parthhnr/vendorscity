@extends('admin.includes.Template')
@section('content')
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Category</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
						<li class="breadcrumb-item active">Add Category</li>
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
						<form id="category_form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="form-group">
									<label for="name">Category Name</label>
									<input id="name" name="name" type="text" class="form-control" placeholder="Enter Category Name" value="" />
								</div>
								<div class="form-group">
									<label for="name">Page Url</label>
									<input id="page_url" name="page_url" type="text" class="form-control" placeholder="Enter Page Url" value="" />
								</div>


							</div>

							<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title">
                                        <p id="meta_title_error" style="display: none;color: red"></p>
                                        @error('meta_title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords">
                                        <p id="meta_keywords_error" style="display: none;color: red"></p>
                                        @error('meta_keywords')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>
								
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
										<textarea class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description"></textarea>
										<p id="meta_description_error" style="display: none;color: red"></p>
									</div>
								</div>	
								
							<div class="text-end mt-4">
								<a class="btn btn-primary" href="{{ route('category.index') }}"> Cancel</a>

								<button class="btn btn-primary mb-1" type="button" disabled id="spinner_button" style="display: none;">
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										Loading...
								</button>

								<button type="button" class="btn btn-primary" id="submit_button" onclick="javascript:category_validation()">Submit</button>
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

$(function() 
{
    $("#name").keyup(function()
    {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
        $("#page_url").val(Text);
    });
});

</script>

<script>
	function category_validation()
	{
		var name = jQuery("#name").val();
		if (name == '') {
			jQuery('#validate').html("Please Enter Category Name");
			jQuery('#validate').show().delay(0).fadeIn('show');
			jQuery('#validate').show().delay(2000).fadeOut('show');
			return false;
		}

		var page_url = jQuery("#page_url").val();
		if (page_url == '') {
			jQuery('#validate').html("Please Enter Page Url");
			jQuery('#validate').show().delay(0).fadeIn('show');
			jQuery('#validate').show().delay(2000).fadeOut('show');
			return false;
		}
        
        $('#spinner_button').show();
        $('#submit_button').hide();

		$('#category_form').submit();
	}
</script>
@stop