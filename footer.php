<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="footer" class="text-center">
                <p><i class="bi bi-c-circle-fill"></i>&nbsp;<?php echo getCopyrightDate(); ?>
                    &nbsp;<?php $this->options->title() ?>. All Rights Reserved.</p>
                <p>
                    Theme <a href="https://github.com/liaocp666/Jasmine" title="Jasmine" target="_blank">Jasmine</a> by
                    <a href="https://github.com/liaocp666" target="_blank" title="Kent Liao">Kent Liao</a>
                </p>
                <p>Powered by <a href="https://typecho.org/" title="Tyecho" target="_blank">Typecho</a></p>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.staticfile.org/jquery/3.6.3/jquery.min.js" type="application/javascript"></script>
<script src="https://cdn.staticfile.org/sticky-sidebar/3.3.1/sticky-sidebar.min.js"
        type="application/javascript"></script>
<script src="https://cdn.staticfile.org/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
        type="application/javascript"></script>
<script src="<?php $this->options->themeUrl('assets/darken/darken.umd.js'); ?>"></script>
<script>
    $(document).ready(function () {
        new StickySidebar('#left-sidebar-sticky', {
            topSpacing: 70,
            resizeSensor: true
        })
        new StickySidebar('#right-sidebar-sticky', {})
        new StickySidebar('#right-sidebar-sticky', {})
        $(window).scroll(function () {
            if ($(document).scrollTop() > 150) {
                $('.jasmine-navbar').addClass('jasmine-navbar-sticky')
            } else {
                $('.jasmine-navbar').removeClass('jasmine-navbar-sticky')
            }
        })
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        const darkmode = new darken({
            class: "darkmode-active",
            container: "body",
            toggle: "#darkmode-button",
            timestamps: {
                dark: "20:00",
                light: "6:00",
            }
        })

        $('#backToTop').on('click', function () {
            $("html, body").animate({scrollTop: 0}, 100);
        })

    })
</script>
</body>
</html>
