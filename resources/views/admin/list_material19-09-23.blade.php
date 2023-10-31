   @extends('admin.includes.Template')
   @section('content')

   <div class="content container-fluid">

   			
			<!-- Page Header -->
			<div class="page-header">
			   <div class="row align-items-center">
				  <div class="col">
					 <h3 class="page-title">Material</h3>
					 <ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Material</li>
					 </ul>
				  </div>

				 
				  <div class="col-auto">

					 <a class="btn btn-primary me-1" href="{{ route('material.create') }}">
						<i class="fas fa-plus"></i> Add Material
					 </a>
				  	<a class="btn btn-danger me-1" href="javascript:void('0');" onclick="delete_category();">
						<i class="fas fa-trash"></i> Delete
					 </a>
					<!--  <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
					   <i class="fas fa-filter"></i> Filter
					 </a> -->
				  </div>
					

			   </div>
			</div>
			<!-- /Page Header -->

			<!-- @if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif -->

			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-dismissible fade show">
			    <strong>Success!</strong> {{ $message }}
				<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			</div>
			@endif

			<div class="alert alert-success alert-dismissible fade show success_show" style="display: none;">
			    <strong>Success! </strong><span id="success_message"></span>
				<!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
			</div>
			   
			<!-- Search Filter -->
			<div id="filter_inputs" class="card filter-card">
			   <div class="card-body pb-0">
				  <div class="row">
					 <div class="col-sm-6 col-md-3">
						<div class="form-group">
						   <label>Name</label>
						   <input type="text" class="form-control">
						</div>
					 </div>
					 <div class="col-sm-6 col-md-3">
						<div class="form-group">
						   <label>Email</label>
						   <input type="text" class="form-control">
						</div>
					 </div>
					 <div class="col-sm-6 col-md-3">
						<div class="form-group">
						   <label>Phone</label>
						   <input type="text" class="form-control">
						</div>
					 </div>
				  </div>
			   </div>
			</div>
			<!-- /Search Filter -->

			

			
			<div class="row">
			   <div class="col-sm-12">
				  
				  <div class="card card-table">
					 <div class="card-body">
					 	<form id="form" action="{{ route('delete_material') }}" enctype="multipart/form-data">
							<INPUT TYPE="hidden" NAME="hidPgRefRan" VALUE="<?php echo rand();?>">
							@csrf
						<div class="table-responsive">
						   <table class="table table-center table-hover datatable">
							  <thead class="thead-light">
								 <tr>
									<th>Select</th>
									<th>Name</th>
									<th class="text-right">Actions</th>
								 </tr>
							  </thead>
							  <tbody>
								 @foreach($all_data as $data)
								 <tr>
								 	<td><input name="selected[]" id="selected[]" value="{{$data->id}}" type="checkbox"  class="minimal-red" style="height: 20px;width: 20px;border-radius: 0px;color: red;"></td>

									<td>
									   
										 {{$data->name}}
									</td>
									
									
									<td class="text-right">
										<a class="btn btn-primary" href="{{ route('material.edit',$data->id) }}"><i class="far fa-edit"></i></a>
									</td>
									
								 </tr>
								 @endforeach
								
							  </tbody>
						   </table>
						</div>
						</form>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
   @stop
   
   <!-- Delete  Modal -->
	<div class="modal custom-modal fade" id="delete_model" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="modal-icon text-center mb-3">
						<i class="fas fa-trash-alt text-danger"></i>
					</div>
					<div class="modal-text text-center">
						<!-- <h3>Delete Expense Category</h3> -->
						<p>Are you sure want to delete?</p>
					</div>
				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" onclick="form_sub();">Delete</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete Modal -->

	<!-- Select one record Category Modal -->
	<div class="modal custom-modal fade" id="select_one_record" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="modal-text text-center">
						<h3>Please select at least one record to delete</h3>
						<!-- <p>Are you sure want to delete?</p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Select one record Category Modal -->
	
<script>

function delete_category()
{
	// alert('test');
	var checked = $("#form input:checked").length > 0;
    if (!checked)
	{
		$('#select_one_record').modal('show');	
    }
	else
	{
		$('#delete_model').modal('show');
	}
}

function form_sub(){
	$('#form').submit(); 
}


</script>

