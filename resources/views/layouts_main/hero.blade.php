<style>
@foreach ($heroSlides as $key => $hero)
    /* CSS for each hero slide */
    #hero .item{{ $key + 1 }} {
        background-image: url({{ asset('uploads/'.$hero->translate(App::getLocale())->image_624) }});
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        #hero .item{{ $key + 1 }} {
            background-image: url({{ asset('uploads/'.$hero->translate(App::getLocale())->image_1024) }});
        }
    }

    @media (min-width: 1024px) and (max-width: 1440px) {
        #hero .item{{ $key + 1 }} {
            background-image: url({{ asset('uploads/'.$hero->translate(App::getLocale())->image_1280) }});
        }
    }

    @media (min-width: 1440px) {
        #hero .item{{ $key + 1 }} {
            background-image: url({{ asset('uploads/'.$hero->translate(App::getLocale())->image_1920) }});
        }
    }

@endforeach
</style>



<!-- Carousel Start -->
<div class="site-blocks-cover overlay" data-aos="fade" data-stellar-background-ratio="0.5">
    <div id="hero" class="site-blocks-cover2 overlay2">
        <div class="swiper heroSwiper">
            <div class="swiper-wrapper">
                @foreach ($heroSlides as $key => $hero)
                    <div class="swiper-slide item{{ $key + 1 }}"></div>
                @endforeach
                {{-- <div class="swiper-slide item1">
                </div>
                <div class="swiper-slide item2">
                </div>
                <div class="swiper-slide item3">
                </div> --}}
            </div>
            <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div> -->
        </div>
    </div>
</div>
<!-- Carousel End -->
