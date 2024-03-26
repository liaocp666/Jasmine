<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="flex flex-col lg:mb-16 py-3   dark:dark:text-gray-500"">
    <div class="flex flex-col items-center">
        <div class="flex flex-row gap-x-1 items-center footer">
            <iconify-icon icon="tabler:copyright" class="text-gray-800 dark:dark:text-gray-400""></iconify-icon>
            <span><?php echo getCopyrightDate(); ?> <?php $this->options->title(); ?>.</span>
        </div>
        <span>Theme <a href="https://github.com/liaocp666/Jasmine" title="Jasmine" target="_blank">Jasmine</a> by <a href="https://www.liaocp.cn/" title="Kent Liao" target="_blank">Kent Liao</a></span>
    </div>
</div>
<?php $this->footer(); ?>
<script>
    <?php $this->options->customScript(); ?>
    //增加一个加载主题时的回调 add by xiaoa.me
    function CustomThemeCallback(theme) {
        //console.log('current:'+theme);
    }
    CustomThemeCallback(localStorage.theme);
</script>
