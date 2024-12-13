<?php

namespace widget;

use Typecho\Db;
use Widget\Contents\Post\Recent;

class TopUpContent extends Recent
{

    /**
     * 执行函数
     *
     * @throws Db\Exception
     */
    public function execute()
    {
        $this->parameter->setDefault(['pageSize' => 7]);

        $this->db->fetchAll($this->select(
            'table.contents.cid',
            'table.contents.title',
            'table.contents.slug',
            'table.contents.created',
            'table.contents.modified',
            'table.contents.text',
            'table.contents.type',
            'table.contents.status',
            'table.contents.commentsNum',
            'table.contents.allowComment',
            'table.contents.allowPing',
            'table.contents.allowFeed',
            'table.contents.template',
            'table.contents.password',
            'table.contents.authorId',
            'table.contents.parent',
        )
            ->join('table.fields', 'table.contents.cid=table.fields.cid')
            ->where('table.fields.name = ?', 'topUp')
            ->where('table.fields.str_value = ?', '1')
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.created < ?', $this->options->time)
            ->order('table.contents.commentsNum', Db::SORT_DESC)
            ->order('table.contents.created', Db::SORT_DESC)
            ->limit($this->parameter->pageSize), [$this, 'push']);
    }

}