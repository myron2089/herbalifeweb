@extends('layouts.public_app')

@section('slider')
<section id="slider" class="slider-element slider-parallax revslider-wrap ohidden clearfix">

	<!--
	#################################
		- THEMEPUNCH BANNER -
	#################################
-->
<div id="rev_slider_ishop_wrapper" class="rev_slider_wrapper fullwidth-container" data-alias="default-slider" style="padding:0px;">
	<!-- START REVOLUTION SLIDER 5.1.4 fullwidth mode -->
	<div id="rev_slider_ishop" class="rev_slider fullwidthbanner" style="display:none;" data-version="5.1.4">
		<ul>    <!-- SLIDE  -->
			<li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="5000" data-saveperformance="off" data-title="Latest Collections" style="background-color: #F6F6F6;">
				<!-- LAYERS -->

				<!-- LAYER NR. 2 -->
				<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
				data-x="100"
				data-y="50"
				data-transform_in="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="400"
				data-start="1000"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=""><img src="{{url('public/images/banner/banner_1.png')}}" alt="Girl"></div>

				<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
				data-x="570"
				data-y="75"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1000"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; display: none;">Get your Shopping Bags Ready</div>

				<div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
				data-x="570"
				data-y="105"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1200"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; max-width: 430px; line-height: 1.15;  text-transform: uppercase;">@lang('base.start_your') <br> @lang('base.business_now')</div>

				<div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
				data-x="570"
				data-y="275"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1400"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;  text-transform: uppercase;">@lang('base.build_your_future')</div>

				<div class="tp-caption ltl tp-resizeme"
				data-x="570"
				data-y="375"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1550"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=""><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>@lang('base.meet_here')</span> <i class="icon-angle-right"></i></a></div>

			</li>
			<!-- SLIDE  -->
			<li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="5000"  data-saveperformance="off"  data-title="Messenger bags" style="background-color: #E9E8E3;">
				<!-- LAYERS -->

				<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
				data-x="630"
				data-y="78"
				data-transform_in="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:400;e:Power4.easeOutQuad;"
				data-speed="400"
				data-start="1000"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=""><img src="{{url('public/images/banner/banner_2.png')}}" alt="Bag"></div>

				<!-- LAYER NR. 2 -->
				<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
				data-x="0"
				data-y="110"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1000"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; display: none;">Buy Stylish Bags at Discounted Prices</div>

				<div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
				data-x="0"
				data-y="140"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1200"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; line-height: 1.15;">@lang('base.distributors')</div>

				<div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
				data-x="0"
				data-y="240"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1400"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;">@lang('base.order_your_products')</div>

				<div class="tp-caption ltl tp-resizeme"
				data-x="0"
				data-y="340"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1550"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=""><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>@lang('base.login_here')</span> <i class="icon-angle-right"></i></a></div>

				<div class="tp-caption utb tp-resizeme revo-slider-caps-text uppercase"
				data-x="510"
				data-y="0"
				data-transform_in="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="600"
				data-start="2100"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style="display: none;"><img src="" alt="Bag"></div>

			</li>

			<!-- SLIDE 3  -->
			<li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="5000"  data-saveperformance="off"  data-title="Messenger bags" style="background-color: #E9E8E3;">
				<!-- LAYERS -->

				<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
				data-x="630"
				data-y="78"
				data-transform_in="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;s:400;e:Power4.easeOutQuad;"
				data-speed="400"
				data-start="1000"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=""><img src="{{url('public/images/banner/banner_3.png')}}" alt="Bag"></div>

				<!-- LAYER NR. 2 -->
				<div class="tp-caption ltl tp-resizeme revo-slider-caps-text uppercase"
				data-x="0"
				data-y="110"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1000"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; display: none;">Buy Stylish Bags at Discounted Prices</div>

				<div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
				data-x="0"
				data-y="140"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1200"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; line-height: 1.15;">@lang('base.not_have_an_account')</div>

				<div class="tp-caption ltl tp-resizeme revo-slider-desc-text tleft"
				data-x="0"
				data-y="240"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1400"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;">@lang('base.crete_an_account_and_receibe_benefits')</div>

				<div class="tp-caption ltl tp-resizeme"
				data-x="0"
				data-y="340"
				data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="700"
				data-start="1550"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style=""><a href="#" class="button button-border button-large button-rounded tright nomargin"><span>@lang('base.craate_account_here')</span> <i class="icon-angle-right"></i></a></div>

				<div class="tp-caption utb tp-resizeme revo-slider-caps-text uppercase"
				data-x="510"
				data-y="0"
				data-transform_in="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;s:700;e:Power4.easeOutQuad;"
				data-speed="600"
				data-start="2100"
				data-easing="easeOutQuad"
				data-splitin="none"
				data-splitout="none"
				data-elementdelay="0.01"
				data-endelementdelay="0.1"
				data-endspeed="1000"
				data-endeasing="Power4.easeIn" style="display: none;"><img src="" alt="Bag"></div>

			</li>
		</ul>
	</div>
</div><!-- END REVOLUTION SLIDER -->

</section>
@endsection

@section('content')
<!--begin:: container clearfix-->
<div class="container clearfix">


	<div class="container  clearfix">
		<div class="row contact-properties clearfix" >
			<div class="col-md-4">
				<a href="#" style="background: url('{{url('public/images/boxes/personal_nutrition.jpg')}}') no-repeat center center; background-size: cover;">
					<div class="vertical-middle dark center" style="position: absolute; top: 50%; width: 100%; padding-top: 0px; padding-bottom: 0px; margin-top: -94.5px;">
						<div class="heading-block nomargin noborder">
							<h3 class="capitalize t400 font-secondary">@lang('base.nutrition_products')</h3>
							<span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
								@lang('base.nutrition_products_description')
							</span>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" style="background: url('{{url('public/images/boxes/personal_care.jpg')}}') no-repeat center center; background-size: cover;">
					<div class="vertical-middle dark center" style="position: absolute; top: 50%; width: 100%; padding-top: 0px; padding-bottom: 0px; margin-top: -94.5px;">
						<div class="heading-block nomargin noborder">
							<h3 class="capitalize t400 font-secondary">@lang('base.personal_care_products')</h3>
							<span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
								@lang('base.personal_care_products_description')
							</span>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="#" style="background: url('{{url('public/images/boxes/all_products.jpg')}}') no-repeat center center; background-size: cover;">
					<div class="vertical-middle dark center" style="position: absolute; top: 50%; width: 100%; padding-top: 0px; padding-bottom: 0px; margin-top: -114px;">
						<div class="heading-block nomargin noborder">
							<h3 class="capitalize t400 font-secondary">@lang('base.meet_our_products')</h3>
							<span style="margin-top: 100px; font-size: 17px; font-weight: 500;">
								@lang('base.meet_our_products_description')
							</span>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
<!--end:: container clearfix-->
	<div class="section dark parallax nomargin mt-4" style="margin-top: 40px !important; background-image: url('{{url('public/images/boxes/parallax_1.jpg')}}'); padding: 140px 0;"  data-bottom-top="background-position:0px 50px;" data-top-bottom="background-position:0px -300px;">
		<div class="container center clearfix">
			<div class="row clearfix">
				<div class="col-lg-6">
					<div class="heading-block nobottomborder nobottommargin" style="padding: 20px; background: rgba(69, 194, 48, 0.5); border-radius:0px 15px 0px 15px;">
						<div class="before-heading lowercase ls1" style="color: #FFF; font-style: normal;">@lang('base.want_best_future')</div>
						<h3 class="nott font-secondary t400" style="font-size: 32px;">@lang('base.be_a_distributor_and_get_benefits')</h3>
						<a href="#" class="button button-large button-rounded button-border button-white button-light topmargin-sm noleftmargin">@lang('base.apply_now')</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--begin:: container clearfix-->
<div class="container clearfix">
	<div class="container"  style="display: none;">
		<div class="card border-0 divcenter rounded ytb-card" style="box-shadow: 0 32px 46px 2px rgba(0,0,0,0.12);">
			<div id="ytb-video" class="yt-bg-player card-img-top rounded-top" data-quality="hd1080" data-volume="80" data-autoplay="false" data-video="https://www.youtube.com/watch?v=0iXBX10CbYQ">
				<div class="ytb-poster rounded-top" style="background: url('demos/bike/images/video-poster.jpg') center center / cover; position: absolute; left: 0; top: 0; width: 100%; height: 100%;">
				</div>
				<a href="#" id="ytb-video-button" class="play-icon"><i class="icon-play"></i><i class="icon-pause"></i></a>
				</div>
			<div class="card-body p-5">
				<div class="row justify-content-between align-items-center">
					<div class="col-md-6">
						<div class="heading-block nobottomborder mb-0">
							<small class="text-black-50 uppercase ls3 t600">@lang('base.meet_our_products')</small>
							<h2 class="nott t600 ls0 mb-2">Free Test Drive</h2>
							<p class="mb-1">Energistically syndicate team building synergy after efficient human capital. Assertively underwhelm sticky solutions.</p>
						</div>
					</div>
					<div class="col-md-5 mt-3 mt-md-0">
						<div class="subscribe-widget" data-loader="button">
							<div class="widget-subscribe-form-result"></div>
							<form id="widget-subscribe-form" action="include/subscribe.php" method="post" class="nobottommargin">
								<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control not-dark required email" placeholder="Enter your Email Address..">
								<div class="form-check py-3">
									<input type="checkbox" class="form-check-input" id="subscribe-news">
									<label class="form-check-label nott ls0 t400" for="subscribe-news">Get New Updates &amp; Announcements</label>
								</div>
								<button class="button button-shadow button-rounded nomargin nott ls0 btn-block" type="submit">Subscribe</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<div class="clear"></div>

	

	<div class="clear bottommargin-sm"></div>


	
	

</div>
<!--end:: container clearfix-->


@endsection


@section('scripts')
<script>
		$('#ytb-video').on('click', function(e){
			e.preventDefault();

			if( $(this).hasClass('video-played') ) {
				$('#ytb-video').YTPPause();
			} else {
				$('#ytb-video').YTPPlay();
				$('.ytb-poster').stop(true,true).fadeTo( "slow", 0 );
			}

			$(this).toggleClass('video-played');
		});


		function showcaseSection( element ){

			var otherElements = element.parents('.showcase-section').find('.showcase-feature'),
				elementTarget = jQuery( element.attr('data-target') ),
				otherTargets = element.parents('.showcase-section').find('.showcase-target');

			otherElements.removeClass('showcase-feature-active');
			element.addClass('showcase-feature-active');
			otherTargets.removeClass('showcase-target-active');
			elementTarget.addClass('showcase-target-active');

		}

		jQuery('.showcase-feature').hover( function(){
			showcaseSection( jQuery(this) );
		});

		$(document).ready( function() {

			var pricingBikes = 1,
				days = 1,
				elementbikes = $(".range-slider-bikes"),
				elementDays = $(".range-slider-days");

			elementbikes.ionRangeSlider({
				grid: false,
				step: 1,
				min: 1,
				from:1,
				max: 5,
				postfix: ' Bike(s)',
				onStart: function(data){
					pricingBikes = data.from;
				}
			});

			elementbikes.on( 'change', function(){
				pricingBikes = $(this).prop('value');
				calculatePrice( pricingBikes, days );
			});

			elementDays.ionRangeSlider({
				grid: false,
				step: 1,
				min: 1,
				from: 4,
				max: 30,
				postfix: ' Days',
				onStart: function(data){
					days = data.from;
					console.log(data);
				}
			});

			elementDays.on( 'onStart change', function(){
				days = $(this).prop('value');
				calculatePrice( pricingBikes, days );
			});

			calculatePrice( pricingBikes, days );

			function calculatePrice( bikes, days ) {
				var pricingValue = ( Number(bikes) * 1 ) * ( Number(days) * 2 );
				jQuery('.pricing-price').html( '$'+pricingValue );
			}

		});
	</script>
@endsection