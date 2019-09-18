
@extends('layouts.app')
@section('content')
<!-- begin:: Content -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-4 mt-4">

	
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon-suitcase"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						@lang('base.edit_distributor')
						
					</h3>
				</div>
				
			</div>
			<div class="kt-portlet__body">

				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<!--begin:: form-->
						<form method="POST" action="{{url('administracion/distribuidores')}}/{{$id}}" class="kt-form" style="width: 100%;" role="form" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<input type="hidden" name="userType" id="userType" value="2">
							<div class="kt-portlet__body">

								@foreach($distributorData as $data)

								<div class="form-group row">
									<div class="col-lg-12  kt-align-right">
										<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--lg">{{$data->userHerbaLifeCode}}</span>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.distributor_refered')<span>*</span></label>
										<select class="form-control kt-select2" id="referedId" name="referedId" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($distributors as $distributor)
											<option value="{{$distributor->id}}" @if($data->distributor_referred_id == $distributor->id) Selected @endif>{{$distributor->userHerbaLifeCode}}: {{$distributor->userFirstName}} {{$distributor->userLastName}}</option>
											@endforeach
										</select>
										
									</div>

									<div class="col-lg-6">
										<label>@lang('base.user_dpi')<span>*</span></label>
										<input name="userDpi" id="userDpi"  value="{{$data->userIdentificationNumber}}" type="text" maxlength="15" class="form-control" required>									
									</div>
									
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.user_first_name')<span>*</span></label>
										<input name="userFirstName" id="userFirstName"  value="{{$data->userFirstName}}" type="text" maxlength="50" class="form-control" placeholder="" autofocus required>
										
									</div>
									<div class="col-lg-6">
										<label class="">@lang('base.user_last_name')<span>*</span></label>
										<input name="userLastName" id="userLastName"   value="{{$data->userLastName}}"type="text" maxlength="50" class="form-control" placeholder="" required>
										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
										<label class="">@lang('base.distributor_nit')<span>*</span></label>
										<input name="supplierIdentificationNumber" id="supplierIdentificationNumber"  value="{{$data->userIdentificationNumber}}" type="text" maxlength="20" class="form-control" placeholder=""  required>
										
									</div>

									<div class="col-lg-6">
										<label class="">@lang('base.distributor_email')<span>*</span></label>
										<input name="userEmail" id="userEmail" type="email"   value="{{$data->email}}" maxlength="100" class="form-control" placeholder=""  required>
										
									</div>

									
								</div>

								<div class="form-group row">
									

									<div class="col-lg-6">
										<label class="">@lang('base.distributor_phone_number')<span>*</span></label>
										<input name="userPhoneNumber" id="userPhoneNumber" value="{{$data->userPhoneNumber}}" type="phone" maxlength="12" class="form-control" placeholder=""  required>
										
									</div>

									<div class="col-lg-6">
										<label class="">@lang('base.user_address')<span>*</span></label>
										<div class="kt-input-icon">
											<input name="userAddress" id="userAddress" value="{{$data->userAddress}}" type="text" maxlength="50" class="form-control" placeholder="" required>
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
										</div>
										
									</div>

									
									
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label class="">@lang('base.state')<span>*</span></label>
										
										<select class="form-control kt-select2" id="state" name="state" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($states as $state)
											<option value="{{$state->id}}" @if($data->state_id==$state->id) Selected @endif>{{$state->stateName}}</option>
											@endforeach
										</select>
										
										
									</div>
									<div class="col-lg-6">
										<label class="">@lang('base.city')<span>*</span></label>
										
										<select class="form-control kt-select2" id="city" name="city" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($cities as $city)
												<option value="{{$city->id}}" @if($city->id == $data->city_id) Selected  @endif>{{$city->cityName}}</option>
											@endforeach
										</select>
										
									</div>
								</div>
								@endforeach
							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-12  kt-align-right">
											<button type="submit" class="btn btn-primary">@lang('base.btn_save_distributor')</button>
											<a href="{{url('administracion/distribuidores')}}" class="btn btn-secondary">@lang('base.btn_cancel')</a>
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

<script type="text/javascript">
		
	$("#state").change(function() {
			var stateId = $(this).val();
			$.ajax({
	          	type: "GET",
	          	url: "{{url('cities/getcitybystate')}}/"+stateId,
	           	data: {id: stateId},
      			cache: false,
      			contentType: false,
      			processData: false,
	          beforeSend: function(){
	          	
	          },
	          success: function(data){

	          }
	      }).done(function(uData){
	      	var options ='';
	      	var selected ='';
            options += '<option value="0">Seleccione Ciudad</option>';
            for (var x = 0; x < uData.cities.length; x++) {
               

                cityName = capitalize(uData.cities[x]['cityName']);
                
                options += '<option class="town" ' + ' value="' + uData.cities[x]['id'] + '">' + cityName + '</option>';
            }
                
                
            $('#city').html(options);
	      });
	});

	function capitalize(str) {
		return str
		    .toLowerCase()
		    .split(' ')
		    .map(function(word) {
		        return word[0].toUpperCase() + word.substr(1);
		    })
		    .join(' ');
		 }

</script>
@endsection