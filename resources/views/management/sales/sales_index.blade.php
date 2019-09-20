
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
						@lang('base.sales_management')
						<small>@lang('base.sales_management_description')</small>
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<div class="col-xl-8 order-2 order-xl-1">
							<div class="row align-items-center">
								<div class="col-md-12">
									<form method="GET" action="{{url('administracion/ventas')}}">
								 		<label class="col-form-label col-lg-3 col-sm-12">Seleccione rango de fechas</label>
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="input-daterange input-group" id="kt_datepicker_5">
												<input type="text" class="form-control" name="start" autocomplete="off"/>
												<div class="input-group-append">
													<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
												</div>
												<input type="text" class="form-control" name="end" autocomplete="off"/>

												<button type="submit" class="btn btn-default kt-right mk-2">Buscar</button>
											</div>


											
										</div>


									</form>


										
								 </div>

								<!--<div class="col-md-8 kt-margin-b-20-tablet-and-mobile mt-4">
									<div class="kt-input-icon kt-input-icon--left">
										<input type="text" class="form-control" placeholder="@lang('base.search')..." id="generalSearch">
										<span class="kt-input-icon__icon kt-input-icon__icon--left">
											<span><i class="la la-search"></i></span>
										</span>
									</div>
								</div>-->
						</div>
						<div class="col-xl-4 order-1 order-xl-2 kt-align-right">
							<a href="#" class="btn btn-default kt-hidden">
								<i class="la la-cart-plus"></i> New Order
							</a>
							<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
						</div>
					</div>
				</div>

				<!--end: Search Form -->
			</div>
			<div class="kt-portlet__body kt-portlet__body--fit">
				 @if (\Session::has('status'))
					<div class="alert alert-success" role="alert">
						{{ \Session::get('message') }}  
					</div>
						@if(Session::get('exception') == 1)
						<div class="alert alert-warning" role="alert">
							{{ \Session::get('exmessage') }}
								
						</div>		
						@endif		 	
				 </div>
				 @endif



				<!--begin: Datatable -->
				<table class="kt-datatable" id="html_table" width="100%">
					<thead>
						<tr>
							<th title="Field #1">@lang('base.purchase_date')</th>
							<th title="Field #2">@lang('base.document_number')</th>
							<th title="Field #3">Distribuidor</th>
							<th title="Field #4">Total</th>
							<th title="Field #4">Estado</th>
							<th title="Field #5">@lang('base.details')</th>
						</tr>
					</thead>
					<tbody>
						@php

							$salesTotal = 0;

						@endphp
						@foreach($sales as $sale)
						<tr>
							<td>{{$sale->fechaDoc}}</td>
							<td>{{$sale->noDoc}}</td>
							<td>{{$sale->userFirstName}} {{$sale->userLastName}}<br> <code>{{$sale->userHerbaLifeCode}}</code></td>
							<td class="kt-align-right">{{$sale->saleTotal}}</td>
							<td class="kt-align-right">{{$sale->statusName}}</td>
							
							<td>
								<a href="{{url('administracion/ventas')}}/{{$sale->noDoc}}"  class="btn btn-sm btn-outline-brand"><i class="fa flaticon-eye"></i> @lang('base.purchase_show_detail')</a>
								
								@if($sale->status_id <> 7)					
									<a href="#" onclick="event.preventDefault(); document.getElementById('frm-sell').submit();"  class="btn btn-sm btn-outline-brand"><i class="fa fa-arrow-right"></i> @lang('base.check_as_send')</a>
								@endif

								<form id="frm-sell" action="{{url('administracion/ventas')}}" method="POST" style="display: none;">
								    @csrf
								    <input type="hiiden" name="orderId" id="orderId" value="{{$sale->id}}">
								</form>

							</td>
							
						</tr>
							@php
								$salesTotal = $salesTotal + $sale->saleTotal;
							@endphp
						@endforeach
						
					</tbody>
				</table>


				<div class="kt-invoice__footer kt-total-index">
					<div class="kt-invoice__container  kt-align-right" style="text-align:  right;">
						<div class="kt-invoice__bank">
						</div> 
						<div class="kt-invoice__total kt-align-right">
							<span class="kt-invoice__title">TOTAL</span>
							<span class="kt-invoice__price">Q {{$salesTotal}}</span>
							<span class="kt-invoice__notice"><!-- --></span>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- end:: Container-->
</div>
<!-- end:: Content-->
@endsection

@section('css')
<link href="{{ asset('admin/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
<script src="{{ URL::asset('admin/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/bootstrap-switch.init.js') }}" type="text/javascript"></script>
<script>


	function changeStatus(id){	
		const url = "{{url('administrar/distribuidores/status')}}/"+id;
		

		Swal.queue([{
		  title: "@lang('base.are_you_sure_disable_prodcut')",
		  text: "@lang('base.are_you_sure_disable_prodcut_description')",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: "@lang('base.cancel')",
		  confirmButtonText: "@lang('base.yes_disable')",
		  showLoaderOnConfirm: true,
		  preConfirm: () => {
		    return fetch(url)
		      .then(response => response.json())
		      .then(data =>{ Swal.insertQueueStep(data.message); $("#"+id).text(data.newStatusName)})
		      
		      /*.then(data => console.log(data.newStatusName))*/
		      .catch(() => {
		        Swal.insertQueueStep({
		          type: 'error',
		          title: "@lang('base.an_error_as_ocurred')",
		        })
		      })
		  }
		}])
		
	}

</script>
@endsection