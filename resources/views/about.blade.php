@extends('layouts_main.master')

@section('content')

    <div class="bg-f6 about-tab-link" >
        <div class="d-flex justify-content-center align-items-center">
            <a href="{{ localized_route('about') }}" class="ab-tb-link {{ Request::is('about') ? 'ab-tb-link-active' : '' }}">
                關於鴻盛
            </a>
            <a href="{{ localized_route('history') }}" class="ab-tb-link {{ Request::is('history') ? 'ab-tb-link-active' : '' }}">
                發展歷程
            </a>
        </div>
    </div>

    <div class="py-5 bg-about">
        <div class="container my-4">
            <div class="row justify-content-center align-items-center bg-about-content py-4">
                <div class="col-12 mb-3 mt-3">
                    <div class="hp-sc-title w-fit mx-auto text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h3>關於鴻盛</h3>
                        <div class="hp-sc-title-line mx-auto"></div>
                        <p>ABOUT US</p>
                    </div>
                </div>

                <div class="col-lg-8">
                    <p class="text-18 fw-normal my-3 wow fadeInUp" data-wow-delay="0.1s">
                        &emsp;&emsp;鴻盛建機自1980成立花蓮，以專業的技能與親切的服務態度在地深耕，技術起家的我們透過四十多年來的經驗累積，有信心提供您最佳的產業解決方案。<br><br>

                        &emsp;&emsp;從早期的零件銷售與機具維修逐漸成長為具有銷售、維修、零件以及租賃代理的全方位建設公司，我們提供一站式的服務，讓您從售前的購買到售後的服務都能享受尊爵不凡的體驗，我們希望每位走進鴻盛的客戶，都能感受到我們的熱忱與專業，並透過品質優良、性能卓越的產品有效提升工程效率並也絕您的工程困擾。<br><br>

                        &emsp;&emsp;為了更快速為您服務，2020年於桃園正式成立「台灣建設機械有限公司」，為全台灣第一家以液壓配件為主軸的建設機械公司，提供專業液壓配件、拆除手臂訂製與混凝土高壓運送車三大服務項目，透過專業改裝技術客製化您的需求，混凝土高壓運送車解決您在偌大工地傳輸的需求，最大程度提高您的工作效率。
                    </p>

                    <p class="text-center about-slogan py-3 d-flex flex-column align-items-center wow fadeInUp" data-wow-delay="0.1s">
                        <span class="text-sub mb-0">Reliable Solutions</span>
                        <span class="text-main mb-0">值得信賴的解決方案</span>
                    </p>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center align-items-center my-5 pt-4">
                <div class="col-lg-auto d-flex flex-row justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/01/a_years.gif') }}" class="img-fluid pe-lg-5 pe-2 about-slogan-img" alt="">
                    <img src="{{ asset('assets/images/01/a_area.gif') }}" class="img-fluid ps-lg-5 pe-2 about-slogan-img" alt="">
                </div>
            </div>
        </div>


    </div>

    <div class="pt-2 pb-5 bg-f6">
        <div class="about-sc-line"></div>
        <div class="container">
            <div class="row g-3">
                <div class="col-12 text-center mb-4">
                    <h4 class="text-18">案例分享</h4>
                </div>

                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/01/case01.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/01/case02.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/01/case03.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="pt-3">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center mb-4">
                    <h4 class="text-18">服務項目</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-ab-service">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 py-lg-5 py-4 my-3 text-center">
                    <img src="{{ asset('assets/images/01/a_ser_word.gif') }}" class="img-fluid w-50" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-f6">
        <div class="container">
            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-8 mb-lg-0 mb-3 order-lg-1 order-2">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-2 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon01.jpg') }}" class="img-fluid w-75 mb-2" alt="">
                            <h5 class="text-main">銷售</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                鴻盛建設機械提供您一次性購足的銷售服務，最齊全的產品線讓客戶可依據工作需求選擇合適的產品。<br>
                                每項產品皆提供實體保固並配合彈性的付款方式，所有的一切都是為了讓客戶可以享受到最好的產品及服務。
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-2 order-1 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic01.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-4 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic02.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 mb-lg-0 mb-3">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-2 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon02.jpg') }}" class="img-fluid w-75 mb-2" alt="">
                            <h5 class="text-main">維修</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                鴻盛建設機械以維修起家，技術一直是我們的核心價值，擁有超過半數的專業技術人員是我們最堅實的後盾與基礎。<br>
                                傳承40多年的經驗累積，加上原廠的技術交流，焠鍊出鴻盛如同武林高手般的手藝，可迅速排除您所遇到的疑難雜症。
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-8 mb-lg-0 mb-3 order-lg-1 order-2">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-2 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon03.jpg') }}" class="img-fluid w-75 mb-2" alt="">
                            <h5 class="text-main">零件</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                擁有40多年的經驗、快速專業的服務與材料零件的高度完整，藉由客戶的口耳相傳皆備受好評；需要零件，找鴻盛建設機械就對了。
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-2 order-1 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic03.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row justify-content-center align-content-stretch mb-4" style="min-height: 100%;">
                <div class="col-lg-4 mb-lg-0 mb-3">
                    <img src="{{ asset('assets/images/01/a_ser_pic04.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 mb-lg-0 mb-3">
                    <div class="ab-ser-box d-flex flex-lg-row flex-column justify-content-center align-items-center h-100 px-lg-5 px-3 py-4">
                        <div class="icon text-center me-lg-2 mb-lg-0 mb-3">
                            <img src="{{ asset('assets/images/01/a_ser_icon04.jpg') }}" class="img-fluid w-75 mb-2" alt="">
                            <h5 class="text-main">租賃</h5>
                        </div>
                        <div class="ab-ser-content">
                            <p class="text-18 fw-normal">
                                不論是短期工程急用、資金還是維修上的考量，鴻盛建設機械深刻地了解您的需求，特別成立租賃事業體來為您解決煩惱。<br>
                                省下添購機具的費用、也無需擔心維修上的問題，讓您的工作更順利、如虎添翼。
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection
