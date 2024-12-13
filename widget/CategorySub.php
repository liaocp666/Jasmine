<?php

namespace widget;

use Widget\Metas\Category\Rows;

class CategorySub extends Rows {

    /**
     * 执行函数
     */
    public function execute()
    {
        $this->pushAll($this->getRows($this->getChildIds($this->parameter->parent)));
    }

}