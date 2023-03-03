<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
    <link href="https://cdn.staticfile.org/bootstrap/5.2.3/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="https://cdn.staticfile.org/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" type="text/css" rel="stylesheet"/>
    <link href="<?php $this->options->themeUrl('assets/jasmine/jasmine.css'); ?>" type="text/css" rel="stylesheet">
</head>
<body>
<div id="layout">
    <div class="container">
        <div class="layout-wrap">
            <div class="row g-0">
