<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle('', '', ' | '); ?><?php $this->options->title(); ?><?php if ($this->is('index')): ?> | <?php $this->options->description() ?><?php endif; ?></title>
    <link href="<?php $this->options->themeUrl('assets/ms/font.css'); ?>" rel="stylesheet">
    <link href="<?php $this->options->themeUrl('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet"/>
    <link href="<?php $this->options->themeUrl('assets/main/main.css'); ?>" rel="stylesheet"/>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/highlight/github-dark-dimmed.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/ti/tabler-icons.min.css'); ?>">
    <link rel="shoucut icon" href="<?php echo $this->options->siteUrl . "favicon.ico"; ?>">
    <script src="<?php $this->options->themeUrl('assets/highlight/highlight.min.js'); ?>"></script>
    <?php $this->header('generator=&&pingback=&xmlrpc=&wlw='); ?>
    <?php $this->options->customHead(); ?>
</head>
<body class="bg-auto">
<script>
    var dataBsTheme = localStorage.getItem('data-bs-theme')
    if (!dataBsTheme) {
        dataBsTheme = 'light'
    }
    document.body.setAttribute('data-bs-theme', dataBsTheme)
    localStorage.setItem("data-bs-theme", dataBsTheme);
</script>
<div style="height: 60px" id="top" class="d-none d-lg-block"></div>
<div class="container bg-body g-0 rounded shadow-sm">
    <div class="row g-0">
