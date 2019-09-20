
@extends('layouts.app')
@section('content')
<!-- begin:: Content -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-4 mt-4">

	
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand fa fa-box-open"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						@lang('base.new_product')
						<small>@lang('base.new_product_description')</small>
					</h3>
				</div>
				
			</div>
			<div class="kt-portlet__body">

				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<!--begin:: form-->
						<form method="POST" action="{{url('administracion/productos')}}" class="kt-form" style="width: 100%;" role="form" enctype="multipart/form-data">
							@csrf
							<div class="kt-portlet__body">
								<div class="form-group row">
									<div class="col-lg-12">
										<label>@lang('base.product_name')<span>*</span></label>
										<input name="productName" id="productName" type="text" maxlength="50" class="form-control" placeholder="" autofocus required>
										
									</div>
								</div>

								<!--<div class="form-group row">
									<div class="col-lg-12">
										<label class="">@lang('base.product_description')<span>*</span></label>
										<textarea name="productDescription" id="productDescription" data-provide="markdown" rows="10"  maxlength="254" class="form-control"></textarea>
										
									</div>
								</div> -->

								<div class="form-group row">
									<div class="col-lg-12">
										<label>@lang('base.product_benefits')<span>*</span></label>
										<textarea name="productBenefits" id="productBenefits" data-provide="markdown" rows="10"  maxlength="1000" class="form-control"></textarea>									
									</div>

									
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.product_measure_unity')<span>*</span></label>
										<select class="form-control kt-select2" id="unity" name="unity" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($unities as $unity)
											<option value="{{$unity->id}}">{{$unity->unityName}}</option>
											@endforeach
										</select>
										
									</div>
								
									<div class="col-lg-6">
										<label>@lang('base.product_measure')<span>*</span></label>
										<div class="kt-input-icon">
											<input name="productMeasure" id="productMeasure" type="text" maxlength="10" class="form-control">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="fa fa-ruler-combined"></i></span></span>
										</div>
										
									</div>
									
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label class="">@lang('base.product_category')<span>*</span></label>
										
										<select class="form-control kt-select2" id="category" name="category" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->categoryName}}</option>
											@endforeach
										</select>
										
										
										
									</div>
									
								</div>

								<div class="form-group row">

									<div class="col-lg-12">
										<label class="">@lang('base.product_image')</label>
										<div class="form-image-container">
											<div class="custom-file-upload-product">
												<span><i class="fa fa-cloud-upload"></i> @lang('base.here_shows_product_image')</span>
											</div>
											<div class="kt-clear clear"></div>
											<input id="productPicture" name="productPicture" type="file" class="product-picture-hidden" onchange="loadPicture(event)" accept="image/x-png,image/gif,image/jpeg">
										</div>

									</div>
								</div>

							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-12  kt-align-right">
											<button type="submit" class="btn btn-primary">@lang('base.btn_save_product')</button>
											<button type="reset" class="btn btn-secondary">@lang('base.btn_cancel')</button>
										</div>
										
									</div>
								</div>
							</div>
						</form>
						<!--end:: form-->
					</div>
				</div>

				<!--end: Search Form -->
			</div>
			
		</div>

	</div>
	<!-- end:: Container-->
</div>
<!-- end:: Content-->
@endsection

@section('scripts')

<script src="{{ URL::asset('js/custom.functions.js') }}" type="text/javascript"></script>

<!--- Load picture -->
<script>
function loadPicture(event){
	var selectedFile = event.target.files[0];
	var inputLength = event.target.files[0].size;
	console.log(inputLength);

    if(inputLength > 0){
    	//$('#pictureChanged').val(1);
    	
    	 $('.custom-file-upload-product').css('background', 'url('+ window.URL.createObjectURL(selectedFile) +') center center no-repeat');
    	 $('.custom-file-upload-product').css('background-size', '100% auto');
    	 $('.custom-file-upload-product span').hide();

    }
    else{
    	$('#pictureChanged').val(0);	
    	$('.custom-file-upload-product').css('background', 'url(../../../admin/images/products/productAvatar.png) center center no-repeat');
    	$('.custom-file-upload-product').css('background-size', '100% auto');
    	$('.custom-file-upload-product span').show();

    }

    if(!inputLength){
    	$('.custom-file-upload-product').css('background', 'url(../../../admin/images/products/productAvatar.png) center center no-repeat');
    	$('.custom-file-upload-product').css('background-size', '100% auto');
    	$('.custom-file-upload-product span').show();
    }
	
}
</script>
@endsection