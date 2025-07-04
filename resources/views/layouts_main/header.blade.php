<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top site-navbar wow fadeInDown" data-wow-delay="0.1s" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
            <a href="{{ localized_route('index') }}" class="navbar-brand">
                <img class="img-fluid" src="{{ asset('assets/images/00-hp/top_logo.svg') }}" alt="Logo">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ __('why_hongsan') }}</a>
                        <div class="dropdown-menu bg-light rounded-0 m-0">
                            <a href="{{ localized_route('about') }}" class="dropdown-item">{{ __('about') }}</a>
                            <a href="{{ localized_route('history') }}" class="dropdown-item">{{ __('history') }}</a>
                        </div>
                    </div>
                    <a href="{{ localized_route('products') }}" class="nav-item nav-link">{{__('products')}}</a>
                    <a href="{{ localized_route('catetype') }}" class="nav-item nav-link">{{__('menu_applications')}}</a>
                    <a href="{{ localized_route('news') }}" class="nav-item nav-link">{{__('news')}}</a>
                    <a href="{{ localized_route('contact') }}" class="nav-item nav-link">{{__('menu_contact')}}</a>

                </div>
                <div class="border-start2 ps-lg-2">
                    {{-- <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button> --}}
                    {{-- 語系下拉選單 --}}
                    <div class="nav-item dropdown w-fit">
                        <a href="#" class="nav-link text-18 dropdown-toggle" data-bs-toggle="dropdown"
                            style="border-radius: 30px;background: #d3d3d3cc;">
                            <img src="{{ asset('assets/images/00-hp/icon_lan.png') }}" class="img-fluid" width="20"
                                alt="">
                            {{ __('language_switcher') }}
                        </a>
                        <div class="dropdown-menu bg-light rounded-0 m-0 lang" style="">
                            @php
                                $currentRouteName = Route::currentRouteName();
                                $currentRouteParameters = Route::current() ? Route::current()->parameters() : [];

                                // 移除 locale 參數，因為我們將使用新的語系
                                if (isset($currentRouteParameters['locale'])) {
                                    unset($currentRouteParameters['locale']);
                                }
                            @endphp

                            @foreach (config('translatable.locales') as $locale)
                                @if ($currentRouteName)
                                    <a href="{{ route($currentRouteName, array_merge($currentRouteParameters, ['locale' => $locale])) }}"
                                        class="dropdown-item {{ app()->getLocale() == $locale ? 'active2' : '' }}">
                                    @else
                                        <a href="{{ url($locale) }}"
                                            class="dropdown-item {{ app()->getLocale() == $locale ? 'active2' : '' }}">
                                @endif
                                @if ($locale == 'zh_TW')
                                    繁體中文
                                @elseif($locale == 'en')
                                    English
                                @else
                                    {{ $locale }}
                                @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
