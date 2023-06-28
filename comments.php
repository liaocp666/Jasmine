<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
}

function threadedComments($comments, $options)
{
  $commentClass = "";
  if ($comments->authorId) {
    if ($comments->authorId == $comments->ownerId) {
      $commentClass .= " comment-by-author";
    } else {
      $commentClass .= " comment-by-user";
    }
  }
  ?>
    <li id="<?php $comments->theId(); ?>"
        class="flex flex-col gap-y-4 py-7 border-b-2 border-stone-100 dark:border-neutral-600 comment-body<?php
        if ($comments->levels > 0) {
          echo " comment-child";
          $comments->levelsAlt(" comment-level-odd", " comment-level-even");
        } else {
          echo " comment-parent";
        }
        $comments->alt(" comment-odd", " comment-even");
        echo $commentClass;
        ?>">
        <div class="flex w-full gap-x-2 grow">
            <?php if ($comments->authorId == $comments->ownerId) { ?>
                <img class="rounded w-[50px] h-[50px] object-cover" width="50" height="50"
                     src="<?php echo getAvatarByMail($comments->mail, true); ?>"
                     loading="lazy"
                     alt="<?php $comments->author; ?>">
            <?php } else { ?>
                <img class="rounded w-[50px] h-[50px] object-cover" width="50" height="50"
                     src="<?php echo getAvatarByMail($comments->mail); ?>"
                     loading="lazy"
                     alt="<?php $comments->author; ?>">
            <?php } ?>
            <div class="flex flex-col w-full">
                <div class="flex justify-between">
                    <div class="whitespace-nowrap"><span class="author-name ">
                                <?php getCommentAuthor($comments); ?>
                            <?php if ($comments->authorId == $comments->ownerId) { ?>
                                <span class="small  author-icon">(作者)&nbsp;</span>
                            <?php } ?>
                            </span>
                        <span
                            class="small  text-sm dark:text-gray-400"> <?php echo getHumanizedDate(
                              $comments->created
                            ); ?>
                            </span>
                        <?php if ($comments->status == "waiting") { ?>
                            <span class="small dark:text-gray-300">
                                    - 您的评论正等待审核！
                                </span>
                        <?php } ?>
                    </div>
                    <div class="comments-reply bg-black text-white rounded px-2 text-sm py-1  whitespace-nowrap" data-no-instant>
                        <?php $comments->reply("回复"); ?>
                    </div>
                </div>
                <div class="comment-content  dark:text-gray-400 break-all">
                <?php echo getCommentAt($comments->coid); ?> <?php $comments->content(); ?>
                </div>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <div class="comment-children">
                <?php $comments->threadedComments($options); ?>
            </div>
        <?php } ?>
    </li>
<?php
}
?>
<div class="">
    <div id="comments" data-no-instant>
        <?php $this->comments()->to($comments); ?>
        <?php if ($this->allow("comment")): ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
                <form method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form"
                      class="flex flex-col gap-y-2"
                      data-no-instant>
                    <?php if (!$this->user->hasLogin()): ?>
                        <div class="flex flex-row md:flex-nowrap flex-wrap w-full gap-x-2 gap-y-2 grid grid-cols-3">
                            <input name="author" type="text"
                                   class="dark:!bg-[#0d1117] dark:border-black dark:!text-gray-400 col-span-3 md:col-span-1 border-[#ced4da] border rounded px-2 py-2"
                                   placeholder="昵称" required
                                   value="<?php $this->remember("author"); ?>" required/>
                            <input name="mail" type="email"
                                   class="dark:!bg-[#0d1117] dark:border-black dark:!text-gray-400 col-span-3 md:col-span-1 border-[#ced4da] border rounded px-2 py-2"
                                   placeholder="邮箱" required
                                   value="<?php $this->remember("mail"); ?>" <?php if (
  $this->options->commentsRequireMail
): ?> required<?php endif; ?>/>
                            <input type="url" name="url" id="url"
                                   class="dark:!bg-[#0d1117] dark:border-black dark:!text-gray-400 col-span-3 md:col-span-1 border-[#ced4da] border rounded px-2 py-2"
                                   placeholder="网址"
                                   value="<?php $this->remember("url"); ?>"<?php if (
  $this->options->commentsRequireURL
): ?> required<?php endif; ?> />
                            <?php $security = $this->widget("Widget_Security"); ?>
                            <input type="hidden" name="_"
                                   value="<?php echo $security->getToken($this->request->getReferer()); ?>"/>
                        </div>
                    <?php endif; ?>
                    <div class="basis-full">
                            <textarea rows="6" cols="40" name="text" id="textarea"
                                      class="w-full border-[#ced4da] border rounded px-2 py-2 dark:!bg-[#0d1117] dark:border-black dark:!text-gray-400"
                                      required
                                      placeholder="请输入评论内容"><?php $this->remember("text"); ?></textarea>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="comments-curren-user flex gap-x-2">
                            <?php if ($this->user->hasLogin()): ?>
                                <img class="img-thumbnail rounded me-1" width="50" height="50"
                                     src="<?php echo getAvatarByMail($this->user->mail, true); ?>"
                                     loading="lazy"
                                     alt="<?php $this->user->screenName(); ?>">
                                <div class="flex flex-col">
                                    <span class=""><?php $this->user->screenName(); ?></span>
                                    <span>
                                        <a class="jasmine-primary-bg text-white rounded px-1 text-sm "
                                           href="<?php $this->options->logoutUrl(); ?>"
                                           title="注销">注销</a>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="">
                            <?php $comments->cancelReply(); ?>
                            <button type="submit"
                                    class="bg-black text-white rounded px-2 py-1 ml-2 "><?php _e(
                                      "提交评论"
                                    ); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <?php if ($comments->have()): ?>
            <?php $comments->listComments(); ?>
            <?php $comments->pageNav("上一页", "下一页", 0, ".."); ?>
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
