<?php

namespace theme\widget;

use Widget\Base\Metas;
use Widget\Base\TreeTrait;
use Widget\Metas\Category\InitTreeRowsTrait;

class CategorySub extends Metas {

    use InitTreeRowsTrait;
    use TreeTrait;


    /**
     * 执行函数
     */
    public function execute(): void
    {
        $this->parameter->setDefault(['parentId' => '0']);
        $parentId = $this->parameter->parentId;
        $this->pushAll($this->getRows($this->getChildIds($parentId)));
    }

}