
@extends('layouts.public_app')

@section('title')
<section id="page-title">
	<div class="container clearfix">
		<h1>Detalle Compra</h1>
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


			<div class="row clearfix">

				<div class="col-lg-12">
					<div class="card events-meta">
						<div class="card-body">
							<ul class="portfolio-meta nobottommargin">
								@foreach($saleData as $data)
								<li><span><i class="icon-files"></i>No. Documento</span> {{$data->noDoc}}</li>
								<li><span><i class="icon-calendar3"></i>Fecha</span> {{$data->fechaDoc}}</li>
								<li><span><i class="icon-user"></i>Cliente</span> {{Auth::user()->userFirstName}} {{Auth::user()->userLastName}}</li>								
								<li><span><i class="icon-list-ol1"></i>Estado de pedido:</span> <a href="#">{{$data->statusName}}</a></li>
								<li><span><i class="icon-dollar"></i>Total</span> Q {{$data->saleTotal}}</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="clear mt-4"></div>
					<table class="table table-bordered table-striped mt-4" id="ordersTable">
						<thead>
							<tr>
								<th>Cantidad</th>
								<th>Codigo producto</th>
								<th>Producto</th>
								<th>Precio</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							@foreach($saleDetails as $order)
							<tr>
								<td>
									<code>{{$order->productQuantity}}</code>
								</td>
								<td>{{$order->productHerbaLifeCode}}</td>
								<td>{{$order->productName}}</td>
								<td>{{$order->productPrice}}</td>
								<td>{{$order->subTotal}}</td>
								
								
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>
				<div class="col-md-12 pt-4">
					<a href="{{url('distribuidor/compras')}}" class="btn btn-secondary">@lang('base.return_to_orders')</a>
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
   "sSearch": "Buscar producto"
 }});
	});
</script>


@endsection