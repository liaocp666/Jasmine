function jasmine () {
    // 粘滞
    new StickySidebar('#right-sidebar-sticky', {})
    $(window).scroll(function () {
        if ($(document).scrollTop() > 150) {
            $('.jasmine-navbar').addClass('jasmine-navbar-sticky')
        } else {
            $('.jasmine-navbar').removeClass('jasmine-navbar-sticky')
        }
    })
    // 提示
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    // 明亮/暗黑模式
    const darkmode = new darken({
        class: "darkmode-active",
        container: "body",
        toggle: "#darkmode-button",
        timestamps: {
            dark: "20:00",
            light: "6:00",
        }
    })
    // 返回顶部
    $('#backToTop').on('click', function () {
        $("html, body").animate({scrollTop: 0}, 100);
    })
    $('#search').on('click', function () {
        $('#search-input').focus()
    })
    $('#search-mobile').on('click', function () {
        $('#search-input-mobile').focus()
    })
    $('#mobile-darkmode-button').on('click', function () {
        darkmode.toggle()
    })
    // 图片懒加载
    $("img.lazyload").lazyload();
}

$(document).ready(function () {
    jasmine();
})