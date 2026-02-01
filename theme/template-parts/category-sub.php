<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php $parentId = (isset($this->pageRow) && is_array($this->pageRow) && !empty($this->pageRow['mid'])) ? $this->pageRow['mid'] : $this->categories[0]['mid']; ?>
<?php if(!empty($parentId)): ?>
    <?php Widget\Metas\Category\Rows::alloc()->to($categoies) ?>
    <?php if ($categoies->have()): ?>
        <div class="card border-0 py-1 col-12">
            <div class="d-flex flex-wrap row-gap-2 column-gap-3 sub-category">
                <a class="px-3 py-2" href="<?php $this->archiveUrl(); ?>" title="<?php $this->archiveTitle(); ?>">
                    <?php $this->archiveTitle(); ?>
                </a>
                <?php while ($categoies->next()): ?>
                    <?php if($categoies->parent == $parentId): ?>
                        <a class="px-3 py-2 " href="<?php $categoies->permalink(); ?>" title="<?php $categoies->name(); ?>">
                            <?php $categoies->name(); ?>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
