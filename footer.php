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
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.staticfile.org/jquery/3.6.3/jquery.min.js" type="application/javascript" defer></script>
<script src="https://cdn.staticfile.org/sticky-sidebar/3.3.1/sticky-sidebar.min.js" defer type="application/javascript"></script>
<script src="https://cdn.staticfile.org/bootstrap/5.2.3/js/bootstrap.bundle.min.js" defer type="application/javascript"></script>
<script src="https://cdn.staticfile.org/smoothscroll/1.4.10/SmoothScroll.min.js" defer type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('assets/prism/prism.js'); ?>" defer type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('assets/darken/darken.umd.js'); ?>" defer type="text/javascript"></script>
<script src="https://cdn.staticfile.org/jquery.lazyload/1.9.1/jquery.lazyload.min.js" defer type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('assets/jasmine/jasmine.js'); ?>" defer type="text/javascript"></script>
<script>
    <?php $this->options->customScript(); ?>
</script>
<?php $this->footer(); ?>
</body>
</html>
