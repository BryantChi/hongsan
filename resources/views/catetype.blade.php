@extends('layouts_main.master')

@section('content')
    <!-- Category Start -->
    <div class="py-5 bg-f6">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{__('content_category')}}</h3>
                        @if (App::getLocale() == 'zh_TW')
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>CATEGORY</p>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <a href="{{ localized_route('construction') }}">
                        <div class="category-item wow fadeInUp" data-wow-delay="0.1s">
                            <div class="cg-header d-flex justify-content-between align-items-center py-lg-4 py-2 px-2">
                                <h5 class="mb-0">{{__('machinery')}}</h5>
                                <img class="img-fluid" src="{{asset('assets/images/00-hp/icon_plus.png')}}" alt="建設機械">
                            </div>
                            <div class="cg-body">
                                <img src="{{asset('assets/images/00-hp/cate_pic1.jpg')}}" class="img-fluid" alt="建設機械">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="category-item wow fadeInUp" data-wow-delay="0.3s">
                        <div class="cg-header d-flex justify-content-between align-items-center py-lg-4 py-2 px-2">
                            <h5 class="mb-0">{{__('applications')}}</h5>
                            <img class="img-fluid" src="{{asset('assets/images/00-hp/icon_plus.png')}}" alt="液壓配件">
                        </div>
                        <div class="cg-body">
                            <img src="{{asset('assets/images/00-hp/cate_pic2.jpg')}}" class="img-fluid" alt="液壓配件">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="category-item wow fadeInUp" data-wow-delay="0.3s">
                        <div class="cg-header d-flex justify-content-between align-items-center py-lg-4 py-2 px-2">
                            <h5 class="mb-0">{{__('agriculture')}}</h5>
                            <img class="img-fluid" src="{{asset('assets/images/00-hp/icon_plus.png')}}" alt="農業機械">
                        </div>
                        <div class="cg-body">
                            <img src="{{asset('assets/images/00-hp/cate_pic3.jpg')}}" class="img-fluid" alt="農業機械">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="category-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="cg-header d-flex justify-content-between align-items-center py-lg-4 py-2 px-2">
                            <h5 class="mb-0">{{__('recycling')}}</h5>
                            <img class="img-fluid" src="{{asset('assets/images/00-hp/icon_plus.png')}}" alt="環保能源">
                        </div>
                        <div class="cg-body">
                            <img src="{{asset('assets/images/00-hp/cate_pic4.jpg')}}" class="img-fluid" alt="環保能源">
                        </div>
                    </div>
                </div>


                {{-- <div class="col-lg-12 mt-4">
                    <p class="text-center text-18 fw-normal mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <span class="text-main">鴻盛建設機械提供您一次性購足的銷售服務，我們提供最齊全的挖土機/怪手機具零件產品線</span><br>
                        客戶可依據工作需求，選擇適合的產品，每項產品皆提供實體保固並可配合彈性的付款方式，所有的一切，都是為了讓客戶們可以享受最好的產品及服務。
                    </p>

                    <a href="javascript:void(0)">
                        <div class="btn-main01 d-flex align-items-center justify-content-between px-3 py-2 mx-auto wow fadeInUp"
                            data-wow-delay="0.1s">
                            <span class="text">類別總覽</span>
                            <span class="icon">
                                <img src="assets/images/00-hp/icon_plus_o.png" class="img-fluid" width="26"
                                    alt="">
                            </span>
                        </div>
                    </a>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- Category End -->
@endsection
