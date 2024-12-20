<?php
/**
 * 归档页面
 *
 * @package custom
 */

use Widget\Contents\Post\Recent;
use Widget\Metas\Category\Rows;
use Widget\Metas\Tag\Cloud;

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('template-parts/header.php');
?>
<?php $this->need('template-parts/left.php'); ?>
<div class="col-md-12 col-lg-8" id="middle">
    <?php $this->need('template-parts/navbar.php'); ?>
    <div class="container-fluid p-4 d-flex flex-column row-gap-3">
        <div class="card border-0 py-3 col-12">
            <div class="d-flex column-gap-2">
                <div class="card-body p-0 d-flex flex-column justify-content-between row-gap-1 overflow-hidden lh-lg"
                     id="page-archive-category">
                    <h3><?php $this->title(); ?></h3>
                    <div class="row pb-5">
                        <?php Recent::alloc(['pageSize' => '99999'])->to($posts) ?>
                        <?php $lastYear = 0; ?>
                        <?php while ($posts->next()): ?>
                            <?php if ($lastYear == 0) {
                                $lastYear = $posts->date->year;
                                echo '<h3 class="pt-4">' . $lastYear . '</h3>';
                            }; ?>
                            <?php echo ($lastYear != ($posts->date->year)) ? '<h3 class="pt-4">' . $posts->date->year . '</h3>' : '' ?>
                            <a href="<?php $posts->permalink(); ?>" title="<?php $posts->title(); ?>">
                                <?php $posts->title(); ?><span class="text-secondary">&nbsp;&nbsp;-&nbsp;<?php $posts->date('m/d'); ?></span>
                            </a>
                            <?php $lastYear = $posts->date->year; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->need('template-parts/right.php'); ?>
<?php $this->need('template-parts/footer.php'); ?>

