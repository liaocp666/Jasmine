<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<div class="flex py-10 justify-center">
    <div class="bg-block"></div>
    <nav aria-label="Page navigation" id="page-nav">
        <?php $this->pageNav("‹", "›", 1, "...", [
          "wrapTag" => "ul",
          "wrapClass" => "flex gap-x-5",
          "itemTag" => "li",
          "currentClass" => "active",
        ]); ?>
    </nav>
</div>
