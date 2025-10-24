<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

require_once __DIR__ . '/widget/HotPost.php';
require_once __DIR__ . '/widget/TopUpContent.php';
require_once __DIR__ . '/widget/CategorySub.php';

function threadedComments($comments, $options) {
    $commentClass = '';

    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= " comment-by-author"; 
        } else {
            $commentClass .= " comment-by-user";
        }
    }
?>

    <div id="<?php  $comments->theId(); ?>" class="py-2 <?php  if ($comments->levels > 0) { echo "psŭ pb-0 comment-child"; $comments->levelsAlt(" comment-level-odd", " comment-level-even"); } else { echo "mb-2 border-bottom border-light-subtle comment-parent"; } $comments->alt(" comment-odd", " comment-even"); echo $commentClass; ?>">
        <div class="d-flex column-gap-3">
            <?php  $comments->gravatar(50, $options->defaultAvatar, $options->avatarHighRes); ?>
            <div class="d-flex flex-column row-gap-2 flex-fill align-content-between justify-content-between">
                <div class="d-flex justify-content-between">
                    <div class="whitespace-nowrap">
                        <span class="author-name ">
                                <?php  $options->beforeAuthor(); $comments->author(); $options->afterAuthor(); ?>
                        </span>
                        <time itemprop="commentTime" class="text-body-secondary"
                              datetime="<?php  $comments->date("c"); ?>">
                            <?php  $options->beforeDate(); $comments->date($options->dateFormat); $options->afterDate(); ?>
                        </time>
                        <?php  if ("approved" !== $comments->status) { ?>
                            <em class="comment-awaiting-moderation"><?php  $options->commentStatus(); ?></em>
                        <?php  } ?>
                    </div>
                    <div class="comment-reply">
                        <?php  $comments->reply($options->replyWord); ?>
                    </div>
                </div>
                <div class="comment-content  dark:text-gray-400 break-all">
                    <?php  $comments->content(); ?>
                </div>
            </div>
        </div>

        <?php  if ($comments->children) { ?>
            <div class="comment-children">
                <?php  $comments->threadedComments($options); ?>
            </div>
        <?php  } ?>
    </div>

<?php

}
