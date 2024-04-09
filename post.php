<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>
<!DOCTYPE html>
<html lang="zh">
<?php $this->need("header.php"); ?>
<body class="jasmine-body" data-prismjs-copy="点击复制" data-prismjs-copy-error="按Ctrl+C复制" data-prismjs-copy-success="内容已复制！">
<div class="jasmine-container grid grid-cols-12">
    <?php $this->need("component/sidebar-left.php"); ?>
        <div class="flex col-span-12 lg:col-span-8 flex-col lg:border-x-2 border-stone-100 dark:border-neutral-600 lg:pt-0 lg:px-6 pb-10 px-3">
            <?php $this->need("component/menu.php"); ?>
            <div class="flex flex-col gap-y-12">
                <div></div>
                <?php $this->need("component/post-title.php"); ?>
                <div class="markdown-body dark:!bg-[#161829] dark:!bg-[#0d1117] !text-neutral-900 dark:!text-gray-400" itemprop="articleBody">
                    <?php echo handleContent($this->content); ?>
                </div>
                <div class="flex flex-row gap-x-2 flex-wrap  gap-y-2" id="post-tag">
                    <?php $this->tags(" ", true, ""); ?>
                </div>
                <!-- 文章版权说明-->
                <?php if (getOptionValueOrDefault("enablePostCopyright", "no") === "yes"): ?>
                <?php if (($this->fields->copy_link) == ''): ?>
                    <div class="post-copyright" style="word-wrap: break-word; border-radius: 10px; border: 1px solid #ddd; padding: 20px;">
                        <iconify-icon icon="tabler:user-filled" class="rounded text-gray-800 dark:text-gray-300"></iconify-icon>
                        <span class="text">版权属于：<?php $this->author(); ?></span><br>
                        <iconify-icon icon="tabler:link" class="rounded text-gray-800 dark:text-gray-300"></iconify-icon>
                        <span class="text">本文链接：<a href="<?php $this->permalink();?>"><?php $this->permalink();?></a></span><br>
                        <iconify-icon icon="tabler:share" class="rounded text-gray-800 dark:text-gray-300"></iconify-icon>
                        <span class="text">转载申明：转载请保留本文转载地址，著作权归作者所有。</span>
                    </div>
                <?php else: ?>
                    <div class="post-copyright" style="word-wrap: break-word; border-radius: 10px; border: 1px solid #ddd; padding: 20px;">
                        <iconify-icon icon="tabler:link" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                        <span class="text">本文链接：<a href="<?php $this->permalink();?>"><?php $this->permalink();?></a></span><br>
                        <iconify-icon icon="tabler:file-description" class="text-gray-800 dark:text-gray-300"></iconify-icon>
                        <span class="text">免责声明：本文主要内容转载自【<a target="_blank" rel="external noopener noreferrer nofollow" href="<?php echo $this->fields->copy_link;?>" data-toggle="tooltip" data-placement="top" title="文章来源 <?php echo $this->fields->copy_link;?>"><?php echo $this->fields->copy_link;?></a>】，仅用于学习和交流，若有侵权请邮件联系本站！</span>
                    </div>
                <?php endif;?>
                <!-- 文章版权说明结束-->
                <?php endif; ?>
                <div class="border-b-2 border-stone-100 dark:border-neutral-600"></div>
                <div>
                    <?php $this->need("comments.php"); ?>
                </div>
            </div>
        </div>
        <div class="hidden lg:col-span-3 lg:block" id="sidebar-right">
            <?php $this->need("component/sidebar.php"); ?>
        </div>
    </div>
    <?php $this->need("footer.php"); ?>
</body>
</html>
