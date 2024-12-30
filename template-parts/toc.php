<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if($this->fields->showToc): ?>
    <div class="accordion mb-3" id="toc">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    目录
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body" id="toc-content">
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
