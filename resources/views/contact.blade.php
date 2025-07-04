@extends('layouts_main.master')

@section('content')
    <div class="pb-5 bg-f6">

        <div class="py-5 bg-contact">
            <div class="container position-relative">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h3>{{__('content_contact_us_title')}}</h3>
                            @if (App::getLocale() == 'zh_TW')
                            <div class="hp-sc-title-line mx-auto"></div>
                            <p>CONTACT US</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="picbg01 py-4 d-flex justify-content-center align-items-center wow fadeInUp"
                            data-wow-delay="0.1s">
                            <p class="text-center text-white fw-bold mb-0 d-flex flex-column align-items-center">
                                <span>{{__('page_contact_car')}}</span>
                                <span class="h4 text-white mb-0">0800-005577</span>
                                <span>{{__('page_contact_advice')}}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="picbg02 py-4 d-flex justify-content-center align-items-center wow fadeInUp"
                            data-wow-delay="0.1s">
                            <p class="text-center text-white fw-bold mb-0 d-flex flex-column align-items-center">
                                <span>{{__('page_contact_sale')}}</span>
                                <span class="h4 text-white mb-0">0965-319571</span>
                                <span>{{__('page_wy_about_content_area_b')}}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="picbg03 py-4 d-flex justify-content-center align-items-center wow fadeInUp"
                            data-wow-delay="0.1s">
                            <p class="text-center text-white fw-bold mb-0 d-flex flex-column align-items-center">
                                <span>{{__('page_contact_parts')}}</span>
                                <span class="h4 text-white mb-0">0965-031150</span>
                                <span>{{__('page_contact_lin')}}</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="picbg04 py-4 d-flex justify-content-center align-items-center wow fadeInUp"
                            data-wow-delay="0.1s">
                            <p class="text-center text-white fw-bold mb-0 d-flex flex-column align-items-center">
                                <span>{{__('page_contact_rent')}}</span>
                                <span class="h4 text-white mb-0">0965-383666</span>
                                <span>{{__('page_contact_nicky')}}</span>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="container">
            <div class="row g-4 mt-3">
                <div class="col-lg-7 d-flex flex-column flex-lg-row g-3 justify-content-around">
                    <div class="hp-contact-map col-lg-6 p-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-main">{{__('content_contact_us_map_a')}}</h5>
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29171.098843228687!2d121.594911!3d23.946739!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468a02e0c150d5b%3A0x29c511764815b983!2z6bS755ub5bu66Kit5qmf5qKw5pyJ6ZmQ5YWs5Y-4!5e0!3m2!1szh-TW!2stw!4v1751053342957!5m2!1szh-TW!2stw"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="hp-contact-map col-lg-6 p-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="text-main">{{__('content_contact_us_map_b')}}</h5>
                        <div class="map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28953.638858559443!2d121.267205!3d24.890993!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468191087a81a49%3A0xeecc7851a38dc3c!2z5Y-w54Gj5bu66Kit5qmf5qKw5pyJ6ZmQ5YWs5Y-4!5e0!3m2!1szh-TW!2stw!4v1751053525733!5m2!1szh-TW!2stw"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="text-end text-18 fw-normal mb-0">
                        （<span class="text-danger">*</span>{{__('content_contact_us_list_required')}}）
                    </p>
                    <form class="hp-contact-form">
                        <div class="row g-3">
                            <div class="col-lg-6">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="請輸入姓名" required />
                                    <label for="name">{{__('content_contact_us_list_name')}} <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="" name=""
                                        placeholder="請輸入車型" required />
                                    <label for="">{{__('content_contact_us_list_machinetype')}} <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="請輸入聯絡電話" required />
                                    <label for="phone">{{__('content_contact_us_list_phone')}} <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating g-2">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="請輸入電子郵件" required />
                                    <label for="email">{{__('content_contact_us_list_mail')}} <span class="text-danger">*</span></label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <!-- 所在地區下拉選單 -->
                                <div class="form-floating g-2">
                                    <select class="form-select" id="location" name="location" required>
                                        <option value="" selected disabled>{{__('content_contact_us_list_city_option_none')}}</option>
                                    </select>
                                    <label for="location">{{__('content_contact_us_list_city')}} <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating g-2">
                                    <input type="text" class="form-control" id="contry" name="contry"
                                        placeholder="請輸入國家" value="台灣" />
                                    <label for="contry">{{__('content_contact_us_list_country')}}</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating g-2">
                                    <textarea class="form-control" id="message" name="message" placeholder="請輸入您的聯絡內容" style="height: 150px;"></textarea>
                                    <label for="message">{{__('content_contact_us_list_message')}}</label>
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
                                <button type="reset" class="btn-reset w-100 mx-1 py-1">{{__('content_contact_us_list_clear')}}</button>
                                <button type="submit" class="btn-send w-100 mx-1 py-1">{{__('content_contact_us_list_submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
