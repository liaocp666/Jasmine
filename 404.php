<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$this->need('header.php');
$this->need('inc/components/left-sidebar.php');
?>
    <div class="col-lg-8 col-md-12">
        <div id="middle">
            <?php $this->need('inc/components/middle-header.php'); ?>
            <div id="article" class="mb-5">
                <div class="row">
                    <div class="col-12">
                        <div class="item d-flex mb-5 justify-content-between position-relative">
                            <div class="content d-flex flex-column justify-content-between position-relative">
                                <div class="title">
                                    <h2 class="fs-3">页面不存在！</h2>
                                    <h6>请仔细检查您输入的网址是否正确。</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$this->need('inc/components/right-sidebar.php');
$this->need('footer.php');
