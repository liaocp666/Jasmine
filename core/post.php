<?php

if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
}

/**
 * 获取热门文章
 * @param $limit    页数
 * @param $order    排序
 */
function getHotPosts($limit = 7)
{
  $db = Typecho_Db::get();
  $options = Helper::options();
  $query = $db
  	->select("DISTINCT table.contents.cid, table.contents.*")
  	->from("table.contents")
  	->join("table.relationships", "table.contents.cid = table.relationships.cid")
  	->join("table.metas", "table.metas.mid = table.relationships.mid")
  	->where("table.metas.type = ?", "category")
  	->where(
  	  "table.contents.type = ? AND table.contents.status = ? AND table.contents.created < ?",
  	  "post",
  	  "publish",
  	  $options->time
  	)
  	->order("table.contents.commentsNum", Typecho_Db::SORT_DESC)
  	->limit($limit);
  foreach (getShuoShuoCategoryIds() as $id) {
    $query->where("table.relationships.mid <> ?", $id);
  }

  $posts = $db->fetchAll(
    $query,
    [Typecho_Widget::widget("Widget_Abstract_Contents"), "filter"]
  );
  return $posts;
}

/**
 * 获取文章归档
 * @param $widget
 * @return array
 */
function getArchives($widget)
{
  $db = Typecho_Db::get();
  $rows = $db->fetchAll(
    $db
      ->select()
      ->from("table.contents")
      ->order("table.contents.created", Typecho_Db::SORT_DESC)
      ->where("table.contents.type = ?", "post")
      ->where("table.contents.status = ?", "publish")
  );

  $stat = [];
  foreach ($rows as $row) {
    $row = $widget->filter($row);
    $arr = [
      "cid" => $row["cid"],
      "title" => $row["title"],
      "permalink" => $row["permalink"],
    ];
    $stat[date("Y", $row["created"])][$row["created"]] = $arr;
  }
  return $stat;
}

class Widget_Post_Random extends Widget_Abstract_Contents
{
  public function __construct($request, $response, $params = null)
  {
    parent::__construct($request, $response, $params);
    $this->parameter->setDefault(["pageSize" => 1, "parentId" => 0, "ignoreAuthor" => false, "mid" => 0, "cid" => 0]);
  }

  public function execute()
  {
    $adapterName = $this->db->getAdapterName(); //兼容非MySQL数据库
    if (
      $adapterName == "pgsql" ||
      $adapterName == "Pdo_Pgsql" ||
      $adapterName == "Pdo_SQLite" ||
      $adapterName == "SQLite"
    ) {
      $order_by = "RANDOM()";
    } else {
      $order_by = "RAND()";
    }
    $select = $this->select()
      ->from("table.contents")
      ->join("table.relationships", "table.contents.cid = table.relationships.cid");
    if ($this->parameter->mid > 0) {
      $select->where("table.relationships.mid = ?", $this->parameter->mid);
    }
    $select
      ->where("table.contents.cid <> ?", $this->parameter->cid)
      ->where("table.contents.password IS NULL OR table.contents.password = ''")
      ->where("table.contents.type = ?", "post")
      ->limit($this->parameter->pageSize)
      ->order($order_by);
    $this->db->fetchAll($select, [$this, "push"]);
  }
}

/**
 * 当前文章分类是否为说说分类
 * @return false
 */
function isShuoShuoType($cid)
{
  $shuoshuoCategoryIds = getShuoShuoCategoryIds();
  if (empty($shuoshuoCategoryIds)) {
    return false;
  }
  $db = getDb();
  $query = $db
    ->select()
    ->from("table.relationships");
  foreach ($shuoshuoCategoryIds as $id) {
    $query->orWhere("table.relationships.cid = ? and table.relationships.mid = ?", $cid, $id);
  }
  $row = $db->fetchRow(
    $query
  );
  return !empty($row);
}
