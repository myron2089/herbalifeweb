
@extends('layouts.public_app')

@section('title')
<section id="page-title">
	<div class="container clearfix">
		<h1>Crear Pedidos</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Inicio</a></li>
			<li class="breadcrumb-item"><a href="#">Distribuidor</a></li>
			<li class="breadcrumb-item active" aria-current="page">Crear pedido</li>
		</ol>
	</div>

</section>
@endsection


@section('content')
<!--begin:: container clearfix-->
<div class="container clearfix">

	<div class="row clearfix">

		<div class="col-md-12">
			<form id="form-order" method="POST" action="{{url('distribuidor/pedidos')}}" class="kt-form" style="width: 100%;" role="form">
					@csrf
				<input type="hidden" name="distributorId" id="distributorId" value="{{$distributorId}}">
				<div class="form-group row">
					<div class="col-lg-6">
						<label>@lang('base.purchase_product_select')</label>
						<select class="form-control select-1" id="productId" name="productId">
							<option value="">@lang('base.select_an_option')</option>
							@foreach($products as $product)
							<option value="{{$product->id}}">{{$product->productName}} ({{$product->productMeasure}} {{$product->unityName}}) </option>
							@endforeach
						</select>
						
					</div>
			
				</div>



				<table class="table table-bordered table-striped mt-4" id="ordersTable">
					<thead>
						<tr>
							<th>Código</th>
							<th>Cantidad</th>
							<th>Producto</th>
							<th>Precio</th>
							<th>Subtotal</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					<tfoot>
						<tr><td colspan="6"><label>Total </label><input type="text" class="" name="orderTotal" id="orderTotal" readonly style="float: right; text-align: right;"></td></tr>
					</tfoot>
				</table>

				<div class="col-lg-12  kt-align-right">
					<button type="submit" class="btn btn-primary">@lang('base.btn_save_order')</button>
					<a href="{{url('distribuidor/pedidos')}}" class="btn btn-secondary">@lang('base.return_to_orders')</a>
				</div>
			</form>

		</div>
		<!--end:: col-md-12 -->
	</div>
	<!-- end:: row clearfix -->
</div>
<!--end:: container clearfix -->
@endsection


@section('scripts')


<script>
jQuery(document).ready(function($){
 	$('#ordersTable').DataTable({"lengthChange": false, "bFilter": false,"oLanguage": {
	   "sSearch": "Buscar pedido"
	 },

	 "footerCallback": function (row, data, start, end, display) {                
			                //Get data here 
			                //console.log(data);
			                //Do whatever you want. Example:
			                var totalAmount = 0;
			                for (var i = 0; i < data.length; i++) {
			                    totalAmount += parseFloat(data[i][4]);
			                }
			                //console.log(totalAmount);
			                $("#orderTotal").val(totalAmount);
       						}
	});

	// Multiple Select
	$(".select-1").select2({
		placeholder: "Select Multiple Values"
	});
});


</script>


<!-- Add product to list -->
<script type="text/javascript">
jQuery(document).ready(function($){
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
		
		const url = "{{url('administrar/productos/getproductbyidwprice/')}}/" + id;
		Swal.queue([{
		  title: "@lang('base.add_product')",
		  text: "@lang('base.please_wait')",
		  html:
		    '<form>'+
		    '<input id="productQuantity" class="swal2-input onlyInt" onkeypress="intValidate(event, 1)" maxlength="5"  placeholder="@lang('base.product_quantity')" autofocus required>' +
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


			      	var table = $('#ordersTable').DataTable();
	 				var subTotal = $('#productQuantity').val() *  data.productData[0].balancedPrice;
					table.row.add([
					        data.productData[0].productHerbaLifeCode,
					        $('#productQuantity').val(),
					        data.productData[0].productName,
					        data.productData[0].balancedPrice,
					        subTotal,
					        '<button type="button" class="button button-mini btn-outline-brand remove-product"><i class="flaticon2-trash"></i>@lang('base.delete')</button>'
					    ]).draw();

					/*var sumTotal = table.column( 4 ).data().sum();
					console.log(sumTotal);
					*/
					$("#productId").val('').trigger('change');
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
});
	
</script>

<!--remove product from table -->
<script type="text/javascript">
jQuery(document).ready(function($){
	var table = $('#ordersTable').DataTable();
	$('#ordersTable tbody').on( 'click', 'button.remove-product', function () {
	    table
	        .row( $(this).parents('tr') )
	        .remove()
	        .draw();
	} );
});

</script>
<!-- create purchase -->

<script type="text/javascript">
jQuery(document).ready(function($){
	$( "#form-order" ).submit(function( event ) {
		event.preventDefault();
		
		var form = $(this);
		var distributorId = $('#distributorId').val();
		
		var table = $('#ordersTable').DataTable();
		var products = table.column( 0 ).data().toArray();

		var array = [];
	    
	    if ( ! table.data().count() ) {
		   	Swal.fire(
					  '',
					  "No se han agregado productos a la lista!",
					  'warning'
					);
		   	return;
		}


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
		    data: {products: array, distributorId: distributorId } ,
		    beforeSend: function(){
		    	Swal.fire({ title: "Registrando.." });
  				swal.showLoading();
		    },
		    success:function(data)
		    {
		    	
			    
		    }
		}).done(function(data){

			swal.close();
			if(data.status=='success'){
		    	Swal.fire(
				  '',
				  data.message,
				  'success'
				);
				var table = $('#ordersTable').DataTable();
 
				table
				    .clear()
				    .draw();

				$("#purchaseDocumentNumber").val('');
				$("#purchaseDocumentNumber").val('');
				$("#purchaseDocumentNumber").select();
				

		    }
	    	else{
	    		Swal.fire(
				  '',
				  data.message,
				  'warning'
				);
	    	}

			

		});
		

	});

});
</script>

<script type="text/javascript">
function intValidate(evt, type) {
	  var theEvent = evt || window.event;

	  // Handle paste
	  if (theEvent.type === 'paste') {
	      key = event.clipboardData.getData('text/plain');
	  } else {
	  // Handle key press
	      var key = theEvent.keyCode || theEvent.which;
	      key = String.fromCharCode(key);
	  }
	  
	  var regex = null;
	  
	  if(type == 1){
		  regex = /[0-9]/;
	  }
	  else{
		  regex = /[0-9]|\./;
	  }
	  
	  if( !regex.test(key) ) {
	    theEvent.returnValue = false;
	    if(theEvent.preventDefault) theEvent.preventDefault();
	  }
}
</script>
@endsection