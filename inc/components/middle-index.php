<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-8">
    <div id="middle">
        <div class="jasmine-navbar pt-5 pb-5 mb-5">
            <div class="row">
                <div class="col-10">
                    <div class="menu">
                        <ul class="nav nav-pills">
                            <?php if (!empty(getMiddleTopMenu())): ?>
                                <?php foreach (getMiddleTopMenu() as $menu): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="<?php echo $menu['url']; ?>" target="<?php echo ($menu['newTab']) ? '_blank' : '_self' ?>" title="<?php echo $menu['name']; ?>"><?php echo $menu['name']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>点击设置菜单“<a style="color: orange" href="<?php echo $this->options->siteUrl(); ?>admin/options-theme.php">设置外观 -> 中间头部菜单</a>”</p>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-2">
                    <div class="action float-end">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a href="" class="nav-link"><i class="bi bi-search"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->need('inc/components/sticky.php'); ?>
        <div id="article" class="mb-5">
            <div class="row">
                <?php while ($this->next()): ?>
                <div class="col-12">
                    <div class="item d-flex mb-5 justify-content-between">
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title">
                                <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                                    <h2 class="fs-5">
                                        <?php $this->title() ?>
                                    </h2>
                                </a>
                            </div>
                            <div class="excerpt">
                                <p><?php $this->excerpt(500, ''); ?></p>
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <div class="left">
                                    <span>
                                        <?php $this->category('<span class="middotDivider"></span>', true, '无'); ?>
                                    </span>
                                    <span class="middotDivider"></span>
                                    <span><?php echo humanizedDate($this->created); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php if ($thumbnail = getThumbnail($this->cid, '')): ?>
                        <div class="thumbnail">
                            <a href="" title="<?php $this->title() ?>">
                                <img width="170" height="130" src="<?php echo $thumbnail; ?>" alt="<?php $this->title() ?>">
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div id="pagination" class="mb-5">
            <nav aria-label="Page navigation">
                <?php $this->pageNav('‹', '›',1,'...',array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center','itemTag' => 'li','currentClass' => 'page-current',)); ?>
            </nav>
        </div>
    </div>
</div>
