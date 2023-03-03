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
                                        <a class="nav-link" aria-current="page" href="<?php echo $menu['url']; ?>" target="<?php echo ($menu['newTab']) ? '_blank' : '_self' ?>"><?php echo $menu['name']; ?></a>
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
        <div id="sticky" class="pb-4 mb-5">
            <div class="row">
                <div class="col-6 mb-5">
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <a href="">
                                <img width="130" height="90" src="./resources/thumbnails/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title py-1">
                                <a href="">
                                    <h2 class="fs-6">醉美故里枣花香</h2>
                                </a>
                            </div>
                            <div class="excerpt py-1">
                                <p>
                                    在我工作的大院里，长着10多棵枣树。每到枣花盛开的季节，满院子都弥漫着枣花绵绵悠长的清香，如窖藏多年的老酒，醇厚绵柔甘洌。闻着这些熟悉的芳香，我情不自禁地想起在红枣树下度过的清纯时光，思绪也随之飘向了故乡。</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <a href="">
                                <img width="130" height="90" src="./resources/thumbnails/2.jpg" alt="">
                            </a>
                        </div>
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title py-1">
                                <a href="">
                                    <h2 class="fs-6">远去的村庄</h2>
                                </a>
                            </div>
                            <div class="excerpt py-1">
                                <p>
                                    夕阳从淡蓝的天空慢慢退去，满目的灯盏，慰藉着我迷茫的张望，这是来自我心灵深处的追寻，我在追寻自己记忆深处那永远的乡村，它是我今生埋在心底的最美的地方。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <a href="">
                                <img width="130" height="90" src="./resources/thumbnails/3.jpg" alt="">
                            </a>
                        </div>
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title py-1">
                                <a href="">
                                    <h2 class="fs-6">童年时，我们一起走过的夏天</h2>
                                </a>
                            </div>
                            <div class="excerpt py-1">
                                <p>
                                    童年时，我们一起走过的夏天
                                    作者: 张军霞2023年02月23日优美散文
                                    夏风微凉的傍晚，我坐在露台的秋千架上看书，镂空的篱笆墙上爬着满架蔷薇。风中传来的，却是篱笆另一侧邻居家两个小朋友玩过家家的声音。一个说："你的布娃娃生病了，我是医生，要给它打一针。"另一个说："打针太疼，不好玩，还是我来当妈妈，做一锅好吃的豆角饭……"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="item d-flex">
                        <div class="thumbnail">
                            <a href="">
                                <img width="130" height="90" src="./resources/thumbnails/4.jpg" alt="">
                            </a>
                        </div>
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title py-1">
                                <a href="">
                                    <h2 class="fs-6">故乡的炊烟</h2>
                                </a>
                            </div>
                            <div class="excerpt py-1">
                                <p>
                                    乡的炊烟，总是伴着日出日落的脚步袅袅升起。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="article" class="mb-5">
            <div class="row">
                <div class="col">
                    <div class="item d-flex mb-5">
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title">
                                <a href="">
                                    <h2 class="fs-5">
                                        醉美故里枣花香</h2>
                                </a>
                            </div>
                            <div class="excerpt">
                                <p>
                                    在我工作的大院里，长着10多棵枣树。每到枣花盛开的季节，满院子都弥漫着枣花绵绵悠长的清香，如窖藏多年的老酒，醇厚绵柔甘洌。闻着这些熟悉的芳香，我情不自禁地想起在红枣树下度过的清纯时光，思绪也随之飘向了故乡。</p>
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <div class="left">
                                                    <span>
                                                        <a href="">散文</a>
                                                    </span>
                                    <span class="middotDivider"></span>
                                    <span>
                                                    发表于 X 日前
                                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="">
                                <img width="170" height="130" src="./resources/thumbnails/4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="item d-flex mb-5">
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title">
                                <a href="">
                                    <h2 class="fs-5">
                                        远去的村庄</h2>
                                </a>
                            </div>
                            <div class="excerpt">
                                <p>
                                    夕阳从淡蓝的天空慢慢退去，满目的灯盏，慰藉着我迷茫的张望，这是来自我心灵深处的追寻，我在追寻自己记忆深处那永远的乡村，它是我今生埋在心底的最美的地方。</p>
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <div class="left">
                                                    <span>
                                                        <a href="">散文</a>
                                                    </span>
                                    <span class="middotDivider"></span>
                                    <span>
                                                    发表于 X 日前
                                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item d-flex mb-5">
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title">
                                <a href="">
                                    <h2 class="fs-5">
                                        童年时，我们一起走过的夏天</h2>
                                </a>
                            </div>
                            <div class="excerpt">
                                <p>
                                    夏风微凉的傍晚，我坐在露台的秋千架上看书，镂空的篱笆墙上爬着满架蔷薇。风中传来的，却是篱笆另一侧邻居家两个小朋友玩过家家的声音。一个说："你的布娃娃生病了，我是医生，要给它打一针。"另一个说："打针太疼，不好玩，还是我来当妈妈，做一锅好吃的豆角饭……"</p>
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <div class="left">
                                                    <span>
                                                        <a href="">散文</a>
                                                    </span>
                                    <span class="middotDivider"></span>
                                    <span>
                                                    发表于 X 日前
                                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="">
                                <img width="170" height="130" src="./resources/thumbnails/3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="item d-flex mb-5">
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title">
                                <a href="">
                                    <h2 class="fs-5">
                                        醉美故里枣花香</h2>
                                </a>
                            </div>
                            <div class="excerpt">
                                <p>
                                    在我工作的大院里，长着10多棵枣树。每到枣花盛开的季节，满院子都弥漫着枣花绵绵悠长的清香，如窖藏多年的老酒，醇厚绵柔甘洌。闻着这些熟悉的芳香，我情不自禁地想起在红枣树下度过的清纯时光，思绪也随之飘向了故乡。</p>
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <div class="left">
                                                    <span>
                                                        <a href="">散文</a>
                                                    </span>
                                    <span class="middotDivider"></span>
                                    <span>
                                                    发表于 X 日前
                                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="">
                                <img width="170" height="130" src="./resources/thumbnails/4.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="item d-flex mb-5">
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title">
                                <a href="">
                                    <h2 class="fs-5">
                                        远去的村庄</h2>
                                </a>
                            </div>
                            <div class="excerpt">
                                <p>
                                    夕阳从淡蓝的天空慢慢退去，满目的灯盏，慰藉着我迷茫的张望，这是来自我心灵深处的追寻，我在追寻自己记忆深处那永远的乡村，它是我今生埋在心底的最美的地方。</p>
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <div class="left">
                                                    <span>
                                                        <a href="">散文</a>
                                                    </span>
                                    <span class="middotDivider"></span>
                                    <span>
                                                    发表于 X 日前
                                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item d-flex mb-5">
                        <div class="content d-flex flex-column justify-content-between">
                            <div class="title">
                                <a href="">
                                    <h2 class="fs-5">
                                        童年时，我们一起走过的夏天</h2>
                                </a>
                            </div>
                            <div class="excerpt">
                                <p>
                                    夏风微凉的傍晚，我坐在露台的秋千架上看书，镂空的篱笆墙上爬着满架蔷薇。风中传来的，却是篱笆另一侧邻居家两个小朋友玩过家家的声音。一个说："你的布娃娃生病了，我是医生，要给它打一针。"另一个说："打针太疼，不好玩，还是我来当妈妈，做一锅好吃的豆角饭……"</p>
                            </div>
                            <div class="meta d-flex justify-content-between">
                                <div class="left">
                                                    <span>
                                                        <a href="">散文</a>
                                                    </span>
                                    <span class="middotDivider"></span>
                                    <span>
                                                    发表于 X 日前
                                                    </span>
                                </div>

                            </div>
                        </div>
                        <div class="thumbnail">
                            <a href="">
                                <img width="170" height="130" src="./resources/thumbnails/3.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pagination" class="mb-5">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="">加载更多文章</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
