<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if ($this->allow('comment')): ?>
    <div id="comments">
        <h5 class="text-start text-border-left">评论</h5>
        <?php $comments = [];
        $this->comments()->to($comments); ?>
        <div id="<?php $this->respondId(); ?>" class="respond row">
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
                <div class="row row-gap-2">
                    <?php if ($this->user->hasLogin()): ?>
                        <div class="d-flex py-2">
                            <span class="text-body-secondary"><?php _e('登录身份：'); ?></span>
                            <span><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a></span>
                            <span>·</span>
                            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout">
                                <?php _e('退出'); ?>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="昵称" name="author" id="author"
                                   required
                            />
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control" placeholder="邮箱"
                                   name="mail" id="mail"
                                   <?php if ($this->options->commentsRequireMail): ?>required<?php endif; ?>
                            />
                        </div>
                        <div class="col-md-4">
                            <input type="url" class="form-control"
                                   name="url" id="url"
                                   <?php if ($this->options->commentsRequireUrl): ?>required<?php endif; ?>
                                   placeholder="网址<?php if (!$this->options->commentsRequireUrl): ?><?php _e('（选填）'); ?><?php endif; ?>"
                            />
                        </div>
                    <?php endif; ?>
                    <div class="col-md-12">
                                    <textarea class="form-control" rows="5" name="text" id="textarea" required
                                              placeholder="<?php _e('说点什么吧…'); ?>"></textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end text">
                            <div class="cancel-comment-reply">
                                <?php $comments->cancelReply(); ?>
                            </div>
                            <button class="btn btn-dark" type="submit"><?php _e('提交评论'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row pt-4" id="comment-list">
            <?php if ($comments->have()): ?>

                <?php $comments->listComments(array(
                    'commentStatus' => _t('你的评论正等待审核'),
                    'avatarSize' => 64,
                    'defaultAvatar' => 'identicon',
                    'before' => '<div class="card border-0">',
                    'after' => '</div>',
                )); ?>

                <div class="d-flex justify-content-center align-items-center my-3" id="pagination">
                    <nav>
                        <?php $comments->pageNav(_t('&laquo;'), _t('&raquo;'), 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center align-items-center column-gap-3 my-0', 'itemTag' => 'li')); ?>
                    </nav>
                </div>

            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <h5 class="text-start text-border-left"><?php _e('评论已关闭'); ?></h5>
<?php endif; ?>
