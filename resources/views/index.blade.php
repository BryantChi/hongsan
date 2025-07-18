@extends('layouts_main.master')

@section('content')
    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container mb-4">
            <div class="row g-4 ">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('content_category') }}</h3>
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
                                <h5 class="mb-0">{{ __('machinery') }}</h5>
                                <img class="img-fluid" src="{{ asset('assets/images/00-hp/icon_plus.png') }}"
                                    alt="建設機械">
                            </div>
                            <div class="cg-body">
                                <img src="{{ asset('assets/images/00-hp/cate_pic1.jpg') }}" class="img-fluid"
                                    alt="建設機械">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ localized_route('attachments.categories') }}">
                        <div class="category-item wow fadeInUp" data-wow-delay="0.3s">
                            <div class="cg-header d-flex justify-content-between align-items-center py-lg-4 py-2 px-2">
                                <h5 class="mb-0">{{ __('applications') }}</h5>
                                <img class="img-fluid" src="{{ asset('assets/images/00-hp/icon_plus.png') }}"
                                    alt="液壓配件">
                            </div>
                            <div class="cg-body">
                                <img src="{{ asset('assets/images/00-hp/cate_pic2.jpg') }}" class="img-fluid"
                                    alt="液壓配件">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ localized_route('agriculture') }}">
                        <div class="category-item wow fadeInUp" data-wow-delay="0.3s">
                            <div class="cg-header d-flex justify-content-between align-items-center py-lg-4 py-2 px-2">
                                <h5 class="mb-0">{{ __('agriculture') }}</h5>
                                <img class="img-fluid" src="{{ asset('assets/images/00-hp/icon_plus.png') }}"
                                    alt="農業機械">
                            </div>
                            <div class="cg-body">
                                <img src="{{ asset('assets/images/00-hp/cate_pic3.jpg') }}" class="img-fluid"
                                    alt="農業機械">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ localized_route('recycling') }}">
                        <div class="category-item wow fadeInUp" data-wow-delay="0.5s">
                            <div class="cg-header d-flex justify-content-between align-items-center py-lg-4 py-2 px-2">
                                <h5 class="mb-0">{{ __('recycling') }}</h5>
                                <img class="img-fluid" src="{{ asset('assets/images/00-hp/icon_plus.png') }}"
                                    alt="環保能源">
                            </div>
                            <div class="cg-body">
                                <img src="{{ asset('assets/images/00-hp/cate_pic4.jpg') }}" class="img-fluid"
                                    alt="環保能源">
                            </div>
                        </div>
                    </a>
                </div>


                <div class="col-lg-12 mt-4">
                    <p class="text-center text-18 fw-normal mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <span class="text-main">{{ __('category_content_a') }}</span><br>
                        {{ __('category_content_b') }}
                    </p>

                    <a href="{{ localized_route('catetype') }}">
                        <div class="btn-main01 d-flex align-items-center justify-content-between px-3 py-2 mx-auto wow fadeInUp"
                            data-wow-delay="0.1s">
                            <span class="text">{{ __('overview') }}</span>
                            <span class="icon">
                                <img src="{{ asset('assets/images/00-hp/icon_plus_o.png') }}" class="img-fluid"
                                    width="26" alt="">
                            </span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- Category End -->

    <!-- Hot Items (Products) Start -->
    <div class="py-5 position-relative hot-items">
        <div class="bg-hot"></div>
        <div class="bg-sub"></div>
        <div class="container-fluid px-0 position-relative" style="z-index: 5;">
            <div class="row g-4" id="hot-items">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('hot_items') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>HOT ITEMS</p>
                        @endif
                    </div>
                </div>

            </div>

            <div class="container mb-4 px-lg-auto px-3">
                <div class="row g-4">
                    {{-- <div class="col-12">
                        <div class="swiper hotSwiper">
                            <div class="swiper-wrapper">
                                @foreach ($products ?? [] as $product)
                                    <div class="swiper-slide">
                                        <a href="{{ localized_route('products.detail', ['id' => $product->id]) }}">
                                            <div class="hot-item-box animate-hover-15">
                                                @php
                                                    $product_img = \App\Models\Admin\ProductImage::where('product_id', $product->id)
                                                        ->orderBy('sort_order', 'asc')
                                                        ->first();
                                                    $prod_img = $product_img->image_path ?? '';
                                                @endphp
                                                <img src="{{ asset('uploads/' . $prod_img) }}" class="img-fluid">
                                                <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                                    <h5 class="text-white">
                                                        {{ $product->translateOrDefault(app()->getLocale())->name }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <div class="row g-3 hotSlick">
                            @foreach ($products ?? [] as $product)
                                <div class="col-lg-3 col-6 px-2">
                                    <a href="{{ localized_route('products.detail', ['id' => $product->id]) }}">
                                        <div class="hot-item-box animate-hover-15">
                                            @php
                                                $product_img = \App\Models\Admin\ProductImage::where(
                                                    'product_id',
                                                    $product->id,
                                                )
                                                    ->orderBy('sort_order', 'asc')
                                                    ->first();
                                                $prod_img = $product_img->image_path ?? '';
                                            @endphp
                                            <img src="{{ asset('uploads/' . ($product->prod_img_cover ?? $prod_img)) }}" class="img-fluid">
                                            <div class="hot-item-content bg-main text-center py-lg-3 py-2 px-3">
                                                <h5 class="text-white">
                                                    {{ $product->translateOrDefault(app()->getLocale())->name }}
                                                </h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 mt-4">
                        <a href="{{ localized_route('products') }}">
                            <div class="btn-main01 d-flex align-items-center justify-content-between px-3 py-2 mx-auto wow fadeInUp"
                                data-wow-delay="0.1s">
                                <span class="text">{{ __('more_products') }}</span>
                                <span class="icon">
                                    <img src="{{ asset('assets/images/00-hp/icon_plus_o.png') }}" class="img-fluid"
                                        width="26" alt="">
                                </span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Hot Items End -->

    <!-- News Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('content_news') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>NEWS</p>
                        @endif
                    </div>
                </div>

            </div>

            <div class="row g-4">
                @foreach ($newsItems ?? [] as $news)
                    <div class="col-lg-6">

                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <a href="{{ localized_route('news.detail', ['id' => $news->id]) }}">
                                    <img src="{{ asset('uploads/' . $news->cover_front_image) }}" class="img-fluid"
                                        alt="">
                                </a>
                            </div>
                            <div class="hp-new-content col-lg-7">
                                <div class="new-date text-end text-sub">
                                    {{ \Carbon\Carbon::parse($news->created_at)->format('Y.m.d') }}</div>
                                <a href="{{ localized_route('news.detail', ['id' => $news->id]) }}">
                                    <div class="hp-new-title text-ellipsis mb-2">
                                        {{ $news->translate(App::getLocale())->title }}</div>
                                </a>
                                @php
                                    $content = preg_replace(
                                        '/<img[^>]*>/i',
                                        '',
                                        $news->translate(App::getLocale())->content,
                                    );
                                    // 移除其他 HTML 標籤
                                    $cleanText = strip_tags($content);
                                    // // 截取前100字（處理UTF-8中文）
                                    // $preview = mb_substr($cleanText, 0, 100);
                                @endphp
                                <p class="fw-normal">
                                    {{ Str::limit($cleanText, 50, '...more') }}
                                </p>
                                <div class="mt-4">
                                    <a href="{{ localized_route('news.detail', ['id' => $news->id]) }}">
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
                @endforeach

                @if (($newsItems ?? [])->isEmpty())
                    <div class="col-lg-6">
                        <div class="hp-new-box p-2 d-flex flex-lg-row flex-column wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-new-img col-lg-5 align-self-center">
                                <img src="{{ asset('assets/images/00-hp/n_pic.jpg') }}" class="img-fluid"
                                    alt="">
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
                                <img src="{{ asset('assets/images/00-hp/n_pic.jpg') }}" class="img-fluid"
                                    alt="">
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
                @endif

                <div class="col-12 mt-4">
                    <a href="{{ localized_route('news') }}">
                        <div class="btn-main01 d-flex align-items-center justify-content-between px-3 py-2 mx-auto wow fadeInUp"
                            data-wow-delay="0.1s">
                            <span class="text">{{ __('content_more_news') }}</span>
                            <span class="icon">
                                <img src="{{ asset('assets/images/00-hp/icon_plus_o.png') }}" class="img-fluid"
                                    width="26" alt="">
                            </span>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div>
    <!-- News End -->

    <!-- About Start -->
    <div class="">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-5">
                    <picture>
                        <source srcset="{{ asset('assets/images/00-hp/ab_l_pic1024.jpg') }}" media="(min-width: 1024px)"
                            type="image/jpg">
                        <img src="{{ asset('assets/images/00-hp/ab_l_pic872.jpg') }}" class="img-fluid hp-ab-img"
                            alt="">
                    </picture>
                </div>
                <div class="col-lg-7 py-5 px-3 hp-ab-bg">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('content_about_hongsan') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>ABOUT</p>
                        @endif
                    </div>

                    <div class="mt-4 row align-items-center justify-content-center g-4">
                        <div class="hp-ab-item col-lg-auto col-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-ab-icon text-center mb-3">
                                <img src="{{ asset('assets/images/00-hp/ab_icon1.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <h5 class="hp-ab-title text-main">{{ __('content_about_hongsan_sales') }}</h5>
                        </div>

                        <div class="hp-ab-item col-lg-auto col-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-ab-icon text-center mb-3">
                                <img src="{{ asset('assets/images/00-hp/ab_icon2.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <h5 class="hp-ab-title text-main">{{ __('content_about_hongsan_maintenance') }}</h5>
                        </div>

                        <div class="hp-ab-item col-lg-auto col-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-ab-icon text-center mb-3">
                                <img src="{{ asset('assets/images/00-hp/ab_icon3.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <h5 class="hp-ab-title text-main">{{ __('content_about_hongsan_parts') }}</h5>
                        </div>

                        <div class="hp-ab-item col-lg-auto col-6 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <div class="hp-ab-icon text-center mb-3">
                                <img src="{{ asset('assets/images/00-hp/ab_icon4.png') }}" class="img-fluid"
                                    alt="">
                            </div>
                            <h5 class="hp-ab-title text-main">{{ __('content_about_hongsan_rental') }}</h5>
                        </div>

                        <div class="hp-ab-content mb-4 mt-4 col-md-9">
                            <p class="fw-normal text-18 wow fadeInUp" data-wow-delay="0.1s">
                                {{ __('content_about_hongsan_inside') }}
                            </p>

                            <a href="{{ localized_route('about') }}">
                                <div class="btn-main01 d-flex align-items-center justify-content-between px-3 py-2 mx-auto wow fadeInUp"
                                    data-wow-delay="0.1s">
                                    <span class="text">{{ __('about') }}</span>
                                    <span class="icon">
                                        <img src="{{ asset('assets/images/00-hp/icon_plus_o.png') }}" class="img-fluid"
                                            width="26" alt="">
                                    </span>
                                </div>
                            </a>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div class="bg-main py-2"></div>
    </div>
    <!-- About End -->

    <!-- Links Start -->
    <div class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('brands_links') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>LINKS</p>
                        @endif
                    </div>
                </div>

                <div class="col-12">
                    <div class="swiper linksSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($linkInfos ?? [] as $linkInfo)
                                <div class="swiper-slide animate-hover-15">
                                    <a href="{{ $linkInfo->url }}" target="_blank">
                                        <img src="{{ asset('uploads/' . $linkInfo->image) }}" class="img-fluid"
                                            alt="{{ $linkInfo->name }}" title="{{ $linkInfo->name }}">
                                    </a>
                                </div>
                            @endforeach

                            @if (($linkInfos ?? [])->isEmpty())
                                {{-- 如果沒有友站連結，則顯示預設的 22 張圖片 --}}
                                @for ($i = 1; $i < 23; $i++)
                                    <div class="swiper-slide animate-hover-15">
                                        <a href="javascript:void(0)">
                                            {{-- $i 個位數自動前面補零，大於 9 的數字不補零 --}}
                                            <img src="{{ asset('assets/images/00-hp/brand' . str_pad($i, 2, '0', STR_PAD_LEFT) . '.jpg') }}"
                                                class="img-fluid" alt="友站連結{{ $i }}"
                                                title="友站連結{{ $i }}">
                                        </a>
                                    </div>
                                @endfor
                            @endif
                        </div>
                        <!-- <div class="swiper-button-next"></div>
                                                <div class="swiper-button-prev"></div> -->
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Links End -->

    <!-- Contact Start -->
    <div class="py-5 bg-f6">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 mb-4">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>{{ __('content_contact_us_title') }}</h3>
                        @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>CONTACT US</p>
                        @endif
                    </div>

                    <p class="text-center text-18 fw-light my-3 wow fadeInUp" data-wow-delay="0.1s">
                        {{ __('content_contact_us') }}
                    </p>
                </div>

            </div>

            <div class="row g-4 mt-lg-3">
                <div class="col-lg-7 d-flex flex-column flex-lg-row g-3 justify-content-around">
                    <div class="hp-contact-map col-lg-6 p-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-main">{{ __('content_contact_us_map_a') }}</h5>
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29171.098843228687!2d121.594911!3d23.946739!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468a02e0c150d5b%3A0x29c511764815b983!2z6bS755ub5bu66Kit5qmf5qKw5pyJ6ZmQ5YWs5Y-4!5e0!3m2!1szh-TW!2stw!4v1751053342957!5m2!1szh-TW!2stw"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="hp-contact-map col-lg-6 p-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-main">{{ __('content_contact_us_map_b') }}</h5>
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28953.638858559443!2d121.267205!3d24.890993!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468191087a81a49%3A0xeecc7851a38dc3c!2z5Y-w54Gj5bu66Kit5qmf5qKw5pyJ6ZmQ5YWs5Y-4!5e0!3m2!1szh-TW!2stw!4v1751053525733!5m2!1szh-TW!2stw"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    {{-- 成功提示訊息 --}}
                    @if (session('success'))
                        <div class="alert text-center my-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- 錯誤提示訊息 --}}
                    @if ($errors->any())
                        <div class="alert alert-danger text-center my-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p class="text-end text-18 fw-normal mb-0">
                        （<span class="text-danger">*</span>{{ __('content_contact_us_list_required') }}）
                    </p>
                    <form class="hp-contact-form" id="contactForm" method="POST"
                        action="{{ localized_route('contact.store') }}">
                        @csrf
                        <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off"
                            aria-hidden="true">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="請輸入姓名" required />
                                    <label for="name">{{ __('content_contact_us_list_name') }} <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="machine_type" name="machine_type"
                                        placeholder="請輸入車型" required />
                                    <label for="machine_type">{{ __('content_contact_us_list_machinetype') }} <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="請輸入聯絡電話" required />
                                    <label for="phone">{{ __('content_contact_us_list_phone') }} <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating g-2">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="請輸入電子郵件" required />
                                    <label for="email">{{ __('content_contact_us_list_mail') }} <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="col-lg-6">
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
                            <div class="col-lg-6">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="請輸入國家" value="台灣" />
                                    <label for="country">{{ __('content_contact_us_list_country') }}</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating g-2">
                                    <textarea class="form-control" id="message" name="message" placeholder="請輸入您的聯絡內容" style="height: 150px;"></textarea>
                                    <label for="message">{{ __('content_contact_us_list_message') }}</label>
                                </div>
                            </div>
                            <!-- 驗證碼 -->
                            <!-- <div class="col-lg-12">
                                                            <div class="form-floating g-2">
                                                                <input type="text" class="form-control" id="captcha" name="captcha" placeholder="請輸入驗證碼" required/>
                                                                <label for="captcha">驗證碼 <span class="text-danger">*</span></label>
                                                            </div>
                                                        </div> -->

                            <!-- 清除重填、送出按鈕 -->
                            <div class="col-12 d-flex flex-row align-items-center justify-content-center g-2">
                                <button type="reset"
                                    class="btn-reset w-100 mx-1 py-1">{{ __('content_contact_us_list_clear') }}</button>
                                <button type="submit"
                                    class="btn-send w-100 mx-1 py-1">{{ __('content_contact_us_list_submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
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
            $('#contactForm')[0].reset();
        });

        // slick slider for hostSlick
        // 這裡可以根據需要調整 slick 的參數
        // 電腦4, 平板3, 手機2, 小手機1
        // 自動輪播
        var hostSlick = $('.hotSlick').slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 300,
            centerPadding: '100px',
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            pauseOnHover: true,
            responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }, {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }],


        });

        var hotSwiper = new Swiper(".hotSwiper", {
            // slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            speed: 2500,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1200: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 2,
                },
                576: {
                    slidesPerView: 1,
                },
            }
        });

        var linkSwiper = new Swiper(".linksSwiper", {
            // slidesPerView: 4,
            // spaceBetween: 30,
            freeMode: true,
            loop: true,
            speed: 2500,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            // navigation: {
            //     nextEl: ".swiper-button-next",
            //     prevEl: ".swiper-button-prev",
            // },
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 15
                },
            }
        });
    </script>
@endpush
