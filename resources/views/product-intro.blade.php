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
                                    <img src="{{ asset('assets/images/03/pro_icon1.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="text-main" style="width: 120px">廠牌</span>
                                    <span class="text-44">
                                        @php
                                            $brand = \App\Models\Admin\BrandsInfo::find($product->brands_info_id);
                                            $brandName = $brand
                                                ? $brand->translate(app()->getLocale())->name
                                                : '';
                                        @endphp
                                        {{ $brandName }}
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{ asset('assets/images/03/pro_icon2.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="text-main" style="width: 120px">車款</span>
                                    <span class="text-44">
                                        @php
                                            $category = \App\Models\Admin\ProductCategories::find(
                                                $product->application_categories_info_id,
                                            );
                                            $categoryName = $category
                                                ? $category->translate(app()->getLocale())->name ?? ''
                                                : '';
                                        @endphp
                                        {{ $categoryName }}
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{ asset('assets/images/03/pro_icon3.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="text-main" style="width: 120px">機型</span>
                                    <span class="text-44">{{ $product->version ?? '' }}</span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{ asset('assets/images/03/pro_icon4.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="text-main" style="width: 120px">快速換斗器</span>
                                    <span class="text-44">
                                        @if ($product->quick_bucket_changer)
                                            <i class="fas fa-check text-44"></i>
                                        @endif
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{ asset('assets/images/03/pro_icon4.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="text-main" style="width: 120px">操作轉換器</span>
                                    <span class="text-44">
                                        @if ($product->operating_converter)
                                            <i class="fas fa-check text-44"></i>
                                        @endif
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{ asset('assets/images/03/pro_icon4.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="text-main" style="width: 120px">配管</span>
                                    <span class="text-44">
                                        {{ $product->translate(app()->getLocale())->piping ?? '' }}
                                    </span>
                                </p>
                                <p class="mb-0 d-flex align-items-center py-1">
                                    <img src="{{ asset('assets/images/03/pro_icon4.png') }}" class="img-fluid"
                                        alt="">
                                    <span class="text-main" style="width: 120px">膠塊</span>
                                    <span
                                        class="text-44">{{ $product->translate(app()->getLocale())->glue_block ?? '' }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="prod-info2 mt-5">
                            <a href="tel:0965-319571">
                                <div
                                    class="bg-sub text-center d-flex justify-content-center align-items-center animate-hover-2 py-3 px-2 mb-2">
                                    <img src="{{ asset('assets/images/03/icon_phone.png') }}" class="img-fluid mr-2"
                                        alt="">
                                    <h5 class="text-white mb-0">業務部門 0965-319571</h5>
                                </div>
                            </a>
                            {{-- 如果有型錄才顯示下載按鈕 --}}
                            @if ($product->pdf ?? false)
                                <div
                                    class="bg-main download-pdf text-center d-flex justify-content-center align-items-center animate-hover-2 py-3 px-2 mb-2">
                                    <img src="{{ asset('assets/images/03/icon_download.png') }}" class="img-fluid mr-2"
                                        alt="">
                                    <h5 class="text-white mb-0">下載型錄（pdf檔）</h5>
                                </div>

                                <div class="catalog mt-3">
                                    <p class="text-18 mb-0">下載型錄pdf前須提供基本資料：</p>
                                    <p class="text-18 fw-normal mb-2" style="font-size: 13px;">
                                        （<span class="text-danger">*</span><span
                                            style="color: #71706e;">{{ __('content_contact_us_list_required') }}</span>）
                                    </p>
                                    <form class="catalog-form" action="" method="post">
                                        @csrf
                                        <input type="text" name="website" style="display:none" tabindex="-1"
                                            autocomplete="off" aria-hidden="true">
                                        <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                                        <input type="text" name="product_pdf" value="{{ $product->pdf }}" hidden>
                                        <div class="row g-1">
                                            <div class="col-12">
                                                <div class="form-floating g-2">
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="請輸入姓名" required />
                                                    <label for="name">姓名 <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating g-2">
                                                    <input type="text" class="form-control" id="phone"
                                                        name="phone" placeholder="請輸入聯絡電話" required />
                                                    <label for="phone">{{ __('content_contact_us_list_phone') }} <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <!-- 所在地區下拉選單 -->
                                                <div class="form-floating g-2">
                                                    <select class="form-select" id="location" name="location" required>
                                                        <option value="" selected disabled>
                                                            {{ __('content_contact_us_list_city_option_none') }}</option>
                                                    </select>
                                                    <label for="location">{{ __('content_contact_us_list_city') }} <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <p>※輸入以上資訊，送出後即可下載型錄</p>
                                            <!-- 清除重填、送出按鈕 -->
                                            <div
                                                class="col-12 d-flex flex-row align-items-center justify-content-center g-2">
                                                <button type="reset"
                                                    class="btn-reset w-100 mx-1 py-1">{{ __('content_contact_us_list_clear') }}</button>
                                                <button type="submit"
                                                    class="btn-send w-100 mx-1 py-1">{{ __('content_contact_us_list_submit') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif

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
            // #location jquery下拉選單從api cdn取得
            // 1. 先抓整份 JSON
            $.getJSON(
                'https://raw.githubusercontent.com/donma/TaiwanAddressCityAreaRoadChineseEnglishJSON/master/CityCountyData.json',
                function(data) {
                    // 2. 填入「縣市」下拉
                    data.forEach(function(item) {
                        const lang = '{{ App::getLocale() }}';
                        // 根據語言選擇顯示中文或英文
                        const cityName = lang === 'zh_TW' ? item.CityName : item.CityEngName;
                        $('#location').append(
                            $('<option>', {
                                value: item.CityName,
                                text: cityName
                            })
                        );
                    });
                }
            );

            // 重置按鈕事件
            $('.btn-reset').on('click', function() {
                $('#catalog-form')[0].reset();
            });

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

                // 預設隱藏表單區域
                $('.catalog').hide();

                // 點擊下載按鈕時顯示表單
                $('.download-pdf').on('click', function() {
                    $('.catalog').slideDown();
                });

                // 處理表單提交
                $('.catalog-form').on('submit', function(e) {
                    e.preventDefault();

                    // 檢查honeypot欄位，如果不為空則可能是機器人
                    if ($('input[name="website"]').val() !== '') {
                        console.log('Bot detected');
                        return false; // 不執行後續提交
                    }

                    // 獲取表單數據
                    var formData = $(this).serialize();

                    // 發送AJAX請求
                    $.ajax({
                        url: '{{ localized_route('download.catalog') }}',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                // 下載PDF
                                // window.location.href = response.download_url;

                                // 隱藏表單
                                // $('.catalog').slideUp();

                                // 顯示成功訊息 sweetalert2
                                // alert('表單已送出，開始下載型錄');
                                // 使用 sweetalert2 顯示成功訊息，點擊確定後下載型錄
                                Swal.fire({
                                    title: '成功',
                                    text: '表單已送出，開始下載型錄',
                                    icon: 'success',
                                    confirmButtonText: '確定'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // 下載PDF
                                        window.location.href = response.download_url;

                                        // 隱藏表單
                                        $('.catalog').slideUp();
                                    }
                                })
                            }
                        },
                        error: function(xhr) {
                            // alert('發生錯誤，請稍後再試');
                            Swal.fire({
                                title: '錯誤',
                                text: '發生錯誤，請稍後再試',
                                icon: 'error',
                                confirmButtonText: '確定'
                            });
                            // 可以在這裡處理錯誤情況，例如顯示錯誤訊息
                            console.error(xhr);
                        }
                    });
                });
            });
        </script>
    @endpush
