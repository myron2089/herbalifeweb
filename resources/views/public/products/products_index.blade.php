@extends('layouts.public_app')

@section('title')
<section id="page-title">
	<div class="container clearfix">
		<h1>Productos</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{url('inicio')}}">Inicio</a></li>
			<li class="breadcrumb-item"><a href="#">Productos</a></li>
			
		</ol>
	</div>

</section>
@endsection

@section('content')
<div class="container clearfix">

	


		<!-- Shop
		============================================= -->
		<div id="shop" class="shop grid-container clearfix" data-layout="fitRows">
			@foreach($products as $product)
			<div class="product clearfix">
				<div class="product-image">
					<a href="#"><img src="{{url('admin/images/products/')}}/{{$product->pictureName}}" alt="Checked Short Dress"></a>
					
					<!--<div class="sale-flash">50% Off*</div>-->
					<div class="product-overlay">
						@if(!Auth::check())<a href="{{url('login')}}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Comprar</span></a>@endif
						<a href="{{url('producto')}}/{{$product->id}}" class="item-quick-views" data-lightbox="asjax"><i class="icon-zoom-in2"></i><span> Ver detalles</span></a>
					</div>
				</div>
				<div class="product-desc">
					<div class="product-title"><h3><a href="#">{{$product->productName}} <br><small>{{$product->productMeasure}} {{$product->unityName}}(s)</small></a></h3></div>
					<!--<div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
					<div class="product-rating">
						<i class="icon-star3"></i>
						<i class="icon-star3"></i>
						<i class="icon-star3"></i>
						<i class="icon-star3"></i>
						<i class="icon-star-half-full"></i>
					</div>-->
				</div>
			</div>
			@endforeach
		</div>
	
</div>

@endsection