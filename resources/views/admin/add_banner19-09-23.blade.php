@extends('admin.includes.Template')
@section('content')
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Banner</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('banner.index') }}">Banner</a></li>
						<li class="breadcrumb-item active">Add Banner</li>
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
						<form id="category_form" action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">
								
								<div class="form-group">
									<label for="name">Title</label>
									<input id="title" name="title" type="text" class="form-control" placeholder="Enter Title" value="" />
								</div>
								<div class="form-group">
									<label for="name">Sub Title</label>
									<input id="sub_title" name="sub_title" type="text" class="form-control" placeholder="Enter Sub Title" value="" />
								</div>
								<div class="form-group">
									<label for="name">Image (1920px x 1100px)</label>
									<input id="image" name="image" type="file" class="form-control"value="" />
								</div>

								<div class="form-group">
									<label for="name">Link</label>
									<input id="link" name="link" type="text" class="form-control" placeholder="Enter link" value="" />
								</div>
							</div>
							<div class="text-end mt-4">
								<a class="btn btn-primary" href="{{ route('banner.index') }}"> Cancel</a>
								
								
								<button class="btn btn-primary mb-1" type="button" disabled id="spinner_button" style="display: none;">
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										Loading...
								</button>
								
								<button type="button" class="btn btn-primary" id="submit_button"  onclick="javascript:category_validation()">Submit</button>
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
	function category_validation()
	{

		
		var title = jQuery("#title").val();
		if (title == '') {
			jQuery('#validate').html("Please Enter Title");
			jQuery('#validate').show().delay(0).fadeIn('show');
			jQuery('#validate').show().delay(2000).fadeOut('show');
			return false;
		}

		// var sub_title = jQuery("#sub_title").val();
		// if (sub_title == '') {
		// 	jQuery('#validate').html("Please Enter Sub Title");
		// 	jQuery('#validate').show().delay(0).fadeIn('show');
		// 	jQuery('#validate').show().delay(2000).fadeOut('show');
		// 	return false;
		// }

		var image = jQuery("#image").val();
		if (image == '') {
			jQuery('#validate').html("Please Select Image");
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