@extends('admin.includes.Template')
@section('content')
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Product</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
						<li class="breadcrumb-item active">Add Product</li>
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
						<form id="category_form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row">

							<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <span id="cat_change">
                                        <select name="cat_id" id="cat_id" class="form-control" onchange="subcategory_change(this.value);">
                                            <option value="">Select Category</option>
											@foreach($category as $category_data)
                                                <option value="{{$category_data->id}}">{{$category_data->name}}</option>
                                                @endforeach
                                        </select>
                                        </span>
                                        <p id="cat_error" style="display: none;color: red"></p>
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
							</div>

							<div class="col-md-6">
									<div class="form-group">
                                        <label>Sub Category</label>
                                        <span id="subcat_change">
                                            <select name="subcat_id" id="subcat_id" class="form-control">
                                                <option value="">Select Sub Category</option>
                                            </select>
                                        </span>
                                        <p id="subcat_error" style="display: none;color: red"></p>
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" name="name" type="text" class="form-control" placeholder="Enter Name" value="" />
									<p id="name_error" style="display: none;color: red"></p>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Page Url</label>
									<input id="page_url" name="page_url" type="text" class="form-control" placeholder="Enter Page Url" value="" />
									<p id="page_url_error" style="display: none;color: red"></p>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="product_code">Product Code</label>
									<input id="product_code" name="product_code" type="text" class="form-control" placeholder="Enter Product Code" value="" />
									<p id="product_code_error" style="display: none;color: red"></p>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="product_code">Sku Code</label>
									<input id="sku_code" name="sku_code" type="text" class="form-control" placeholder="Enter Sku Code" value="" />
									<p id="sku_code_error" style="display: none;color: red"></p>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<label>Short Description</label>
									<textarea class="form-control" id="short_description" name="short_description" placeholder="Enter Short Description"></textarea>
									<p id="short_description_error" style="display: none;color: red"></p>
								</div>
							</div>

							<div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group"> <label for="categoryname">Size</label>
                                            <select class="form-control" id="size" name="size[]">
                                                <option value="">Select Size</option>
												@foreach($size as $size_data)
												<option value="{{$size_data->id}}">{{$size_data->name}}</option>
												@endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group"> <label for="categoryname">Colour</label>
                                            <select class="form-control" id="colour" name="colour[]">
                                                <option value="">Select Colour</option>
												@foreach($colour as $colour_data)
												<option value="{{$colour_data->id}}">{{$colour_data->name}}</option>
												@endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
									<div class="col-md-2">
                                        <div class="form-group"> <label for="categoryname">Price</label>
                                            <input type="text" id="price" name="price[]" class="form-control" placeholder="Enter  Price">
                                        </div>
                                    </div>
									<div class="col-md-2">
                                        <div class="form-group"> <label for="categoryname">Quantity</label>
                                            <input type="text" id="qty" name="qty[]" class="form-control" placeholder="Enter Qty">
                                        </div>
                                    </div>
                                </div>
								
								<div class="input_fields_wrap12">
                                </div>

								<div class="form-group">
									<div class="col-sm-12">
										<button
											style="border: medium none;margin-right: 0px;line-height: 25px;margin-top: -62px;"
											class="submit btn bg-purple pull-right" type="button"
											id="add_field_button12">Add Price </button>
									</div>
								</div>
<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Collection</label>
                                        
                                        <select name="collection_id" id="collection_id" class="form-control">
                                            <option value="">Select collection</option>
											@foreach($collection as $collection_data)
                                                <option value="{{$collection_data->id}}">{{$collection_data->name}}</option>
                                                @endforeach
                                        </select>
                                       <p id="collection_error" style="display: none;color: red"></p>
                                        @error('name')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
							</div>

								<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Discount</label>
                                        <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter discount">
                                        @error('discount')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <p id="discount_error" style="display: none;color: red"></p>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <label style="width: 100%;">Discount Type</label>
                                        <div style="padding: 9px 0;">
                                            <input type="radio" name="radio" value="0"> Percentage
                                            <input type="radio" name="radio" value="1"> Price
                                        </div>
                                        <p id="discount_type_error" style="display: none;color: red"></p>
                                    </div>
                                </div>


								<div class="col-md-12">
									<div class="form-group">
										<label for="description" style="margin:15px 0 5px 0px; width:100%;">
											Description</label>
										<textarea id="description" name="description" class="form-control"
											placeholder="Enter Description"></textarea>
									</div>
								</div>



                                <div class="col-md-6">
                                    <div class="form-group"> <label for="categoryname">Material</label>
                                        <select class="form-control fav_clr" id="material_id" name="material_id[]" multiple="multiple">
                                            <option value="">Select Material</option>
											@foreach($material as $material_data)
											<option value="{{$material_data->id}}">{{$material_data->name}}</option>
											@endforeach
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group"> <label for="categoryname">Style type</label>
                                        <select class="form-control fav_clr" id="style_type" name="style_type[]" multiple="multiple">
                                            <option value="">Select Style Type</option>
											@foreach($style_type as $style_type_data)
											<option value="{{$style_type_data->id}}">{{$style_type_data->name}}</option>
											@endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
									<div class="form-group">
										<label for="description" style="margin:15px 0 5px 0px; width:100%;">
											Lining</label>
										<textarea id="lining" name="lining" class="form-control"
											placeholder="Enter Lining"></textarea>
											 <p id="lining_error" style="display: none;color: red"></p>
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



							</div>
							<div class="text-end mt-4">
								<a class="btn btn-primary" href="{{ route('product.index') }}"> Cancel</a>
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

$("#material_id").select2();
$("#style_type").select2();

</script>

<script>
	function category_validation()
	{
		var cat_id = jQuery("#cat_id").val();
		if (cat_id == '') {
			jQuery('#cat_error').html("Please Select Category");
			jQuery('#cat_error').show().delay(0).fadeIn('show');
			jQuery('#cat_error').show().delay(2000).fadeOut('show');
			$('html, body').animate({
                scrollTop: $("#cat_id").offset().top - 150
            }, 100);
			return false;
		}

		var subcat_id = jQuery("#subcat_id").val();
		if (subcat_id == '') {
			jQuery('#subcat_error').html("Please Select Sub Category");
			jQuery('#subcat_error').show().delay(0).fadeIn('show');
			jQuery('#subcat_error').show().delay(2000).fadeOut('show');
			$('html, body').animate({
                scrollTop: $("#cat_id").offset().top - 150
            }, 100);
			return false;
		}

		var name = jQuery("#name").val();
		if (name == '') {
			jQuery('#name_error').html("Please Enter Name");
			jQuery('#name_error').show().delay(0).fadeIn('show');
			jQuery('#name_error').show().delay(2000).fadeOut('show');
			$('html, body').animate({
                scrollTop: $("#name").offset().top - 150
            }, 100);
			return false;
		}

		var page_url = jQuery("#page_url").val();
		if (page_url == '') {
			jQuery('#page_url_error').html("Please Enter Page Url");
			jQuery('#page_url_error').show().delay(0).fadeIn('show');
			jQuery('#page_url_error').show().delay(2000).fadeOut('show');
			$('html, body').animate({
                scrollTop: $("#page_url").offset().top - 150
            }, 100);
			return false;
		}

		var product_code = jQuery("#product_code").val();
		if (product_code == '') {
			jQuery('#product_code_error').html("Please Enter Product Code");
			jQuery('#product_code_error').show().delay(0).fadeIn('show');
			jQuery('#product_code_error').show().delay(2000).fadeOut('show');
			$('html, body').animate({
                scrollTop: $("#product_code").offset().top - 150
            }, 100);
			return false;
		}

		var sku_code = jQuery("#sku_code").val();
		if (sku_code == '') {
			jQuery('#sku_code_error').html("Please Enter Product Code");
			jQuery('#sku_code_error').show().delay(0).fadeIn('show');
			jQuery('#sku_code_error').show().delay(2000).fadeOut('show');
			$('html, body').animate({
                scrollTop: $("#sku_code").offset().top - 150
            }, 100);
			return false;
		}
		
		$('#spinner_button').show();
        $('#submit_button').hide();

		

		$('#category_form').submit();
	}


	function subcategory_change(cat_id){
    //  alert(cat_id);

        var url = '{{ url('product_show_subcategory') }}';
        $.ajax({
            url: url,
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "cat_id": cat_id
            },
            success: function(msg) {
                document.getElementById('subcat_change').innerHTML = msg;
            }
        });
    }
</script>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
    var max_fields = 50;
    var wrapper = $(".input_fields_wrap12");
    var add_button = $("#add_field_button12");

    var b = 0;
    $(add_button).click(function(e) { //alert('ok');
        e.preventDefault();
        if (b < max_fields) {
            b++;
            $(wrapper).append(
                '<div class="row"><div class="col-md-2"><div class="form-group"> <label for="categoryname">Size</label><select class="form-control" id="size" name="size[]"><option value="">Select Size</option>@foreach($size as $size_data)<option value="{{$size_data->id}}">{{$size_data->name}}</option>@endforeach</select></div></div><div class="col-md-2"><div class="form-group"> <label for="categoryname">Colour</label><select class="form-control" id="colour" name="colour[]"><option value="">Select Colour</option>@foreach($colour as $colour_data)<option value="{{$colour_data->id}}">{{$colour_data->name}}</option>@endforeach</select></div></div><div class="col-md-2"><div class="form-group"> <label for="categoryname">Price</label><input type="text" id="price" name="price[]" class="form-control" placeholder="Enter  Price"></div></div><div class="col-md-2"><div class="form-group"> <label for="categoryname">Quantity</label>                                 <input type="text" id="qty" name="qty[]" class="form-control" placeholder="Enter Qty"></div></div><a href="#" class="btn btn-danger pull-right remove_field1" style="margin-right: 0;margin-top: 23px;width: 10%;float: right;height: 38px;margin-left: 127px;">Remove</a></div>'
            );
        }
    });
    $(wrapper).on("click", ".remove_field1", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        b--;
    })
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