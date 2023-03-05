<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <div id="<?php $comments->theId(); ?>" class="d-flex flex-start mb-3">
            <img class="rounded shadow-1-strong me-2" width="50" height="50"
                 src="<?php echo getAvatarByMail($comments->mail); ?>"
                 alt="<?php $comments->author; ?>">
            <div class="flex-grow-1 flex-shrink-1">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div><span class="author-name"><?php CommentAuthor($comments); ?></span>
                            <span class="small"> - <?php echo humanizedDate($comments->created); ?>
                            </span>
                            <?php if ($comments->authorId == $comments->ownerId) { ?>
                                <span class="small author-icon"> - 作者</span>
                            <?php } ?>
                            <?php if ($comments->status == 'waiting') { ?>
                                <span class="small">
                                    - 您的评论正等待审核！
                                </span>
                            <?php } ?>
                        </div>
                        <a href="">
                            <?php $comments->reply(); ?>
                        </a>
                    </div>
                    <div class="comment-content">
                        <?php $comments->content(); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children d-flex flex-start">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php } ?>
<div class="col-12">
    <div id="comments">
        <?php $this->comments()->to($comments); ?>
        <?php if ($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond mb-5">
                <div class="cancel-comment-reply">
                    <?php $comments->cancelReply(); ?>
                </div>
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="mb-3">
                    <div class="d-flex mb-3">
                        <div class="form-floating w-100">
                            <textarea rows="8" cols="50" name="text" id="textarea"
                                      class="form-control comments-textarea"
                                      required
                                      placeholder="请输入评论内容"><?php $this->remember('text'); ?></textarea>
                            <label for="floatingTextarea">请输入评论内容</label>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <?php if (!$this->user->hasLogin()): ?>
                            <div class="d-flex flex-row gap-2">
                                <input name="author" type="text" class="form-control" placeholder="昵称" required
                                       value="<?php $this->remember('author'); ?>" required/>
                                <input name="email" type="email" class="form-control" placeholder="邮箱" required
                                       value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>/>
                                <input type="url" name="url" id="url" class="form-control"
                                       placeholder="网址"
                                       value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dark btn-sm"><?php _e('提交评论'); ?></button>
                            </div>
                        <?php else: ?>
                            <div class="comments-curren-user d-flex align-items-center align-content-center">
                                <img class="img-thumbnail rounded me-1" width="50" height="50"
                                     src="<?php echo getAvatarByMail($this->user->mail); ?>"
                                     alt="<?php $this->user->screenName(); ?>">
                                <div class="d-flex flex-column">
                                    <span><?php $this->user->screenName(); ?></span>
                                    <a class="link-warning" href="<?php $this->options->logoutUrl(); ?>"
                                       title="注销">注销</a>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-dark btn-sm"><?php _e('提交评论'); ?></button>
                            </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <h3><?php _e('评论已关闭'); ?></h3>
        <?php endif; ?>

        <?php if ($comments->have()): ?>
            <?php $comments->listComments(); ?>
            <?php $comments->pageNav('上一页', '下一页', 0, '..'); ?>
        <?php endif; ?>
    </div>

</div>
