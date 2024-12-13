<?php use widget\CategorySub;

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php CategorySub::alloc(['parent' => $this->pageRow->mid])->to($categoies) ?>
<?php if ($categoies->have()): ?>
    <div class="card border-0 py-1 col-12">
        <div class="d-flex column-gap-3 sub-category">
            <a class="px-3 py-2" href="<?php $this->archiveUrl(); ?>" title="<?php $this->archiveTitle(); ?>">
                <?php $this->archiveTitle(); ?>
            </a>
            <?php while ($categoies->next()): ?>
                <a class="px-3 py-2 " href="<?php $categoies->permalink(); ?>" title="<?php $categoies->name(); ?>">
                    <?php $categoies->name(); ?>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>