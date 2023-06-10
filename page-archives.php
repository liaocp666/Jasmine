<?php
/**
 * 归档页面
 *
 * @package custom
 */
if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>
<!DOCTYPE html>
<html lang="zh">
<?php $this->need("header.php"); ?>
<body class="jasmine-body">
<div class="jasmine-container grid grid-cols-12">
<?php $this->need("component/sidebar-left.php"); ?>
        <div class="flex col-span-12 lg:col-span-8 flex-col border-x-2 border-stone-100 dark:border-neutral-600 lg:pt-0 lg:px-6 pb-10 px-3">
            <?php $this->need("component/menu.php"); ?>
            <div class="flex flex-col gap-y-12">
                <div></div>
                <div class="mx-1 flex flex-col">
                    <div></div>
                    <div class="flex flex-row" itemscope itemtype="https://schema.org/NewsArticle">
                        <div class="mr-3 flex flex-1 flex-col justify-center gap-y-3">
                            <h2 class="text-3xl font-semibold jasmine-primary-color" itemprop="headline">
                                标签
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="flex px-3">
                    <?php
                    $this->widget("Widget_Metas_Tag_Cloud", "sort=mid&ignoreZeroCount=1&desc=0")->to($tags);
                    if ($tags->have()): ?>
                        <ul class="flex flex-row flex-wrap gap-y-6 gap-x-8">
                            <?php while ($tags->next()): ?>
                                <li class="nav-item">
                                    <a class="nav-link dark:text-gray-400" href="<?php $tags->permalink(); ?>" rel="tag"
                                       title="<?php $tags->name(); ?>">
                                        <?php $tags->name(); ?>
                                        <span
                                            class="bg-black text-white rounded-lg px-[0.65em] py-[0.35em] text-[0.75em]"><?php $tags->count(); ?></span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif;
                    ?>
                </div>
                <div class="mx-1 flex flex-col">
                    <div></div>
                    <div class="flex flex-row" itemscope itemtype="https://schema.org/NewsArticle">
                        <div class="mr-3 flex flex-1 flex-col justify-center gap-y-3">
                            <h2 class="text-3xl font-semibold jasmine-primary-color" itemprop="headline">
                                分类
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="flex px-3">
                    <?php $this->widget("Widget_Metas_Category_List")->to($categories); ?>
                    <?php if ($categories->have()): ?>
                        <ul class="flex flex-row flex-wrap gap-y-6 gap-x-8">
                            <?php while ($categories->next()): ?>
                                <li class="nav-item">
                                    <a class="nav-link dark:text-gray-400" href="<?php $categories->permalink(); ?>" rel="tag"
                                       title="<?php $categories->name(); ?>">
                                        <?php $categories->name(); ?>
                                        <span
                                            class="bg-black text-white rounded-lg px-[0.65em] py-[0.35em] text-[0.75em]"><?php $categories->count(); ?></span>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="mx-1 flex flex-col">
                    <div></div>
                    <div class="flex flex-row" itemscope itemtype="https://schema.org/NewsArticle">
                        <div class="mr-3 flex flex-1 flex-col justify-center gap-y-3">
                            <h2 class="text-3xl font-semibold jasmine-primary-color" itemprop="headline">
                                文章
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="flex px-3 flex-col">
                    <?php
                    $archives = getArchives($this);
                    $number = 0;
                    foreach ($archives as $year => $posts) {
                      $open = $number === 0 ? null : " closed";
                      echo '<h2 class="archive-year title text-2xl my-2 dark:text-neutral-300 jasmine-primary-color">' .
                        $year .
                        " 年</h2>";
                      echo '<ol id="flex flex-col archive-list-' .
                        $year .
                        '" class="archive-list jasmine-primary-color' .
                        $open .
                        '">';
                      foreach ($posts as $created => $post) {
                        if (isShuoShuoType($post["cid"])) {
                          continue;
                        }
                        echo '<li class="archive-item py-1"><a href="' .
                          $post["permalink"] .
                          '" class="no-line dark:text-gray-400">
				<span class="archive-date">' .
                          date("m-d", $created) .
                          '</span> · 
				' .
                          $post["title"] .
                          '
				</a></li>';
                      }
                      echo "</ol>";
                      $number++;
                    }
                    ?>
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
