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
 * 判断当前是菜单否激活
 * @param $self
 * @return string
 */
function isActiveMenu($self, $slug): string
{
  if ($self->is("category") || $self->is("post")) {
    if ($self->category === $slug) {
      return "jasmine-primary-bg shadow-lg !text-white";
    }
  }
  return "";
}
