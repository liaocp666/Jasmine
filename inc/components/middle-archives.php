<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div class="col-lg-8 col-md-12">
    <div id="middle">
        <?php $this->need('inc/components/middle-header.php'); ?>
        <div id="page-archives" class="mb-5">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="item d-flex flex-column">
                        <div class="head mb-2">
                            <div class="title">
                                <h2 class="fs-2">标签</h2>
                            </div>
                        </div>
                        <div id="content" class="mb-3">
                            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0')->to($tags);
                            if ($tags->have()): ?>
                                <ul class="nav nav-pills">
                                    <?php while ($tags->next()): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php $tags->permalink(); ?>" rel="tag"
                                               title="<?php $tags->name(); ?>">
                                                <?php $tags->name(); ?>
                                                <span class="badge text-bg-dark"><?php $tags->count(); ?></span>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <div class="item d-flex flex-column">
                        <div class="head mb-2">
                            <div class="title">
                                <h2 class="fs-2">分类</h2>
                            </div>
                        </div>
                        <div id="content" class="mb-3">
                            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
                            <?php if ($categories->have()): ?>
                                <ul class="nav nav-pills">
                                    <?php while ($categories->next()): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php $categories->permalink(); ?>" rel="tag"
                                               title="<?php $categories->name(); ?>">
                                                <?php $categories->name(); ?>
                                                <span class="badge text-bg-dark"><?php $categories->count(); ?></span>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="item d-flex flex-column">
                        <div class="head mb-2">
                            <div class="title">
                                <h2 class="fs-2">文章</h2>
                            </div>
                        </div>
                        <div id="content" class="mb-3">
                            <?php
                            $archives = getArchives($this);
                            $number = 0;
                            foreach ($archives as $year => $posts) {
                                $open = ($number === 0) ? NULL : ' closed';
                                echo '<h2 class="archive-year title fs-4">' . $year . ' 年</h2>';
                                echo '<ol id="archive-list-' . $year . '" class="archive-list' . $open . '">';
                                foreach ($posts as $created => $post) {
                                    echo '<li class="archive-item"><a href="' . $post['permalink'] . '" class="no-line">
				<span class="archive-date">' . date('m-d', $created) . '</span> · 
				' . $post['title'] . '
				</a></li>';
                                }
                                echo '</ol>';
                                $number++;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
