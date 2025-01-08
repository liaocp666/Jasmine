<?php

namespace widget;

use Widget\Metas\Category\Rows;

class CategorySub extends Rows {

    /**
     * 执行函数
     */
    public function execute()
    {
        $this->stack = $this->getCategories($this->getAllChildren($this->parameter->parent));
    }

}