<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="footer" class="text-center">
                <p><i class="bi bi-c-circle-fill"></i>&nbsp;<?php echo getCopyrightDate(); ?>
                    &nbsp;<?php $this->options->title() ?>. All Rights Reserved.</p>
                <p>
                    Theme <a href="https://github.com/liaocp666/Jasmine" title="Jasmine" target="_blank">Jasmine</a> by
                    <a href="https://github.com/liaocp666" target="_blank" title="Kent Liao">Kent Liao</a>
                </p>
                <p>Powered by <a href="https://typecho.org/" title="Tyecho" target="_blank">Typecho</a></p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="searchModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.staticfile.org/jquery/3.6.3/jquery.min.js" type="application/javascript"></script>
<script src="https://cdn.staticfile.org/sticky-sidebar/3.3.1/sticky-sidebar.min.js"
        type="application/javascript"></script>
<script src="https://cdn.staticfile.org/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
        type="application/javascript"></script>
<script src="<?php $this->options->themeUrl('assets/darken/darken.umd.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('assets/jasmine/jasmine.js'); ?>"></script>
<script>

</script>
</body>
</html>
