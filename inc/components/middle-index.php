<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-lg-8 col-md-12">
    <div id="middle">
        <?php $this->need('inc/components/middle-header.php'); ?>
        <?php if ($this->is('index') && $this->_currentPage == 1): ?>
            <?php $this->need('inc/components/sticky.php'); ?>
        <?php endif; ?>
        <div id="article" class="mb-5">
            <div class="row">
                <?php while ($this->next()): ?>
                    <div class="col-12" itemscope itemtype="https://schema.org/NewsArticle">
                        <div class="item d-flex mb-5 justify-content-between position-relative">
                        <?php if (isShuoShuoType($this->cid)): ?>
                            <?php $this->need('inc/components/shuoshuo-item.php'); ?>
                        <?php else: ?>
                            <?php $this->need('inc/components/default-item.php'); ?>
                        <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div id="pagination" class="mb-5">
            <nav aria-label="Page navigation">
                <?php $this->pageNav('‹', '›', 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center', 'itemTag' => 'li', 'currentClass' => 'page-current',)); ?>
            </nav>
        </div>
    </div>
</div>
