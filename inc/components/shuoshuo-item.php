<div class="content d-flex flex-column justify-content-between position-relative w-100">
    <div class="title mb-3">
        <div
            class="d-flex position-relative align-content-center align-items-center align-self-center justify-content-start w-100">
            <div class="mt-1">
                <img class="rounded shadow-1-strong" width="42" height="42"
                     src="<?php echo getAvatarByMail($this->author->mail, true); ?>"
                     alt="<?php $this->author->screenName(); ?>">
            </div>
            <div class="blogger ms-2">
                <div class="name shuoshuo-meta">
                    <div class="my-1 d-flex flex-column align-self-center justify-content-start">
                        <span class="shuoshuo-meta-author"><?php $this->author->screenName(); ?></span>
                        <span class="shuoshuo-meta-time"><?php echo getHumanizedDate($this->created); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="shuoshuo" class="shuoshuo heti w-100" itemprop="abstract">
        <p><?php $this->content(); ?></p>
    </div>
</div>
