@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container-fluid px-0 position-relative">
            <div class="row g-4" id="products">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('products') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>PRODUCTS</p>
                        @endif
                    </div>
                </div>

            </div>

            <div class="container mb-4 px-lg-auto px-3">
                <div class="row g-4">
                    <div class="col-12">
                        <p class="text-main fw-normal text-end" style="font-size: 15px;">
                            {{ __('products_total', ['num' => count($products ?? [])]) }}
                        </p>
                    </div>

                    @foreach ($products ?? [] as $product)
                        <div class="col-lg-3 col-6">
                            <a href="{{ localized_route('products.detail', ['id' => $product->id]) }}">
                                <div class="hot-item-box animate-hover-15">
                                    @php
                                        $product_img = \App\Models\Admin\ProductImage::where('product_id', $product->id)
                                            ->orderBy('sort_order', 'asc')
                                            ->first();
                                        $prod_img = $product_img->image_path ?? ''
                                    @endphp
                                    <img src="{{ asset('uploads/' . ($product->prod_img_cover ?? $prod_img)) }}" class="img-fluid">
                                    {{-- <img src="{{ asset('assets/images/00-hp/hot_pic.jpg') }}" class="img-fluid"
                                        alt=""> --}}
                                    <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                        <h5 class="text-white">
                                            {{ $product->translateOrDefault(app()->getLocale())->name }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-3 col-6">
                        <a href="{{ localized_route('products.detail.mock') }}">
                            <div class="hot-item-box animate-hover-15">
                                <img src="{{asset('assets/images/00-hp/hot_pic.jpg')}}" class="img-fluid" alt="">
                                <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                    <h5 class="text-white">熱銷產品</h5>
                                </div>
                            </div>
                        </a>
                    </div> --}}


                </div>
            </div>
        </div>
    </div>
@endsection
