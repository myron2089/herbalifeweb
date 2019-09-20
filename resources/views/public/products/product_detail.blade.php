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

		<div class="single-product">

			<div class="product">
				@foreach($productdata as $product)
				<div class="col_two_fifth">

									<!-- Product Single - Gallery
										============================================= -->
										<div class="product-image">
											<div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
												<div class="flexslider">
													<div class="slider-wrap" data-lightbox="gallery">
														<div class="slide" data-thumb="{{url('admin/images/products/')}}/{{$product->pictureName}}"><a href="{{url('admin/images/products/')}}/{{$product->pictureName}}" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{url('admin/images/products/')}}/{{$product->pictureName}}" alt="{{$product->productName}}"></a></div>
													</div>
												</div>
											</div>
											
										</div><!-- Product Single - Gallery End -->

									</div>

									<div class="col_two_fifth product-desc">

									<!-- Product Single - Price
										============================================= -->
										<div class="product-price"> <ins>{{$product->productName}} </ins><br><small>{{$product->productMeasure}} {{$product->unityName}}(s)</small></div><!-- Product Single - Price End -->

									<!-- Product Single - Rating
										============================================= -->
										

										<div class="clear"></div>
										<div class="line"></div>

									<!-- Product Single - Quantity & Cart Button
										============================================= -->
										<form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
											
											
											@if(!Auth::check())<a href="{{url('login')}}" class="add-to-cart button nomargin"><i class="icon-shopping-cart"></i><span> Comprar</span></a>@endif
										</form><!-- Product Single - Quantity & Cart Button End -->

										<div class="clear"></div>
										<div class="line"></div>

									<!-- Product Single - Short Description
										============================================= -->
										<p>{!! $product->productBenefits!!} </p>
										
									<!-- Product Single - Meta
										============================================= -->
										<div class="card product-meta">
											<div class="card-body">
												<span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">{{$product->productHerbaLifeCode}} </span></span>
												<span class="posted_in">Categoría: <a href="{{url('productos')}}/{{$product->categoryName}}" rel="tag">{{$product->categoryName}} </a>.</span>
												
											</div>
										</div><!-- Product Single - Meta End -->

									<!-- Product Single - Share
										============================================= -->
										

									</div>

								
									
									@endforeach
								</div>

							</div>

						</div>

						@endsection