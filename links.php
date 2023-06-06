<?php
/**
 * 友链页面
 *
 * @package custom
 */
if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>
<!DOCTYPE html>
<html lang="zh">
<?php $this->need("header.php"); ?>
<body class="bg-stone-100 dark:bg-[#0a0c19]" data-prismjs-copy="点击复制" data-prismjs-copy-error="按Ctrl+C复制" data-prismjs-copy-success="内容已复制！">
<div class="mx-auto md:max-w-[1200px]">
    <div class="lg:my-16 grid grid-cols-12 rounded bg-white m-1 md:m-2 lg:ml-0 lg:mr-0 dark:bg-[#161829]">
        <div class="hidden col-span-1 lg:block z-[1000]">
            <div class="min-h-screen-jasmine sticky top-16 flex flex-col flex-wrap gap-y-8" id="sidebar-left" itemscope
                 itemtype="https://schema.org/Organization">
                <div></div>
                <?php $this->need("component/logo.php"); ?>
                <?php $this->need("component/nav.php"); ?>
            </div>
        </div>
        <div class="flex col-span-12 lg:col-span-8 flex-col lg:border-x-2 border-stone-100 dark:border-neutral-600 lg:pt-0 lg:px-6 pb-10 px-3">
            <?php $this->need("component/menu.php"); ?>
            <div class="flex flex-col gap-y-12">
                <div></div>
                <?php $this->need("component/post-title.php"); ?>
                <div class="links-container container-fluid">
            <?php if(isPluginAvailable('Links')) {
            Links_Plugin::output('<a href="{url}" target="_blank" title="{title}" class="links-item" no-linkTarget>
                <div class="links-content">
                    <section class="links-avatar">
                        <img src="{image}"class="links-img lazy" />
                    </section>
                    <section class="links-profile">
                        <h4 class="links-name">{name}</h4>
                        <!-- <p class="links-description">{title}</p> 这个是站点描述想要的就把这段注释删掉-->
                    </section>
                </div>
            </a>'); }
            else {
                echo 'Links 插件未启用，若要使用友情连接功能，请安装并启用 Links 插件。';
            }?>
        </div>
                <div class="markdown-body dark:!bg-[#161829] dark:!bg-[#0d1117] !text-neutral-900 dark:!text-gray-400" itemprop="articleBody">
                    <?php $this->content(); ?>
                </div>
                <div class="flex flex-row gap-x-2 text-neutral-500" id="post-tag">
                    <?php $this->tags(" ", true, ""); ?>
                </div>
                <div class="border-b-2 border-stone-100 dark:border-neutral-600"></div>
                <div>
                    <?php $this->need("comments.php"); ?>
                </div>
            </div>
        </div>
        <div class="hidden lg:col-span-3 lg:block" id="sidebar-right">
            <?php $this->need("component/sidebar.php"); ?>
        </div>
    </div>
<style>
/* links 友情链接 */

.links-item {
	display: inline-block;
	padding: .6em;
	border-radius: 5px;
	width: 33.33%;
	margin: .2em 0;
	box-sizing: border-box
}
@media (max-width: 1200px) {
	.links-item {
		width: 33.33%
	}
}
@media (max-width: 674px) {
	.links-item {
		width: 50%
	}
}@media (max-width: 478px) {
	.links-item {
		width: 100%
	}
}

.links-item:hover {
	background: var(--light-bg)
}

.links-content {
	display: flex;
	flex-direction: row;
	color: var(--text-color);
	align-items: center;
       border: 2px solid #ccc; 
       border-radius: 7px;
}

.links-img {
	height: 3.6em;
	width: 3.6em;
	transition: transform .3s;
	border-radius: 100%;
	max-width: fit-content
}
.links-item:hover .links-img {
	transform: scale(1.05)
}

.links-profile {
	margin-left: .8em;
	line-height: 1.2;
	padding: .2em 0
}
.links-profile h4 {
	margin: 0;
	font-weight: 400;
	font-size: 0.9em;
}
.links-profile p {
	margin: 0;
	color: var(--text-gray);
	font-size: .9em;
	line-height: 1.1;
	margin-top: .4em;
}
.links-container {
	clear: both;
	width: 100%;
	margin: 2em 0;
}

</style>
    <?php $this->need("footer.php"); ?>
</div>
</body>
</html>