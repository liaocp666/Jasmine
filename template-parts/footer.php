<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    </div>
</div>
<div style="height: 80px"></div>
<div class="container text-body-tertiary">
    <div class="row">
        <div class="col-12">
            <i class="ti ti-copyright"></i> <?php $this->options->title() ?>. All Rights Reserved. <a href="https://www.sanji.one" rel="nofollow" target="_blank">Theme Jasmine by Kent Liao.</a>
        </div>
        <div class="col-12">
            <?php $this->options->customFooter(); ?>
        </div>
    </div>
</div>
<script src="<?php $this->options->themeUrl('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/main/main.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>