   @extends('admin.includes.Template')
   @section('content')


			<div class="content container-fluid">
			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Edit City</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="{{ route('city.index') }}">Edit City</a></li>
								<li class="breadcrumb-item active">Edit City</li>
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
								
								<form id="category_form" action="{{ route('city.update',$city->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<div class="row">
										<div class="form-group">
											<label for="country">Country</label>
											<select class="form-control" id="country" name="country" onchange="state_change(this.value);">
											<option value="">Select Country</option>
											@foreach($country_data as $country)
											<option value="{{$country->id}}" {{ $country->id == $city->country ? "selected" : "" }}>{{ $country->country }}</option>
											@endforeach
											</select>
										</div>

										<div class="form-group">
											<label for="state">State</label>
											<span id="state_chang">
												<select class="form-control" id="state" name="state">
												<option value="">Select State</option>
												@foreach($state_data as $state)
												<option value="{{$state->id}}" {{ $state->id == $city->state ? "selected" : "" }}>{{ $state->state }}</option>
												@endforeach
												</select>
											</span>
										</div>


										<div class="form-group">
											<label for="name">City</label>
											<input id="name" name="name" type="text" class="form-control" placeholder="Enter City Name" value="{{$city->name}}" />
										</div>
										
									</div>
									<div class="text-end mt-4">
										<a class="btn btn-primary" href="{{ route('city.index') }}"> Cancel</a>
								<button class="btn btn-primary mb-1" type="button" disabled id="spinner_button" style="display: none;">
										<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
										Loading...
								</button>
										<button type="button" class="btn btn-primary" onclick="javascript:category_validation()"id="submit_button">Submit</button>
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


<script type="text/javascript">
	function state_change(country_id){
		// alert(country_id);
		var url = '{{ url('state_show') }}';
		// alert(url);
		$.ajax({
			url: url,
            type: 'post',
            data: {
            	"_token": "{{ csrf_token() }}",
                "country_id": country_id
            },
            success: function(msg) {
                document.getElementById('state_chang').innerHTML = msg;
            }
		});
	}
</script>

<script>
	function category_validation()
	{
		var country = jQuery("#country").val();
		if (country == '') {
			jQuery('#validate').html("Please Select Country");
			jQuery('#validate').show().delay(0).fadeIn('show');
			jQuery('#validate').show().delay(2000).fadeOut('show');
			return false;
		}

		var state = jQuery("#state").val();
		if (state == '') {
			jQuery('#validate').html("Please Select State");
			jQuery('#validate').show().delay(0).fadeIn('show');
			jQuery('#validate').show().delay(2000).fadeOut('show');
			return false;
		}

		

		var name = jQuery("#name").val();
		if (name == '') {
			jQuery('#validate').html("Please Enter City Name");
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