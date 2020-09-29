@extends('layouts.app')


@section('content')





<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid mt-4 mt-4">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                    MulticerPlus </h3>
                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link">
                        Administración </a>

                        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <div class="kt-subheader__wrapper">
                        <a href="#" class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="Select dashboard daterange" data-placement="left">
                            <span class="kt-subheader__btn-daterange-title" id="kt_dashboard_daterangepicker_title">Hoy</span>&nbsp;
                            <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">Aug 16</span>

                            <!--<i class="flaticon2-calendar-1"></i>-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--sm">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24" />
                                    <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" id="check" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" id="Combined-Shape" fill="#000000" />
                                </g>
                            </svg> </a>
                            <!--<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
                                <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000" />
                                        </g>
                                    </svg>

                                    <i class="flaticon2-plus"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                                    
                                    <ul class="kt-nav">
                                        <li class="kt-nav__head">
                                            Add anything or jump to:
                                            <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                        </li>
                                        <li class="kt-nav__separator"></li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-drop"></i>
                                                <span class="kt-nav__link-text">Order</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                                <span class="kt-nav__link-text">Ticket</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-link"></i>
                                                <span class="kt-nav__link-text">Goal</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                                <span class="kt-nav__link-text">Support Case</span>
                                                <span class="kt-nav__link-badge">
                                                    <span class="kt-badge kt-badge--success">5</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__separator"></li>
                                        <li class="kt-nav__foot">
                                            <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                            <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                        </li>
                                    </ul>

                                    
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- end:: Subheader -->

            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

                <div class="kt-portlet">
                    <div class="kt-portlet__body  kt-portlet__body--fit">
                        <div class="row row-no-padding ">

                                    <!--begin:: Widgets/Revenue Change-->
                                    <div class="kt-portlet kt-portlet--height-fluid">
                                        <div class="kt-widget14">
                                            <div class="kt-widget14__header">
                                                <h3 class="kt-widget14__title">
                                                    Ventas últimos 3 meses
                                                </h3>
                                                <span class="kt-widget14__desc">
                                                    Resumen de ventas realizadas
                                                </span>
                                            </div>
                                            <div class="kt-widget14__content">
                                                <div class="kt-widget14__chart">
                                                    <div id="kt_chart_revenue_change" style="height: 250px; width: 250px;"></div>
                                                </div>
                                                <div class="kt-widget14__legends">
                                                    <div class="kt-widget14__legend">
                                                        <span class="kt-widget14__bullet kt-bg-success"></span>
                                                        <span class="kt-widget14__stats"><h5><a href="{{url('administracion/ventas/')}}?start={{date('m')}}/1/{{date('Y')}}&end={{date('m')}}/31/{{date('Y')}}">Este mes</a></h5></span>
                                                    </div>
                                                    <div class="kt-widget14__legend">
                                                        <span class="kt-widget14__bullet kt-bg-warning" style="background-color: rgb(253, 57, 149) !important;"></span>
                                                        <span class="kt-widget14__stats"><h5><a href="{{url('administracion/ventas/')}}?start={{date('m',strtotime('-1 month'))}}/1/{{date('Y')}}&end={{date('m',strtotime('-1 month'))}}/31/{{date('Y')}}">Mes anterior</a></h5>  </span>
                                                    </div>
                                                    <div class="kt-widget14__legend">
                                                        <span class="kt-widget14__bullet kt-bg-brand" style="background-color:rgb(93, 120, 255) !important;"></span>
                                                        <span class="kt-widget14__stats"><h5><a href="{{url('administracion/ventas/')}}?start={{date('m',strtotime('-2 month'))}}/1/{{date('Y')}}&end={{date('m',strtotime('-2 month'))}}/31/{{date('Y')}}">2 meses atrás</a></h5></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end:: Widgets/Revenue Change-->
                                </div>
                            </div>
                        </div>

                <div class="kt-portlet">
                    <div class="kt-portlet__body  kt-portlet__body--fit">
                        <div class="row row-no-padding row-col-separator-xl">
                            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">

                                <!--begin::Total Profit-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <a href="{{url('administracion/ventas')}}" class="kt-widget24__title">
                                                Todas las ventas
                                            </a>
                                            <span class="kt-widget24__desc">
                                                Ventas realizadas {{$numSales}}
                                            </span>
                                        </div>
                                        <span class="kt-widget24__stats kt-font-brand">
                                            Q {{$salesTotal}}
                                        </span>
                                    </div>
                                    
                                </div>

                                <!--end::Total Profit-->
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">

                                <!--begin::New Feedbacks-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <a href="{{url('administracion/ventas')}}" class="kt-widget24__title">
                                                Ventas de hoy
                                            </a>
                                            <span class="kt-widget24__desc">
                                                Ventas realizadas hoy {{$numSalesToday}}
                                            </span>
                                        </div>
                                        <span class="kt-widget24__stats kt-font-warning">
                                            Q {{$salesTotalToday}}
                                        </span>
                                    </div>
                                    
                                </div>

                                <!--end::New Feedbacks-->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kt-portlet">
                     <div class="kt-portlet__body  kt-portlet__body--fit">
                         <div class="row row-no-padding row-col-separator-xl">
                            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">

                                <!--begin::New Orders-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <a href="{{url('administracion/pedidos')}}" class="kt-widget24__title">
                                                Pedidos
                                            </a>
                                            <span class="kt-widget24__desc">
                                                Pedidos pendientes
                                            </span>
                                        </div>
                                        <span class="kt-widget24__stats kt-font-danger">
                                            {{$orders}}
                                        </span>
                                    </div>
                                    
                                    
                                </div>

                                <!--end::New Orders-->
                            </div>

                             @if(Auth::user()->user_type_id==1)
                            <div class="col-md-6 col-lg-6 col-xl-6 col-sm-12">

                                <!--begin::New Users-->
                                <div class="kt-widget24">
                                    <div class="kt-widget24__details">
                                        <div class="kt-widget24__info">
                                            <a href="{{url('administracion/distribuidores')}}" class="kt-widget24__title">
                                                Distribuidores
                                            </a>
                                            <span class="kt-widget24__desc">
                                                Solicitudes de distribuidores herbalife
                                            </span>
                                        </div>
                                        <span class="kt-widget24__stats kt-font-success">
                                            {{$distributors}}
                                        </span>
                                    </div>
                                   
                                </div>

                                <!--end::New Users-->
                            </div>
                            @endif
                        </div>
                    </div>
                </div>



                <!--begin:: Widgets/Activity-->
                                    <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                                        <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title">
                                                    Mi Actividad
                                                </h3>
                                            </div>
                                            
                                        </div>
                                        <div class="kt-portlet__body kt-portlet__body--fit">
                                            <div class="kt-widget17">
                                                <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                                                    <div class="kt-widget17__chart" style="height:120px;">
                                                        <canvas id="kt_chart_activities"></canvas>
                                                    </div>
                                                </div>
                                                <div class="kt-widget17__stats" style="padding-bottom: 40px;">
                                                    <div class="kt-widget17__items">
                                                        <div class="kt-widget17__item">
                                                            <span class="kt-widget17__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--brand">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect id="bound" x="0" y="0" width="24" height="24" />
                                                                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" id="Combined-Shape" fill="#000000" />
                                                                        <rect id="Rectangle-Copy-2" fill="#000000" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) " x="16.3255682" y="2.94551858" width="3" height="18" rx="1" />
                                                                    </g>
                                                                </svg> </span>
                                                            <span class="kt-widget17__subtitle">
                                                                Mis Ventas
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                                {{$mySales}} 
                                                            </span>
                                                        </div>
                                                        <div class="kt-widget17__item">
                                                            <span class="kt-widget17__icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <polygon id="Bound" points="0 0 24 0 24 24 0 24" />
                                                                        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" id="Shape" fill="#000000" fill-rule="nonzero" />
                                                                        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" id="Path" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg> </span>
                                                            <span class="kt-widget17__subtitle">
                                                                Compras
                                                            </span>
                                                            <span class="kt-widget17__desc">
                                                                {{$myPurchases}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end:: Widgets/Activity-->
                                </div>
            </div>
        </div> 
        <!--end:: kt-content -->

        @endsection


@section('scripts')
<script type="text/javascript">

window.onload = function() {
    revenueChange2();
}

 var revenueChange2 = function() {
        if ($('#kt_chart_revenue_change').length == 0) {
            return;
        }

        Morris.Donut({
            element: 'kt_chart_revenue_change',
            data: [{
                    label: "Este mes",
                    value: {{$thisMonthSales}}
                },
                {
                    label: "Mes anterior",
                    value: {{$monthSalesLast}}
                },
                {
                    label: "2 meses atrás",
                    value: {{$monthSales2}}
                }
            ],
            colors: [
                KTApp.getStateColor('success'),
                KTApp.getStateColor('danger'),
                KTApp.getStateColor('brand')
            ],
        });
    }


</script>
@endsection