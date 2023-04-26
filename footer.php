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
                    <a href="https://www.liaocp.cn/" target="_blank" title="Kent Liao">Kent Liao</a>
                </p>
                <p>Powered by <a href="https://typecho.org/" title="Tyecho" target="_blank">Typecho</a></p>
                <?php if(!empty($this->options->icpCode)): ?>
                    <p><a href="https://beian.miit.gov.cn/" target="_blank"><?php $this->options->icpCode(); ?></a></p>
                <?php endif; ?>
                <?php
                    $custom_footer = __DIR__ . '/custom/footer.php';
                    if (file_exists($custom_footer)) {
                        include $custom_footer;
                    }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.staticfile.org/jquery/3.6.3/jquery.min.js" type="application/javascript" defer></script>
<script src="https://cdn.staticfile.org/sticky-sidebar/3.3.1/sticky-sidebar.min.js" defer type="application/javascript"></script>
<script src="https://cdn.staticfile.org/bootstrap/5.2.3/js/bootstrap.bundle.min.js" defer type="application/javascript"></script>
<script src="https://cdn.staticfile.org/smoothscroll/1.4.10/SmoothScroll.min.js" defer type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('assets/prism/prism.js'); ?>" defer type="text/javascript" data-no-instant></script>
<script src="<?php $this->options->themeUrl('assets/darken/darken.umd.js'); ?>" defer type="text/javascript"></script>
<script src="https://cdn.staticfile.org/jquery.lazyload/1.9.1/jquery.lazyload.min.js" defer type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('assets/jasmine/jasmine.js?v=1.6.6'); ?>" defer type="text/javascript" data-no-instant></script>
<script>
    <?php $this->options->customScript(); ?>
</script>
<?php if(getOptions() -> pjaxLoadPage): ?>
    <script src="https://cdn.staticfile.org/instantclick/3.1.0/instantclick.min.js" type="text/javascript"></script>
    <script data-no-instant>
        InstantClick.on('change', function(isInitialLoad) {
            if (isInitialLoad === false) {
                jasmine();
                if (typeof _hmt !== 'undefined') {
                    _hmt.push(['_trackPageview', location.pathname + location.search])
                }
                if (typeof MathJax !== 'undefined') {
                    MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
                }
                if (typeof ga !== 'undefined') {
                    ga('send', 'pageview', location.pathname + location.search);
                }
                if (typeof Prism !== 'undefined') {
                    Prism.highlightAll(true,null);
                }
            }
        });
        InstantClick.init(50);
    </script>
<?php endif; ?>
<?php $this->footer(); ?>
</body>
</html>
