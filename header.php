<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if ($this->is("index")): ?>
        <meta property="og:type" content="blog"/>
        <meta property="og:url" content="<?php $this->options->siteUrl(); ?>"/>
        <meta property="og:title" content="<?php $this->options->title(); ?>"/>
        <meta property="og:author" content="<?php $this->author->name(); ?>"/>
        <meta name="keywords" content="<?php $this->keywords(); ?>">
        <meta name="description" content="<?php $this->options->description(); ?>">
    <?php endif; ?>
    <?php if ($this->is("post") || $this->is("page") || $this->is("attachment")): ?>
        <meta property="og:url" content="<?php $this->permalink(); ?>"/>
        <meta property="og:title" content="<?php $this->title(); ?> - <?php $this->options->title(); ?>"/>
        <meta property="og:author" content="<?php $this->author(); ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="article:published_time" content="<?php $this->date("c"); ?>"/>
        <meta property="article:published_first"
              content="<?php $this->options->title(); ?>, <?php $this->permalink(); ?>"/>
        <meta name="keywords" content="<?php
        $k = $this->fields->keyword;
        if (empty($k)) {
          echo $this->keywords();
        } else {
          echo $k;
        }
        ?>">
        <meta name="description" content="<?php
        $d = $this->fields->description;
        if (empty($d) || !$this->is("single")) {
          if ($this->getDescription()) {
            echo $this->getDescription();
          }
        } else {
          echo $d;
        }
        ?>"/>
    <?php endif; ?>
    <title><?php
    $this->archiveTitle(
      [
        "category" => _t("分类 %s 下的文章"),
        "search" => _t("包含关键字 %s 的文章"),
        "tag" => _t("标签 %s 下的文章"),
        "author" => _t("%s 发布的文章"),
      ],
      "",
      " - "
    );
    $this->options->title();
    ?></title>
    <?php $this->header("description=&generator=&pingback=&template=&xmlrpc=&wlw=&commentReply=&keywords="); ?>
    <link rel="dns-prefetch" href="https://npm.elemecdn.com" />
    <style>
      <?php if (getOptions()->themeColor == "1"): ?>
        :root {
          --primary-bg: #a6c4c2;
          --link-color: #77b3af;
          --link-hover-color: #77b3af;
        }
        <?php elseif (getOptions()->themeColor == "2"): ?>
          :root{
            --primary-bg: #feae51;
          --link-color: #f08409;
          --link-hover-color: #f08409;
          }
          <?php elseif (getOptions()->themeColor == "3"): ?>
          :root{
            --primary-bg: #a2c6e1;
          --link-color: #668aa5;
          --link-hover-color: #668aa5;
          }
          <?php elseif (getOptions()->themeColor == "4"): ?>
          :root{
            --primary-bg: rgb(239 68 68);
          --link-color: rgb(239 68 68);
          --link-hover-color: rgb(239 68 68);
          }
      <?php else: ?>
        :root {
          --primary-bg: #000;
          --link-hover-color: #000;
        }
      <?php endif; ?>
    </style>
    <link type="text/css" rel="stylesheet" href="<?php $this->options->themeUrl(
      "assets/dist/style.css?v=" . getThemeVersion()
    ); ?>"/>
    <link rel="shoucut icon" href="<?php echo getOptionValueOrDefault("icon", $this->options->siteUrl . 'favicon.ico') ?>">
    <script async src="https://cdn.staticfile.org/smoothscroll/1.4.10/SmoothScroll.min.js"></script>
    <script async src="https://npm.elemecdn.com/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    <script src="<?php $this->options->themeUrl("/assets/dist/jasmine.iife.js?v=" . getThemeVersion()); ?>"></script>
    <style>
        <?php $this->options->customStyle(); ?>
    </style>
</head>
