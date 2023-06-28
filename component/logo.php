<?php if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
} ?>

<?php if ($this->options->logoUrl): ?>
    <div class="flex justify-center relative nav-li">
        <a itemprop="url" href="<?php $this->options->siteUrl(); ?>">
            <img itemprop="logo"
                 src="<?php echo $this->options->logoUrl; ?>"
                 alt="<?php $this->options->title(); ?>" width="50" height="50"
                 loading="lazy"
                 class="rounded object-cover"/>
        </a>
        <span class="jasmine-primary-bg text-white px-2 py-1 absolute w-full rounded top-[5px] left-[90px] w-max"
              style="display: none">
                    <?php echo getOptionValueOrDefault("logoText", $this->options->title); ?>
                </span>
    </div>
<?php endif; ?>
<?php if ($this->is("index")): ?>
    <div class="hidden">
        <h1><?php $this->options->title(); ?></h1>
        <p><?php $this->options->description(); ?></p>
    </div>
<?php endif; ?>
