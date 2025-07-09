@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{__('applications')}}</h3>
                        @if (App::getLocale() == 'zh_TW')
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>HYDRAULIC ACCESSORIES</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container mb-4 px-lg-auto px-3">
                <div class="row g-lg-4 g-3">
                    <div class="col-12 mb-3">
                        <a href="{{ localized_route('catetype') }}">
                            <div class="d-flex align-items-center wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/icon_back.png') }}" class="img-fluid me-1"
                                    alt="">
                                <p class="text-main mb-0">{{__('button_back')}}</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 my-3">
                        <h5 class="text-18 fw-normal text-center bg-white py-2 wow fadeInUp" data-wow-delay="0.1s">
                            產品類別
                        </h5>
                    </div>


                </div>

                <div class="row g-2">
                    <div class="col-lg-3">
                        <a href="{{ localized_route('attachments') }}">
                            <div class="construction wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ asset('assets/images/03/acc_pic.jpg') }}" class="img-fluid" alt="">
                                <div class="construction-mask d-flex flex-column justify-content-center align-items-center text-center">
                                    <p class="icon-text-all mb-0">ALL</p>
                                    <p>所有配件</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @foreach ($categories as $category)
                        <div class="col-lg-3">
                            <a href="{{ localized_route('attachments', ['category' => $category->id]) }}">
                                <div class="construction wow fadeInUp" data-wow-delay="0.1s">
                                    <img src="{{ ($category->image ?? null) == null ? asset('assets/images/03/acc_pic.jpg') :  asset('uploads/' . ($category->image ?? '')) }}" class="img-fluid" alt="">
                                    <div class="construction-mask d-flex flex-column justify-content-center align-items-center text-center">
                                        <img src="{{ ($category->icon ?? null) == null ? asset('assets/images/03/acc_icon.png') : asset('uploads/' . ($category->icon ?? '')) }}" class="img-fluid icon" alt="">
                                        <p>{{ $category->translate(app()->getLocale())->name }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

            </div>

        </div>
    </div>
@endsection
