
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
						Productos más vendidos
						<small>Informe de productos mas vendidos</small>
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
								<div class="col-md-8 kt-margin-b-20-tablet-and-mobile">
									<form method="GET" action="{{url('reportes/productos/masvendidos')}}">
										<label>Seleccione la cantidad de productos que desea ver</label>
										<select class="form-control" name="cant"  id="cant">
											<option value="2">2</option>
											<option value="5">5</option>
											<option value="10">10</option>
											<option value="15">15</option>
										</select>

										<button type="submit" class="btn btn-default mt-2">Realizar consulta</button>
									</form>
										
									
								</div>
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
				<div class="row">
				 	<div class="col-md-12">
						<div id="piechart_3d" style="width: 900px; height: 500px; float: left"></div>
					</div>
					<div class="col-md-12">
						<div id="donutchart" style="width: 900px; height: 500px; float: left;"></div>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Producto', 'Cantidad vendida'],
          @foreach($bestcant as $product)
          ['{{$product->productName}}',    {{$product->totalcantidad}}],
          @endforeach
        ]);

       

        var options = {
          title: 'Productos mas vendidos',
          is3D: true,
        };

        

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);

        
      }
</script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['Producto', 'Cantidad vendida'],
          @foreach($mostmoney as $product)
          ['{{$product->productName}}',    {{$product->totalventas}}],
          @endforeach
        ]);

        var options = {
          title: 'Productos con mayor venta',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
@endsection