
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
						@lang('base.purchases_management')
						<small>@lang('base.purchases_management_description')</small>
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions">
							
							&nbsp;
							
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<div class="col-xl-8 order-2 order-xl-1">
							<div class="row align-items-center">
								<div class="col-md-8 kt-margin-b-20-tablet-and-mobile">
									<div class="kt-input-icon kt-input-icon--left">
										<input type="text" class="form-control" placeholder="@lang('base.search')..." id="generalSearch">
										<span class="kt-input-icon__icon kt-input-icon__icon--left">
											<span><i class="la la-search"></i></span>
										</span>
									</div>
								</div>
								<!--<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
									<div class="kt-form__group kt-form__group--inline">
										<div class="kt-form__label">
											<label>Status:</label>
										</div>
										<div class="kt-form__control">
											<select class="form-control bootstrap-select" id="kt_form_status">
												<option value="">All</option>
												<option value="Activo">Activo</option>
												<option value="2">Delivered</option>
												<option value="3">Canceled</option>
												<option value="4">Success</option>
												<option value="5">Info</option>
												<option value="6">Danger</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
									<div class="kt-form__group kt-form__group--inline">
										<div class="kt-form__label">
											<label>Type:</label>
										</div>
										<div class="kt-form__control">
											<select class="form-control bootstrap-select" id="kt_form_type">
												<option value="">All</option>
												<option value="1">Online</option>
												<option value="2">Retail</option>
												<option value="3">Direct</option>
											</select>
										</div>
									</div>
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

				<!--begin: Datatable -->
				<table class="kt-datatable" id="html_table" width="100%">
					<thead>
						<tr>
							<th title="Field #1">@lang('base.purchase_date')</th>
							
							<th title="Field #3">@lang('base.document_number')</th>
							<th title="Field #3">@lang('base.purchases_supplier_name')</th>
							<th title="Field #4">@lang('base.purchase_total')</th>
							
							<th title="Field #7">@lang('base.details')</th>
						</tr>
					</thead>
					<tbody>
						@foreach($purchases as $purchase)
						<tr>
							<td>{{$purchase->purchaseDocumentDate}}</td>
							<td>{{$purchase->noDoc}}</td>
							<td>{{$purchase->supplierName}}</td>
							<td class="kt-align-right">{{$purchase->purchaseTotal}}</td>
							
							<td>
								<a href="{{url('administracion/ingresos')}}/{{$purchase->id}}"  class="btn btn-sm btn-outline-brand"><i class="fa flaticon-eye"></i> @lang('base.purchase_show_detail')</a>
								
									
								
							
							</td>
							
						</tr>
						@endforeach
						
					</tbody>
				</table>
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