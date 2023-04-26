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
    <li id="<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
    ?>">
        <div class="d-flex flex-start mb-3 comment-main">
            <?php if ($comments->authorId == $comments->ownerId) { ?>
                <img class="rounded shadow-1-strong me-2 lazyload" width="50" height="50"
                     data-original="<?php echo getAvatarByMail($comments->mail, true); ?>"
                     src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs="
                     alt="<?php $comments->author; ?>">
            <?php } else { ?>
                <img class="rounded shadow-1-strong me-2 lazyload" width="50" height="50"
                     data-original="<?php echo getAvatarByMail($comments->mail); ?>"
                     src="data:image/gif;base64,R0lGODdhAQABAPAAAMPDwwAAACwAAAAAAQABAAACAkQBADs="
                     alt="<?php $comments->author; ?>">
            <?php } ?>
            <div class="flex-grow-1 flex-shrink-1">
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div><span class="author-name">
                                <?php getCommentAuthor($comments); ?>
                                <?php if ($comments->authorId == $comments->ownerId) { ?>
                                    <span class="small author-icon">(作者)&nbsp;</span>
                                <?php } ?>
                            </span>
                            <span class="small"> <?php echo getCommentAt($comments->coid) ?> - <?php echo getHumanizedDate($comments->created); ?>
                            </span>
                            <?php if ($comments->status == 'waiting') { ?>
                                <span class="small">
                                    - 您的评论正等待审核！
                                </span>
                            <?php } ?>
                        </div>
                        <div class="comments-reply" data-no-instant>
                            <?php $comments->reply('回复'); ?>
                        </div>
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
    <div id="comments" data-no-instant>
        <?php $this->comments()->to($comments); ?>
        <?php if ($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="respond mb-5">
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="mb-3" data-no-instant>
                    <?php if (!$this->user->hasLogin()): ?>
                        <div class="d-flex flex-row gap-2 mb-2">
                            <input name="author" type="text" class="form-control" placeholder="昵称" required
                                   value="<?php $this->remember('author'); ?>" required/>
                            <input name="mail" type="email" class="form-control" placeholder="邮箱" required
                                   value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>/>
                            <input type="url" name="url" id="url" class="form-control"
                                   placeholder="网址"
                                   value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
                            <?php $security = $this->widget('Widget_Security'); ?>
                            <input type="hidden" name="_"
                                   value="<?php echo $security->getToken($this->request->getReferer()) ?>"/>
                        </div>
                    <?php endif; ?>
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
                        <div class="comments-curren-user d-flex align-items-center align-content-center">
                            <?php if ($this->user->hasLogin()): ?>
                                <img class="img-thumbnail rounded me-1" width="50" height="50"
                                     src="<?php echo getAvatarByMail($this->user->mail, true); ?>"
                                     alt="<?php $this->user->screenName(); ?>">
                                <div class="d-flex flex-column">
                                    <span><?php $this->user->screenName(); ?></span>
                                    <span>
                                        <a class="a-btn btn" href="<?php $this->options->logoutUrl(); ?>"
                                           title="注销">注销</a>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="d-flex gap-2 align-content-end justify-content-end">
                            <?php $comments->cancelReply(); ?>
                            <button type="submit" class="btn btn-dark btn-sm"><?php _e('提交评论'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <?php if ($comments->have()): ?>
            <?php $comments->listComments(); ?>
            <?php $comments->pageNav('上一页', '下一页', 0, '..'); ?>
        <?php endif; ?>
    </div>
</div>
<script>window.TypechoComment = {
        dom: function (id) {
            return document.getElementById(id)
        }, create: function (tag, attr) {
            var el = document.createElement(tag);
            for (var key in attr) {
                el.setAttribute(key, attr[key])
            }
            return el
        }, reply: function (cid, coid) {
            console.log(cid);
            var comment = this.dom(cid), response = this.dom("<?php $this->respondId(); ?>"),
                input = this.dom("comment-parent"),
                form = "form" == response.tagName ? response : response.getElementsByTagName("form")[0],
                textarea = response.getElementsByTagName("textarea")[0];
            if (null == input) {
                input = this.create("input", {"type": "hidden", "name": "parent", "id": "comment-parent"});
                form.appendChild(input)
            }
            input.setAttribute("value", coid);
            console.log(form);
            if (null == this.dom("comment-form-place-holder")) {
                var holder = this.create("div", {"id": "comment-form-place-holder"});
                response.parentNode.insertBefore(holder, response)
            }
            comment.appendChild(response);
            this.dom("cancel-comment-reply-link").style.display = "";
            this.dom("cancel-comment-reply-link").className += "btn btn-dark btn-sm";
            if (null != textarea && "text" == textarea.name) {
                textarea.focus()
            }
            return false
        }, cancelReply: function () {
            var response = this.dom("<?php $this->respondId(); ?>"), holder = this.dom("comment-form-place-holder"),
                input = this.dom("comment-parent");
            if (null != input) {
                input.parentNode.removeChild(input)
            }
            if (null == holder) {
                return true
            }
            this.dom("cancel-comment-reply-link").style.display = "none";
            holder.parentNode.insertBefore(response, holder);
            return false
        }
    };</script>
