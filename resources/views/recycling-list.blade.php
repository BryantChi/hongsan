@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{__('recycling')}}</h3>
                        @if (App::getLocale() == 'zh_TW')
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>AGRICULTURAL MACHINERY</p>
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

                    {{-- <div class="col-12 my-3">
                        <h5 class="text-18 fw-normal text-center bg-white py-2 wow fadeInUp" data-wow-delay="0.1s"></h5>
                    </div> --}}


                </div>

                <div class="row py-3">

                    <div class="col-12">
                        <div class="row g-3">

                            @foreach ($recyclingList ?? [] as $recycling)
                                <div class="col-lg-3 col-6">
                                    <a href="{{ localized_route('recycling.detail', ['id' => $recycling->id]) }}">
                                        <div class="hot-item-box animate-hover-15">
                                            @php
                                                $product_img = \App\Models\Admin\ProductImage::where('product_id', $recycling->id)
                                                    ->orderBy('sort_order', 'asc')
                                                    ->first();
                                                $prod_img = $product_img->image_path ?? ''
                                            @endphp
                                            <img src="{{ asset('uploads/' . ($recycling->prod_img_cover ?? $prod_img)) }}" class="img-fluid">
                                            <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                                <h5 class="text-white">{{$recycling->translateOrDefault(app()->getLocale())->name}}</h5>
                                            </div>
                                        </div>
                                    </a>
                                    {{-- <div class="hot-item-box animate-hover-15">
                                        <img src="{{asset('assets/images/00-hp/hot_pic.jpg')}}" class="img-fluid" alt="">
                                        <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                            <h5 class="text-white">產品</h5>
                                        </div>
                                    </div> --}}
                                </div>
                            @endforeach


                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
@endsection
