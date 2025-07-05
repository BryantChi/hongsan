(function ($) {
    "use strict";


    $(function () {

        // 當頁面加載完成後，將 id="main" 的區域自動滾動到可視範圍內

        if ($('#main').length > 0) {
            // var mintop = 0;
            // if ($(window).width() < 768) {
            //     mintop = 30;
            // }
            $("html, body").animate(
                {
                    scrollTop: $("#main").offset().top - $('.site-navbar').height(),
                    //
                },
                1000
            ); // 1000 毫秒（1 秒）滾動到該區域
        }
    });

})(jQuery);
