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
                        <div class="news-content px-3 py-4">
                            <div class="news-header text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h4 class="text-main">{{ $news->title ?? '案例分享—台北水下工程案' }}</h4>
                                <p class="text-sub fw-normal">2023.06.21</p>
                            </div>

                            <div class="news-body py-5 wow fadeInUp" data-wow-delay="0.1s">
                                {!!  $news->content ?? '' !!}

                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{ localized_route('news') }}">
                            <div class="d-flex align-items-center px-3 py-1 post-back wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/00-hp/iconarrowwhite32.png') }}" class="img-fluid me-1" alt="">
                                <p class="text-white mb-0">返回列表</p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
