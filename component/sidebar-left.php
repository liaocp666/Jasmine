<?php
if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="hidden col-span-1 lg:block z-[1000] jasmine-primary-color">
    <div class="min-h-screen-jasmine sticky top-16 flex flex-col flex-wrap gap-y-8" id="sidebar-left" itemscope
            itemtype="https://schema.org/Organization">
        <div></div>
        <?php $this->need("component/logo.php"); ?>
        <?php $this->need("component/nav.php"); ?>
    </div>
</div>