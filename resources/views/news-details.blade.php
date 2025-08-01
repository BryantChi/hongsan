@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container-fluid px-0 position-relative">
            <div class="row g-4" id="products">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{__('content_news')}}</h3>
                        @if (App::getLocale() == 'zh_TW')
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>NEWS</p>
                        @endif

                    </div>
                </div>

            </div>

            <div class="container mb-4 px-lg-auto px-3">

                <div class="row g-4">
                    <div class="col-12">
                        <div class="news-content px-3 py-4">
                            <div class="news-header text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h4 class="text-main">{{ $news->translate(App::getLocale())->title ?? '' }}</h4>
                                <p class="text-sub fw-normal">{{ \Carbon\Carbon::parse($news->created_at)->format('Y.m.d') }}</p>
                            </div>

                            <div class="news-body py-5 wow fadeInUp" data-wow-delay="0.1s">
                                {!!  $news->translate(App::getLocale())->content ?? '' !!}

                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{ localized_route('news') }}">
                            <div class="d-flex align-items-center px-3 py-1 post-back animate-hover-2 wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/00-hp/iconarrowwhite32.png') }}" class="img-fluid me-1" alt="">
                                <p class="text-white mb-0">{{__('back_to_list')}}</p>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
