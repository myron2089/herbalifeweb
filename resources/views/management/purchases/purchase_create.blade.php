
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
						@lang('base.new_purchase')
						<small>@lang('base.new_purchase_description')</small>
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



								<div class="form-group row">

									<div class="col-lg-6">
										<label>@lang('base.purchase_document_number')<span>*</span></label>
										<input name="purchaseDocumentNumber" id="purchaseDocumentNumber" type="text" value="11111" maxlength="20" class="form-control" autofocus required>									
									</div>

									<div class="col-lg-6">
										<label>@lang('base.purchase_document_date')<span>*</span></label>
										<input name="purchaseDocumentDate" id="purchaseDocumentDate" value="2019-08-10" type="date"  class="form-control" required>									
									</div>
									

									
									
								</div>

								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.purchases_supplier_name')<span>*</span></label>
										<select class="form-control kt-select2" id="supplierId" name="supplierId" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($suppliers as $supplier)
											<option value="{{$supplier->id}}" selected>{{$supplier->supplierName}}</option>
											@endforeach
										</select>
										
									</div>

									
								</div>

								<div class="alert alert-secondary" role="alert">
									<div class="alert-icon"><i class="flaticon-list kt-font-brand"></i></div>
									<div class="alert-text">
										<h4>@lang('base.purchase_detail')</h4> @lang('base.purchase_detail_description')
									</div>
								</div>
								<hr style="background-color: red">

								<div class="form-group row">
									<div class="col-lg-6">
										<label>@lang('base.purchase_product_select')<span>*</span></label>
										<select class="form-control kt-select2" id="productId" name="productId" required>
											<option value="">@lang('base.select_an_option')</option>
											@foreach($products as $product)
											<option value="{{$product->id}}">{{$product->productName}} ({{$product->productMeasure}} {{$product->unityName}}) </option>
											@endforeach
										</select>
										
									</div>
							
								</div>


								<div class="form-group row">
									<!-- products table -->
									<div class="col-lg-12">


										<!--begin: Datatable -->
										<table class="datatable" id="productsTable" width="100%">
											<thead>
												<tr>
													<th  title="Field #1">@lang('base.herbalife_code')</th>
													<th>@lang('base.product_quantity')</th>
													<th title="Field #2">@lang('base.product_name')</th>
													<th>@lang('base.product_cost')</th>
													<th>@lang('base.product_price')</th>
													<th>@lang('base.product_subtotal')</th>
													<th title="Field #5">@lang('base.actions')</th>
												</tr>
											</thead>
											<tbody>
												
												
											</tbody>
										</table>
										<!-- end:: table-->
									</div>
								</div>

								

							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-12  kt-align-right">
											<button type="submit" class="btn btn-primary">@lang('base.btn_save_purchase')</button>
											<a href="{{url('administracion/ingresos')}}" class="btn btn-secondary">@lang('base.btn_cancel')</a>
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
<script>
	 $('#productsTable').DataTable({"lengthChange": false, "bFilter": false});


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
		    '<form>'+
		    '<input id="productQuantity" class="swal2-input"  placeholder="@lang('base.product_quantity')" autofocus required>' +
		    '<input id="productCost" class="swal2-input"  required placeholder="@lang('base.product_cost')">' +
		    '<input id="productPrice" class="swal2-input" required placeholder="@lang('base.product_price')">'+
		    '</form>',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: "@lang('base.cancel')",
		  confirmButtonText: "@lang('base.add_product')",
		  showLoaderOnConfirm: true,
		  showConfirmButton: true,
		  allowOutsideClick: false,
		   onBeforeOpen: () => {
		   $('#productQuantity').select();
		  },
		  preConfirm: () => {
		   var quantity = $("#productQuantity").val();
		   var cost = $("#productCost").val();
		   var price = $("#productPrice").val();

		   if(quantity.length == 0){
		   	$("#productQuantity").select();
		   	
		   	return false;
		   }

		   else{

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
			      })
			      
			      /*.then(data => console.log(data.newStatusName))*/
			      .catch(() => {
			        Swal.insertQueueStep({
			          type: 'error',
			          title: "@lang('base.an_error_as_ocurred')",
			        })                                              
			      })
		  	}
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