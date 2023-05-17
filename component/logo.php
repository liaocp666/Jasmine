<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<?php if ($this->options->logoUrl): ?>
    <div class="flex justify-center">
        <a itemprop="url" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">
            <img itemprop="logo"
                 src="<?php echo $this->options->logoUrl; ?>"
                 alt="<?php $this->options->title(); ?>" width="50" height="50"
                 class="rounded"/>
        </a>
    </div>
<?php endif; ?>
<?php if ($this->is("index")): ?>
    <div class="hidden">
        <h1><?php $this->options->title(); ?></h1>
        <p><?php $this->options->description(); ?></p>
    </div>
<?php endif; ?>

