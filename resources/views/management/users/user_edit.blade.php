
@extends('layouts.app')
@section('content')
<!-- begin:: Content -->

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-4 mt-4">

	
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-line-chart"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						@lang('base.edit_user')
						<small>@lang('base.edit_user_description')</small>
					</h3>
				</div>
				
			</div>
			<div class="kt-portlet__body">

				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<!--begin:: form-->
						<form method="POST" action="{{url('administracion/usuarios')}}/{{$id}}" class="kt-form" style="width: 100%;">
							@method('PUT')
							@csrf
							@foreach($userData as $data)
							<div class="kt-portlet__body">
								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.user_first_name')<span>*</span></label>
										<input name="userFirstName" id="userFirstName" type="text" maxlength="50" class="form-control" placeholder="" autofocus value="{{$data->userFirstName}}" required>
										
									</div>
									<div class="col-lg-6">
										<label class="">@lang('base.user_last_name')<span>*</span></label>
										<input name="userLastName" id="userLastName" type="text" maxlength="50" class="form-control" value="{{$data->userLastName}}" placeholder="" required>
										
									</div>
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.user_dpi')<span>*</span></label>
										<input name="userDpi" id="userDpi" type="text" maxlength="15" class="form-control" value="{{$data->userIdentificationNumber}}" required>									
									</div>

									<div class="col-lg-6">
										<label>@lang('base.user_email')<span>*</span></label>
										<div class="kt-input-icon">
											<input name="userEmail" id="userEmail" type="email" maxlength="100" class="form-control" value="{{$data->email}}" placeholder="correo@mimail.com" required>
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-envelope"></i></span></span>
										</div>
										
									</div>
								</div>
								
								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.user_phone_number')<span>*</span></label>
										<div class="kt-input-icon">
											<input name="userPhoneNumber" id="userPhoneNumber" type="phone" maxlength="12" class="form-control" value="{{$data->userPhoneNumber}}" placeholder="55441100">
											<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-phone-square"></i></span></span>
										</div>
										
									</div>
									<div class="col-lg-6">
										<label class="">@lang('base.user_address')<span>*</span></label>
										<div class="kt-input-icon">
											<input name="userAddress" id="userAddress" type="text" maxlength="50" class="form-control" value="{{$data->userAddress}}" placeholder="" required>
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
												<option value="{{$state->id}}" @if($state->id == $data->state_id) Selected  @endif>{{$state->stateName}}</option>
											@endforeach
										</select>
										
										
									</div>
									<div class="col-lg-6">
										<label class="">@lang('base.city')</label>
										
										<select class="form-control kt-select2" id="city" name="city" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($cities as $city)
												<option value="{{$city->id}}" @if($city->id == $data->city_id) Selected  @endif>{{$city->cityName}}</option>
											@endforeach
										</select>
										
									</div>
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label class="">@lang('base.user_type')<span>*</span></label>
										
										<select name="userType" id="userType" required class="form-control kt-bootstrap-select" required="">
											<option value="">@lang('base.select_an_option')</option>
											@foreach($userTypes as $type)
												<option value="{{$type->id}}" @if($type->id == $data->user_type_id) Selected  @endif>{{$type->userTypeName}}</option>
											@endforeach
										</select>					
										
									</div>
								</div>

							</div>
							@endforeach
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-12  kt-align-right">
											<button type="submit" class="btn btn-primary">@lang('base.btn_save_user')</button>
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