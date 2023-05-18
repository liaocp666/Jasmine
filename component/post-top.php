<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
    exit();
} ?>

<?php
$cids = getStickyPost();
if (null != $cids): ?>
    <div class="flex flex-wrap gap-y-12 border-b-2 border-stone-100">
        <div class="w-1/2"></div>
        <div class="w-1/2"></div>
        <?php foreach ($cids as $cid): ?>
            <?php $this->widget("Widget_Archive@jasmine" . $cid, "pageSize=1&type=post", "cid=" . $cid)->to($item); ?>
            <div class="flex w-1/2 flex-row">
                <?php if ($thumbnail = getThumbnail($item->cid, "")): ?>
                    <a href="<?php $item->permalink(); ?>" title="<?php $item->title(); ?>" class="w-[130px]"
                       title="<?php $item->title(); ?>">
                        <img
                            src="<?php echo $thumbnail; ?>"
                            alt="" width="130"
                            height="90"
                            alt="<?php $item->title(); ?>"
                            class="h-[90px] w-[130px] rounded object-cover"/>
                    </a>
                <?php endif; ?>
                <div class="mx-3 flex flex-1 flex-col justify-between overflow-hidden">
                    <h2 class="line-clamp-1 text-lg">
                        <a href="<?php $item->permalink(); ?>"
                           title="<?php $item->title(); ?>"><?php $item->title(); ?></a>
                    </h2>
                    <p class="line-clamp-2 text-neutral-500">
                        <a href="<?php $item->permalink(); ?>"><?php echo $item->excerpt(500, ""); ?></a>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="w-1/2"></div>
        <div class="w-1/2"></div>
    </div>
<?php endif;
?>
