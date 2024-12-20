<?php
/**
 * 分类页面
 *
 * @package custom
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('template-parts/header.php');
?>
<?php $this->need('template-parts/left.php'); ?>
<div class="col-md-12 col-lg-8" id="middle">
    <?php $this->need('template-parts/navbar.php'); ?>
    <div class="container-fluid p-4 d-flex flex-column row-gap-3">
        <div class="card border-0 py-3 col-12">
            <div class="d-flex column-gap-2">
                <div class="card-body p-0 d-flex flex-column justify-content-between row-gap-1 overflow-hidden"
                     id="page-archive-category">
                    <h3><?php $this->title(); ?></h3>
                    <div class="row pb-5">
                        <div class="col-12">
                            <?php Widget\Metas\Category\Rows::alloc()->to($categoies); ?>
                            <div class="d-flex flex-wrap column-gap-4 row-gap-2">
                                <?php while ($categoies->next()): ?>
                                    <a href="<?php $categoies->permalink(); ?>"
                                       title="<?php $categoies->name(); ?>（<?php $categoies->count(); ?>）篇文章)">
                                        <?php $categoies->name(); ?>（<?php $categoies->count(); ?>）
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->need('template-parts/right.php'); ?>
<?php $this->need('template-parts/footer.php'); ?>

