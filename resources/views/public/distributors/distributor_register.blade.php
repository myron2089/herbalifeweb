
@extends('layouts.public_app')

@section('title')
<section id="page-title">
	<div class="container clearfix">
		<h1>Registro Distribuidor</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Inicio</a></li>
			<li class="breadcrumb-item"><a href="#">Distribuidor</a></li>
			<li class="breadcrumb-item active" aria-current="page">Registro</li>
		</ol>
	</div>

</section>
@endsection


@section('content')
<!--begin:: container clearfix-->
	<div class="container clearfix">

		<div class="row clearfix">

			<div class="col-md-10 ">


				<form class="row" id="checkout-form" action="{{url('distribuidor/registro')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-process"></div>
					<div class="col-lg-12">
						<div class="row checkout-form-billing">
							<!--<div class="col-12">
								<h3>Billing Information</h3>
							</div> -->
							

							
								
								<input name="referedId" id="referedId"  value="213213212" type="hidden" maxlength="100" class="form-control required" required >
							
							<div class="col-12 mt-2 mb-3">
								<div class="card p-3 bg-light">
									<div class="car-body">
										<h3 class="mb-2">Crear una cuenta de Herbalife</h3>
										<p class="mb-0">para acceder a tu cuenta en MyHerbalife, hacer pedidos y más...</p>
									</div>
								</div>
							</div>


							<div class="col-sm-12 col-md-6 form-group">
								<label>@lang('base.user_first_name')<span>*</span></label>
								<input name="userFirstName" id="userFirstName" type="text" maxlength="50"  class="form-control required" required autofocus>
							</div>

							<div class="col-sm-12 col-md-6 form-group">
								<label>@lang('base.user_last_name')<span>*</span></label>
								<input type="text" name="userLastName" id="userLastName" maxlength="50" class="form-control required" value="" required>
							</div>

							<!--<div class="col-6 form-group">
								<label>@lang('base.user_dpi')<span>*</span></label>
								<input name="userDpi" id="userDpi" type="text" maxlength="15" minlength="13" class="form-control required" required>
							</div>

							<div class="col-6 form-group">
								<label class="">@lang('base.distributor_nit')<span>*</span></label>
								<input name="userIdentificationNumber" id="userIdentificationNumber" type="text" maxlength="20" class="form-control" placeholder=""  required>
							</div> -->
							
							<div class="col-sm-12 col-md-6 form-group">
								<label class="">@lang('base.distributor_phone_number')<span>*</span></label>
								<input name="userPhoneNumber" id="userPhoneNumber" type="phone" maxlength="12" class="form-control" placeholder=""  required>
							</div>
							<div class="col-sm-12 col-md-6 form-group">
								<label class="">@lang('base.user_address')<span>*</span></label>
								<input name="userAddress" id="userAddress" type="text" maxlength="50" class="form-control" placeholder="" required>
										
							</div>
							<div class="col-sm-12 col-md-6 form-group">
								<label class="">@lang('base.state')<span>*</span></label>
										
								<select class="form-control kt-select2 select-state" id="state" name="state" required>
									<option value="">@lang('base.select_an_option')</option>
									@foreach($states as $state)
									<option value="{{$state->id}}">{{$state->stateName}}</option>
									@endforeach
								</select>
							</div>



							<div class="col-sm-12 col-md-6 form-group">
								<label class="">@lang('base.city')<span>*</span></label>
										
										<select class="form-control kt-select2 select-city" id="city" name="city" required>
											<option value="">@lang('base.select_an_option')</option>
										</select>
							</div>

							<div class="clear mt-4"></div>
							<div class="col-md-12">
								<div class="fancy-title title-bottom-border">
									<h4><span style="color: gray !important">Datos para inicio de sesión</span></h4>
								</div>
							</div>

							<div class="col-sm-12 col-md-6 form-group">
								<label class="">@lang('base.distributor_email')<span>*</span></label>
								<input name="userEmail" id="userEmail" type="email" maxlength="100" class="form-control" placeholder=""  required>
							</div>
							<div class="clear"></div>
							<div class="col-sm-12 col-md-6 form-group">
								<label class="">@lang('base.distributor_password')<span>*</span></label>
								<input name="userPassword" id="userPassword" type="password" minlength="8" maxlength="100" class="form-control" placeholder=""  required>
							</div>
							<div class="clear"></div>
							<div class=" col-sm-12 col-md-6 form-group">
								<label class="">@lang('base.distributor_password_confirm')<span>*</span></label>
								<input name="userPasswordConfirm" id="userPasswordConfirm" type="password" minlength="8" maxlength="100" class="form-control" placeholder="" required>
										
							</div>

							
							
						</div>
					</div>
					
					<div class="col-12">
						<div class="hidden">
							<input type="text" id="checkout-form-botcheck" name="checkout-form-botcheck" value="" />
						</div>
						<div class="form-group text-right">
							<button type="submit" name="checkout-form-submit" class="btn btn-md btn-secondary">Aplicar ahora</button>
						</div>
						<input type="hidden" name="prefix" value="checkout-form-">
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
<script type="text/javascript">
jQuery(document).ready(function($){

	$(".select-state").select2({
		placeholder: "Seleccione departamento"
	});

	$(".select-city").select2({
		placeholder: "Seleccione municipio/ciudad"
	});


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


		 var password = document.getElementById("userPassword")
		  , confirm_password = document.getElementById("userPasswordConfirm");

		function validatePassword(){
		  if(password.value != confirm_password.value) {
		    confirm_password.setCustomValidity("Las contraseñas no coinciden!");
		  } else {
		    confirm_password.setCustomValidity('');
		  }
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
});
</script>
@endsection