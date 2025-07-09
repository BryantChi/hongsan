@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{__('agriculture')}}</h3>
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

                <div class="row">
                    {{-- 確認是否有品牌，$brandsInfo為品牌List --}}
                    <div class="col-lg-2 mb-3 {{ $brandsInfo->isEmpty() ? 'd-none' : '' }}">
                        {{-- <div class="category mb-3">
                            <div class="category-header d-flex justify-content-center align-items-center">
                                <h6 class="text-white mb-0">{{__('category')}}</h6>
                            </div>
                            <div class="category-body">
                                <ul class="list-unstyled category-list">
                                    <li class="wow fadeInUp" data-wow-delay="0.1s">
                                        <a href="{{ localized_route('') }}" class="text-18">類別1</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.2s">
                                        <a href="{{ localized_route('') }}" class="text-18">類別2</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.3s">
                                        <a href="{{ localized_route('') }}" class="text-18">類別3</a>
                                    </li>
                                    <li class="wow fadeInUp" data-wow-delay="0.4s">
                                        <a href="{{ localized_route('') }}" class="text-18">其他類別</a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}

                        <div class="brand mb-3">
                            <div class="brand-header d-flex justify-content-center align-items-center">
                                <h6 class="text-white mb-0">{{__('brand')}}</h6>
                            </div>
                            <div class="brand-body">
                                {{-- 顯示品牌列表 --}}
                                <ul class="list-unstyled brand-list">
                                    {{-- 確認是否有品牌資訊 --}}
                                    @if (!empty($brandsInfo))
                                        @foreach ($brandsInfo as $brand)
                                            <li class="wow fadeInUp" data-wow-delay="0.1s">
                                                <a href="{{ localized_route('agriculture', ['brand' => $brand->id]) }}" class="text-18">{{ $brand->translateOrDefault(app()->getLocale())->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="{{ $brandsInfo->isEmpty() ? 'col-12' : 'col-lg-10' }}">
                        <div class="row g-3">

                            @foreach ($agricultureList ?? [] as $agriculture)
                                <div class="col-lg-3 col-6">
                                    <a href="{{ localized_route('agriculture.detail', ['id' => $agriculture->id]) }}">
                                        <div class="hot-item-box animate-hover-15">
                                            @php
                                                $product_img = \App\Models\Admin\ProductImage::where('product_id', $agriculture->id)
                                                    ->orderBy('sort_order', 'asc')
                                                    ->first();
                                                $prod_img = $product_img->image_path ?? ''
                                            @endphp
                                            <img src="{{ asset('uploads/' . $prod_img) }}" class="img-fluid">
                                            <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                                <h5 class="text-white">{{$agriculture->translateOrDefault(app()->getLocale())->name}}</h5>
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
