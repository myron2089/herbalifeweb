
@extends('layouts.public_app')

@section('title')
<section id="page-title">
	<div class="container clearfix">
		<h1>Mis Compras</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Inicio</a></li>
			<li class="breadcrumb-item"><a href="#">Distribuidor</a></li>
			<li class="breadcrumb-item active" aria-current="page">Compras</li>
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
					<a href="{{url('distribuidor/pedidos/crear')}}" class="button button-mini button-rounded  button-green fright"><i class="fa fa-plus-circle"></i>@lang('base.new_order')</a>

					<table class="table table-bordered table-striped mt-4" id="ordersTable">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>No. Documento</th>
								<th>Total</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($sales as $sale)
							<tr>
								<td>{{$sale->fechaDoc}}</td>
								<td>
									<code>{{$sale->noDoc}}</code>
								</td>
								<td>{{$sale->saleTotal}}</td>
								<td>{{$sale->statusName}}</td>
								<td><a href="{{url('distribuidor/compras/')}}/{{$sale->noDoc}}" class="button button-mini button-rounded  button-green fright"><i class="fa fa-eye"></i>@lang('base.purchase_show_detail')</a></td>
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
   "sSearch": "Buscar compra"
 }});
	});
</script>


@endsection