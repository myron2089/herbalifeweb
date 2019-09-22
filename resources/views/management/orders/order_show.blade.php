
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
						@lang('base.detail_order')
						
					</h3>
				</div>
				
			</div>
			<div class="kt-portlet__body">

				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<!--begin:: form-->
						<form id="form-purchase" method="POST" action="{{url('administracion/ingresos')}}" class="kt-form" style="width: 100%;" role="form">
							@csrf
							<input type="hidden" name="userType" id="userType" value="2">
							<div class="kt-portlet__body">
								<!--begin:: invoice -->
								<div class="kt-invoice-1">
									@php
										$odrId =0;
									@endphp
								@foreach($order as $data)
								@php
								$odrId =$data->id;
								@endphp
								<div class="kt-invoice__head" style="background-image: url('{{url('admin/images/background/450.jpg')}}');">
									<div class="kt-invoice__container">
										<div class="kt-invoice__brand">
											<h1 class="kt-invoice__title">@lang('base.order')</h1>
											
										</div>
										<div class="kt-invoice__items">
											<div class="kt-invoice__item">
												<span class="kt-invoice__subtitle">@lang('base.purchase_document_date')</span>
												<span class="kt-invoice__text">{{$data->fechaDoc}}</span>
											</div>
											<div class="kt-invoice__item">
												<span class="kt-invoice__subtitle">@lang('base.purchase_document_number')</span>
												<span class="kt-invoice__text">{{$data->noDoc}}</span>
											</div>
											<div class="kt-invoice__item">
												<span class="kt-invoice__subtitle">@lang('base.orders_distributor_name')</span>
												<span class="kt-invoice__text">{{$data->userFirstName}} {{$data->userLastName}}</span>
												<span class="kt-invoice__text">{{$data->userHerbaLifeCode}}</span>
											</div>
										</div>
									</div>
								</div>

								
								

								@endforeach
								<div class="kt-invoice__body">
								
									<!-- products table -->
									<div class="col-lg-12">


										<!--begin: Datatable -->
										<table class="datatable" id="productsTable" width="100%">
											<thead>
												<tr>
													<th title="Field #1">@lang('base.herbalife_code')</th>
													<th title="Field #2">@lang('base.product_quantity')</th>
													<th title="Field #3">@lang('base.product_name')</th>
													<th title="Field #4">@lang('base.order_detail_price')</th>
													<th title="Field #5">@lang('base.product_subtotal')</th>
												</tr>
											</thead>
											<tbody>
												@foreach($details as $detail)
													<tr>
														<td>{{$detail->productHerbaLifeCode}}</td>
														<td>{{$detail->detailQuantity}}</td>
														<td>{{$detail->productName}}</td>
														<td>{{$detail->detailPrice}}</td>
														<td>{{$detail->subTotal}}</td>
														
													</tr>
												@endforeach
											</tbody>
										</table>
										<!-- end:: table-->
									</div>
							
								</div>
								<!--end:: invoice__body-->
								<!--begin:: invoice__footer-->
								<div class="kt-invoice__footer">
									<div class="kt-invoice__container  kt-align-right" style="text-align:  right;">
										<div class="kt-invoice__bank">
											<!--<div class="kt-invoice__title">BANK TRANSFER</div>
											<div class="kt-invoice__item">
												<span class="kt-invoice__label">Account Name:</span>
												<span class="kt-invoice__value">Barclays UK</span>
											</div>
											<div class="kt-invoice__item">
												<span class="kt-invoice__label">Account Number:</span>
												<span class="kt-invoice__value">1234567890934</span>
											</div>
											<div class="kt-invoice__item">
												<span class="kt-invoice__label">Code:</span>
												<span class="kt-invoice__value">BARC0032UK</span>
											</div>-->
										</div> 
										<div class="kt-invoice__total kt-align-right">
											<span class="kt-invoice__title">TOTAL</span>
											<span class="kt-invoice__price">Q {{$orderTotal}}</span>
											<span class="kt-invoice__notice"><!-- --></span>
										</div>
									</div>
								</div>
								<!--end:: invoice__footer-->
								

							</div>
							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-12  kt-align-right">
											
											<a href="{{url('administracion/pedidos')}}" class="btn btn-secondary">@lang('base.btn_return')</a>

											<a href="#" onclick="event.preventDefault(); document.getElementById('frm-sell-1').submit();"  class="btn btn-sm btn-outline-brand"><i class="fa fa-arrow-right"></i> @lang('base.sell')</a>

											
										</div>
										
									</div>
								</div>
							</div>
						</form>
						<form id="frm-sell-1" action="{{url('administracion/ventas')}}" method="POST" style="display: none;">
						    @csrf
						    <input type="hidden" name="orderId" id="orderId" value="{{$odrId}}">
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

@section('css')
<link href="{{ asset('admin/assets/css/demo1/pages/invoices/invoice-1.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')

<script src="{{ URL::asset('js/custom.functions.js') }}" type="text/javascript"></script>
<script>
	 $('#productsTable').DataTable({"lengthChange": false, "bFilter": false, "paging": false,});


</script>
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


<!-- Add product to list -->
<script type="text/javascript">

	$('#productId').change(function(e){

		/*let timerInterval
		Swal.fire({
		  title: "@lang('base.adding_product')",
		  html: "@lang('base.please_wait')",
		  onBeforeOpen: () => {
		    Swal.showLoading()
		   
		  }
		})*/
		var id =  $(this).val();
		
		const url = "{{url('administrar/productos/getproductbyid/')}}/" + id;
		Swal.queue([{
		  title: "@lang('base.add_product')",
		  text: "@lang('base.please_wait')",
		  html:
		    '<input id="productQuantity" class="swal2-input"  placeholder="@lang('base.product_quantity')" autofocus>' +
		    '<input id="productCost" class="swal2-input"  placeholder="@lang('base.product_costo')">' +
		    '<input id="productPrice" class="swal2-input" placeholder="@lang('base.product_price')">',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: "@lang('base.cancel')",
		  confirmButtonText: "@lang('base.add_product')",
		  showLoaderOnConfirm: true,
		  showConfirmButton: true,
		   onBeforeOpen: () => {
		   $('#productQuantity').focus();
		  },
		  preConfirm: () => {
		  
		   Swal.showLoading();

		    return fetch(url)
		      .then(response => response.json())
		      .then(data =>{ 
		      	console.log(data.productData[0].productHerbaLifeCode);
		      	Swal.insertQueueStep(data.message); 
		      	$("#"+id).text(data.message);


		      	var table = $('#productsTable').DataTable();
 				var subTotal = $('#productQuantity').val() * $('#productCost').val();
				table.row.add([
				        data.productData[0].productHerbaLifeCode,
				        $('#productQuantity').val(),
				        data.productData[0].productName,
				        $('#productCost').val(),
				        $('#productPrice').val(),
				        subTotal,
				        '<button type="button" class="btn btn-sm btn-outline-brand remove-product"><i class="flaticon2-trash"></i>@lang('base.delete')</button>'
				    ]).draw();


		      	/*$('#productsTable > tbody:first').append('<tr><td>'+data.productData[0].productHerbaLifeCode+'</td>' +
		      		                                   '<td>'+$('#productQuantity').val()+'</td>'+
		      		                                   '<td>'+data.productData[0].productName+'</td>'+
		      		                                   '<td>'+$('#productCost').val()+'</td>'+
		      		                                   '<td>'+$('#productPrice').val()+'</td>'+
		      		                                   '<td> <button onclick="changeStatus()" class="btn btn-sm btn-outline-brand"><i class="flaticon-refresh"></i>@lang('base.change_status')</button></td>' +
		      		                                   '</tr>');*/

		      })
		      
		      /*.then(data => console.log(data.newStatusName))*/
		      .catch(() => {
		        Swal.insertQueueStep({
		          type: 'error',
		          title: "@lang('base.an_error_as_ocurred')",
		        })                                              
		      })
		  }
		}])
	});
	
</script>

<!--remove product from table -->
<script type="text/javascript">
	var table = $('#productsTable').DataTable();
	$('#productsTable tbody').on( 'click', 'button.remove-product', function () {
	    table
	        .row( $(this).parents('tr') )
	        .remove()
	        .draw();
	} );

</script>



<script type="text/javascript">

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


<!-- create purchase -->

<script type="text/javascript">
	$( "#form-purchase" ).submit(function( event ) {
		event.preventDefault();
		
		var form = $(this);
		var purchaseDocumentNumber = $('#purchaseDocumentNumber').val();
		var purchaseDocumentDate = $('#purchaseDocumentDate').val();
		var supplierId = $('#supplierId').val();


		//var formData = new FormData($(this)[0]);
		//var formData = form.serialize();
		/* array from table */
		var table = $('#productsTable').DataTable();
		var products = table.column( 0 ).data().toArray();

		var array = [];
	    


		table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
			var i=0;
		    var datar = this.data();
		    var temp = {
			    Id: "",
			    Quantity: "",
			    Name: "",
			    Cost: "",
			    Price: "",
			   };
		    for (var f in temp){
		        temp[f] = datar[i++];

		    }

		    array.push(temp);   
		   


		    // ... do something with data(), or row.node(), etc
		} );


		/* ajax call */
		
		$.ajax({
		    url:form.attr( "action" ),
		    method:"POST",
		    dataType: 'json',
		    data: {products: array, supplierId: supplierId, purchaseDocumentNumber: purchaseDocumentNumber, purchaseDocumentDate: purchaseDocumentDate  } ,
		    
		    success:function(data)
		    {
		    	
			    if(data.status=='success'){
			    	Swal.fire(
					  '',
					  data.message,
					  'success'
					);
		    	}
		    	else{
		    		Swal.fire(
					  '',
					  data.message,
					  'warning'
					);
		    	}
		    }
		});
		

	});


</script>
@endsection