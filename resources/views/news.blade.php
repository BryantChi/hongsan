@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container-fluid px-0 position-relative">
            <div class="row g-4" id="products">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>最新消息</h3>
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>NEWS</p>
                    </div>
                </div>

            </div>

            <div class="container mb-4 px-lg-auto px-3">
                <div class="row g-4">
                    <div class="col-12">
                        <p class="text-main fw-normal text-end" style="font-size: 15px;">
                            共有 {{ 28 }} 則消息
                        </p>
                    </div>

                </div>


                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.21</div>
                                <div class="hp-new-title mb-2">案例分享—台北水下工程案</div>
                                <p class="fw-normal">
                                    台北市地下工程建設項目向鴻盛建設機械
                                    ，採購了領先全球的建設機械...more
                                </p>
                                <div class="mt-4">
                                    <a href="{{ localized_route('news.detail.mock')}}">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.20</div>
                                <div class="hp-new-title mb-2">品牌故事集—麥格尼 MAGNI</div>
                                <p class="fw-normal">
                                    麥格尼自1950年代開始發跡，從同時擁有
                                    製造商與技術出身的皮特羅先生...more
                                </p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.21</div>
                                <div class="hp-new-title mb-2">案例分享—台北水下工程案</div>
                                <p class="fw-normal">
                                    台北市地下工程建設項目向鴻盛建設機械
                                    ，採購了領先全球的建設機械...more
                                </p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.20</div>
                                <div class="hp-new-title mb-2">品牌故事集—麥格尼 MAGNI</div>
                                <p class="fw-normal">
                                    麥格尼自1950年代開始發跡，從同時擁有
                                    製造商與技術出身的皮特羅先生...more
                                </p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.21</div>
                                <div class="hp-new-title mb-2">案例分享—台北水下工程案</div>
                                <p class="fw-normal">
                                    台北市地下工程建設項目向鴻盛建設機械
                                    ，採購了領先全球的建設機械...more
                                </p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.20</div>
                                <div class="hp-new-title mb-2">品牌故事集—麥格尼 MAGNI</div>
                                <p class="fw-normal">
                                    麥格尼自1950年代開始發跡，從同時擁有
                                    製造商與技術出身的皮特羅先生...more
                                </p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.21</div>
                                <div class="hp-new-title mb-2">案例分享—台北水下工程案</div>
                                <p class="fw-normal">
                                    台北市地下工程建設項目向鴻盛建設機械
                                    ，採購了領先全球的建設機械...more
                                </p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{asset('assets/images/00-hp/n_pic.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">2023.06.20</div>
                                <div class="hp-new-title mb-2">品牌故事集—麥格尼 MAGNI</div>
                                <p class="fw-normal">
                                    麥格尼自1950年代開始發跡，從同時擁有
                                    製造商與技術出身的皮特羅先生...more
                                </p>
                                <div class="mt-4">
                                    <a href="javascript:void(0)">
                                        <div class="btn-sub01 d-flex align-items-center justify-content-between px-3 py-2 ms-auto wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            <span class="text">MORE</span>
                                            <span class="icon">
                                                <i class="fa fa-angle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
