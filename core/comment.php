<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

class Widget_Comments_Recent extends Widget_Abstract_Comments
{
    public function __construct($request, $response, $params = NULL)
    {
        parent::__construct($request, $response, $params);
        $this->parameter->setDefault(array('pageSize' => 7, 'parentId' => 0));
    }

    public function execute()
    {
        $select = $this->select()->limit($this->parameter->pageSize)
            ->where('table.comments.status = ?', 'approved')
            ->order('table.comments.coid', Typecho_Db::SORT_DESC);
        if ($this->parameter->parentId) {
            $select->where('cid = ?', $this->parameter->parentId);
        }
        if ($this->options->commentsShowCommentOnly) {
            $select->where('type = ?', 'comment');
        }
        $select->where('ownerId <> authorId');
        $this->db->fetchAll($select, array($this, 'push'));
    }
}

/**
 * 评论添加 @
 * @param $coid
 * @return void
 */
function getCommentAt($coid)
{
    $db = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($prow && $parent != '0') {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        echo '<span class="comment-at">@' . $arow['author'] . '</span>';
    }
}

/**
 * 评论作者
 * @param $obj
 * @param $autoLink
 * @param $noFollow
 * @return void
 */
function getCommentAuthor($obj, $autoLink = NULL, $noFollow = NULL)
{
    $options = Helper::options();
    $autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;
    $noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;
    if ($obj->url && $autoLink) {
        echo '<a href="' . $obj->url . '"' . ($noFollow ? ' rel="external nofollow"' : NULL) . (strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"') . '>' . $obj->author . '</a>';
    } else {
        echo $obj->author;
    }
}
