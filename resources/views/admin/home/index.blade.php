@extends('admin.layouts.master')
@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Dashboard</h3>
                </div>
                <div>

                </div>
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">

            <!--begin:: Widgets/Stats-->
            <div class="m-portlet  m-portlet--unair">
                <div class="m-portlet__body  m-portlet__body--no-padding">
                    <div class="row m-row--no-padding m-row--col-separator-xl">
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::Total Profit-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Total Product
                                    </h4><br>
                                    <span class="m-widget24__desc">
													Our Listed Product
												</span>
                                    <span class="m-widget24__stats m--font-brand">
													70
												</span>
                                    <div class="m--space-10"></div>

                                </div>
                            </div>

                            <!--end::Total Profit-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::New Feedbacks-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Featured Product
                                    </h4><br>
                                    <span class="m-widget24__desc">
													Our Listed Featured Product
												</span>
                                    <span class="m-widget24__stats m--font-info">
													13
												</span>

                                </div>
                            </div>

                            <!--end::New Feedbacks-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::New Orders-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                        Orders
                                    </h4><br>
                                    <span class="m-widget24__desc">
													Order Listed
												</span>
                                    <span class="m-widget24__stats m--font-danger">
													0
												</span>

                                </div>
                            </div>

                            <!--end::New Orders-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-3">

                            <!--begin::New Users-->
                            <div class="m-widget24">
                                <div class="m-widget24__item">
                                    <h4 class="m-widget24__title">
                                         Customer
                                    </h4><br>
                                    <span class="m-widget24__desc">
													Customer Listed
												</span>
                                    <span class="m-widget24__stats m--font-success">
													0
												</span>

                                </div>
                            </div>

                            <!--end::New Users-->
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Stats-->

            <!--Begin::Section-->

            <!--End::Section-->

            <!--Begin::Section-->

            <!--End::Section-->

            <!--Begin::Section-->

            <!--End::Section-->

            <!--Begin::Section-->

            <!--End::Section-->

            <!--Begin::Section-->

            <!--End::Section-->
        </div>
    </div>

@endsection




