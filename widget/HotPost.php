<?php

namespace widget;

use Typecho\Db;
use Widget\Contents\Post\Recent;

class HotPost extends Recent
{

    /**
     * 执行函数
     *
     * @throws Db\Exception
     */
    public function execute()
    {
        $this->parameter->setDefault(['pageSize' => 7]);

        $this->db->fetchAll($this->select()
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created < ?', $this->options->time)
            ->where('table.contents.type = ?', 'post')
            ->order('table.contents.commentsNum', Db::SORT_DESC)
            ->order('table.contents.created', Db::SORT_DESC)
            ->limit($this->parameter->pageSize), [$this, 'push']);
    }

}