<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<?php
$cids = getStickyPost();
if (null != $cids): ?>
    <div class="flex flex-wrap flex-col lg:flex-row gap-y-12 border-b border-stone-100 dark:border-neutral-600"">
        <div class="w-1/2 hidden lg:block"></div>
        <div class="w-1/2"></div>
        <?php foreach ($cids as $cid): ?>
            <?php $this->widget("Widget_Archive@jasmine" . $cid, "pageSize=1&type=post", "cid=" . $cid)->to($item); ?>
            <div class="flex lg:w-1/2 w-full flex-row">
                <?php if ($thumbnail = getThumbnail($item->cid, "")): ?>
                    <a href="<?php $item->permalink(); ?>" title="<?php $item->title(); ?>" class="w-[130px] mr-3"
                       title="<?php $item->title(); ?>">
                        <img
                            src="<?php echo $thumbnail; ?>"
                            alt="" width="130"
                            height="90"
                            alt="<?php $item->title(); ?>"
                            loading="lazy"
                            class="h-[90px] w-[130px] rounded object-cover"/>
                    </a>
                <?php endif; ?>
                <div class="flex flex-1 flex-col justify-between overflow-hidden break-words mr-3">
                    <h2 class="line-clamp-1 text-lg jasmine-link-color-hover text-black dark:text-neutral-200">
                        <a href="<?php $item->permalink(); ?>"
                           title="<?php $item->title(); ?>"><?php $item->title(); ?></a>
                    </h2>
                    <p class="line-clamp-2 jasmine-letter-spacing overflow-hidden break-all dark:text-gray-400">
                        <a href="<?php $item->permalink(); ?>"><?php echo $item->excerpt(500, ""); ?></a>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="w-1/2 hidden lg:block"></div>
        <div class="w-1/2"></div>
    </div>
<?php endif;


?>
