
@extends('layouts.app')
@section('content')
<!-- begin:: Content -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-4 mt-4">

	
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-group"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						@lang('base.new_supplier')
						<small>@lang('base.new_supplier_description')</small>
					</h3>
				</div>
				
			</div>
			<div class="kt-portlet__body">

				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<!--begin:: form-->
						<form method="POST" action="{{url('administracion/proveedores')}}" class="kt-form" style="width: 100%;" role="form" enctype="multipart/form-data">
							@csrf
							<div class="kt-portlet__body">
								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.supplier_name')<span>*</span></label>
										<input name="supplierName" id="supplierName" type="text" maxlength="50" class="form-control" placeholder="" autofocus required>
										
									</div>

									<div class="col-lg-6">
										<label class="">@lang('base.supplier_nit')<span>*</span></label>
										<input name="supplierIdentificationNumber" id="supplierIdentificationNumber" type="text" maxlength="20" class="form-control" placeholder=""  required>
										
									</div>
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label class="">@lang('base.supplier_email')<span>*</span></label>
										<input name="supplierEmail" id="supplierEmail" type="email" maxlength="100" class="form-control" placeholder=""  required>
										
									</div>

									<div class="col-lg-6">
										<label class="">@lang('base.supplier_phone_number')<span>*</span></label>
										<input name="supplierPhoneNumber" id="supplierPhoneNumber" type="phone" maxlength="12" class="form-control" placeholder=""  required>
										
									</div>
									
								</div>

							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-12  kt-align-right">
											<button type="submit" class="btn btn-primary">@lang('base.btn_save_suppler')</button>
											<a href="{{url('administracion/proveedores')}}" class="btn btn-secondary">@lang('base.btn_cancel')</a>
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