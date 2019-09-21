
@extends('layouts.public_app')

@section('content')
	<!--begin:: container clearfix-->
	<div class="container clearfix">

		<div class="row clearfix">

			<div class="col-md-9">

				<img src="{{url('public/images/icons/avatar.jpg')}}" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">

				<div class="heading-block noborder">
					<h3>{{Auth::user()->userFirstName}} {{Auth::user()->userLastName}}</h3>
					<span>{{Auth::user()->userHerbaLifeCode}} </span>
				</div>

				<div class="clear"></div>

				<div class="row clearfix">

					<div class="col-lg-12">

						<div class="tabs tabs-alt clearfix" id="tabs-profile">

							<ul class="tab-nav clearfix">
								<li><a href="#tab-feeds"><i class="icon-rss2"></i>Últimas Compras</a></li>
								<li><a href="#tab-posts"><i class="icon-pencil2"></i>Últimos Pedidos</a></li>
							</ul>

							<div class="tab-container">

								<div class="tab-content clearfix" id="tab-feeds">

									
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
								<div class="tab-content clearfix" id="tab-posts">

									<div class="row topmargin-sm clearfix">
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
												@foreach($orders as $order)
												<tr>
													<td>{{$order->fechaDoc}}</td>
													<td>
														<code>{{$order->noDoc}}</code>
													</td>
													<td>{{$order->orderTotal}}</td>
													<td>{{$order->statusName}}</td>
													<td><a href="{{url('distribuidor/pedidos/')}}/{{$order->noDoc}}" class="button button-mini button-rounded  button-green fright"><i class="fa fa-eye"></i>@lang('base.purchase_show_detail')</a></td>
												</tr>
												@endforeach
											</tbody>
										</table>

										

										

									</div>

								</div>
							
								

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="w-100 line d-block d-md-none"></div>

			<div class="col-md-3 clearfix">

				<div class="list-group">
					<!--<a href="{{url('distribuidor/perfil')}}" class="list-group-item list-group-item-action clearfix">@lang('base.my_profile') <i class="icon-user float-right"></i></a>-->
					<a href="{{url('distribuidor/pedidos')}}" class="list-group-item list-group-item-action clearfix">@lang('base.orders') <i class="fa fa-boxes  float-right"></i></a>
					<a href="{{url('distribuidor/compras')}}" class="list-group-item list-group-item-action clearfix">@lang('base.purchases')  <i class="fa fa-clipboard-check float-right"></i></a>
					<a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="list-group-item list-group-item-action clearfix">@lang('base.btn_sign_out') <i class="icon-line2-logout float-right"></i></a>
					<a href="{{url('distribuidor/asociados')}}" class="list-group-item list-group-item-action clearfix">Mis asociados <i class="icon-users1 float-right"></i></a>

					<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
					    {{ csrf_field() }}
					</form>
				</div>

				

			</div>

		</div>

	</div>
	<!--end::container clearfix-->

@endsection