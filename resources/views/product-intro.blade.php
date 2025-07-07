@extends('layouts_main.master')

@section('content')
    <div class="py-5 bg-f6">
        <div class="container-fluid px-0 position-relative">
            <div class="row g-4" id="products">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('product_intro') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>PRODUCT INTRO</p>
                        @endif
                    </div>
                </div>

            </div>

            <div class="container mb-4 px-lg-auto px-3 sc-product">
                <div class="row g-4">

                    <div class="col-lg-7 mb-lg-0 mb-3">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                @foreach ($images ?? [] as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('uploads/' . $image->image_path) }}" class="img-fluid w-100" />
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper mt-1">
                            <div class="swiper-wrapper">
                                @foreach ($images ?? [] as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('uploads/' . $image->image_path) }}" class="img-fluid w-100" />
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 mb-lg-0 mb-3">
                        <h4 class="text-main mb-3">{{ $product->translate(app()->getLocale())->name }}</h4>
                        <div class="product-info">
                            <h5 class="text-white bg-main py-2 px-2 mb-0">產品資訊</h5>
                            <div class="product-info-content px-2 py-1">
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{asset('assets/images/03/pro_icon1.png')}}" class="img-fluid" alt="">
                                    <span class="text-main" style="width: 120px">廠牌</span>
                                    <span class="text-44">
                                        @php
                                            $brand = \App\Models\Admin\BrandsInfo::find($product->brand_id);
                                            $brandName = $brand ? $brand->translate(app()->getLocale())->name ?? '' : '';
                                        @endphp
                                        {{ $brandName }}
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{asset('assets/images/03/pro_icon2.png')}}" class="img-fluid" alt="">
                                    <span class="text-main" style="width: 120px">車款</span>
                                    <span class="text-44">
                                        @php
                                            $category = \App\Models\Admin\ProductCategories::find($product->application_categories_info_id);
                                            $categoryName = $category ? $category->translate(app()->getLocale())->name ?? '' : '';
                                        @endphp
                                        {{ $categoryName }}
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{asset('assets/images/03/pro_icon3.png')}}" class="img-fluid" alt="">
                                    <span class="text-main" style="width: 120px">機型</span>
                                    <span class="text-44">{{ $product->version ?? '' }}</span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{asset('assets/images/03/pro_icon4.png')}}" class="img-fluid" alt="">
                                    <span class="text-main" style="width: 120px">快速換斗器</span>
                                    <span class="text-44">
                                        @if ($product->quick_bucket_changer ?? false)
                                            <i class="bi bi-check"></i>
                                        @endif
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{asset('assets/images/03/pro_icon4.png')}}" class="img-fluid" alt="">
                                    <span class="text-main" style="width: 120px">操作轉換器</span>
                                    <span class="text-44">
                                        @if ($product->operation_converter ?? false)
                                            <i class="bi bi-check"></i>
                                        @endif
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{asset('assets/images/03/pro_icon4.png')}}" class="img-fluid" alt="">
                                    <span class="text-main" style="width: 120px">配管</span>
                                    <span class="text-44">
                                        {{ $product->translate(app()->getLocale())->piping ?? '' }}
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{asset('assets/images/03/pro_icon4.png')}}" class="img-fluid" alt="">
                                    <span class="text-main" style="width: 120px">膠塊</span>
                                    <span class="text-44">{{ $product->translate(app()->getLocale())->glue_block ?? '' }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="prod-info2 mt-5">
                            <a href="tel:0965-319571">
                                <div class="bg-sub text-center d-flex justify-content-center align-items-center animate-hover-2 py-3 px-2 mb-2">
                                    <img src="{{asset('assets/images/03/icon_phone.png')}}" class="img-fluid mr-2" alt="">
                                    <h5 class="text-white mb-0">業務部門 0965-319571</h5>
                                </div>
                            </a>
                            <a href="javascript:void(0);">
                                <div class="bg-main text-center d-flex justify-content-center align-items-center animate-hover-2 py-3 px-2 mb-2">
                                    <img src="{{asset('assets/images/03/icon_download.png')}}" class="img-fluid mr-2" alt="">
                                    <h5 class="text-white mb-0">下載型錄（pdf檔）</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <div class="prod-intro">
                            <h5 class="prod-intro-header text-main fw-normal py-2 px-2 mb-3">產品描述</h5>
                            <div class="text-18 px-3">
                                {!! $product->translate(app()->getLocale())->introduction ?? '' !!}
                            </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

@push('page_scripts')
    <script>
        $(function() {
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                spaceBetween: 10,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
            var swiper2 = new Swiper(".mySwiper2", {
                loop: true,
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });
        });
    </script>
@endpush
