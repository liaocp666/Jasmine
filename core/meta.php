<?php

use Widget\Metas\Category\Rows;

if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
}

class Jasmine_Meta_Row extends Rows
{
  public function __construct($request, $response, $params = null)
  {
    parent::__construct($request, $response, $params);
  }

  /**
   * 执行函数
   *
   * @throws Db\Exception
   */
  public function execute()
  {
    $this->stack = $this->getCategories(getMiddleTopCategoryIds());
  }
}

/**
 * 获取阅读量
 * @param $archive
 * @return void
 */
function getPostviews($archive)
{
  $db = Typecho_Db::get();
  $cid = $archive->cid;
  if (!array_key_exists("views", $db->fetchRow($db->select()->from("table.contents")))) {
    $db->query("ALTER TABLE `" . $db->getPrefix() . "contents` ADD `views` INT(10) DEFAULT 0;");
  }
  $exist = $db->fetchRow(
    $db
      ->select("views")
      ->from("table.contents")
      ->where("cid = ?", $cid)
  )["views"];
  if ($archive->is("single")) {
    $cookie = Typecho_Cookie::get("contents_views");
    $cookie = $cookie ? explode(",", $cookie) : [];
    if (!in_array($cid, $cookie)) {
      $db->query(
        $db
          ->update("table.contents")
          ->rows(["views" => (int) $exist + 1])
          ->where("cid = ?", $cid)
      );
      $exist = (int) $exist + 1;
      array_push($cookie, $cid);
      $cookie = implode(",", $cookie);
      Typecho_Cookie::set("contents_views", $cookie);
    }
  }
  echo $exist == 0 ? "   暂无浏览" : "" . $exist . " 人浏览";
}
