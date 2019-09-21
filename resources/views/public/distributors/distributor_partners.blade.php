
@extends('layouts.public_app')

@section('title')
<section id="page-title">
	<div class="container clearfix">
		<h1>Mis Asociados</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('distribuidor/inicio')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="#">Distribuidor</a></li>
			<li class="breadcrumb-item active" aria-current="page">Mis Asociados</li>
		</ol>
	</div>

</section>
@endsection

@section('content')
<!--begin:: container clearfix-->
<div class="container clearfix">

	<div class="row clearfix">

		<div class="col-md-12">




			<div class="clear"></div>

			<div class="row clearfix">

				<div class="col-lg-12">
					

					<table class="table table-bordered table-striped mt-4" id="ordersTable">
						<thead>
							<tr>
								<th>Codigo Herbalife</th>
								<th>Nombre</th>
								<th>Correo electrónico</th>
								<th>Número de teléfono</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($distributors as $distributor)
							<tr>
								<td><code>{{$distributor->userHerbaLifeCode}}</code></td>
								<td>
									{{$distributor->userFirstName}} {{$distributor->userLastName}}
								</td>
								<td>{{$distributor->email}}</td>
								<td>{{$distributor->userPhoneNumber}}</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>

			</div>

		</div>



	</div>

</div>
<!--end::container clearfix-->

@endsection

@section('scripts')
<script>
	jQuery(document).ready(function($){
	 	$('#ordersTable').DataTable({"lengthChange": false, "bFilter": true,"oLanguage": {
   "sSearch": "Buscar asociado"
 }});
	});
</script>


@endsection