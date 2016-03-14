<?php if ($this->getUser()): ?>
    <div class='row'>
        <div class='col-lg-12'>
            <form class="form-horizontal" method="POST" action="">
                <?=$this->getTokenField() ?>
                <div class="form-group">
                    <label for="opinions_box_count" class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-2 col-xs-4 control-label" style="text-align: left;">
                        <?=$this->getTrans('rating') ?>
                    </label>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-8 opinions">
                        <input class="rating-add" name="rating" value="5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="opinions_box_count" class="col-lg-offset-2 col-lg-8">
                        <?=$this->getTrans('comment') ?>
                    </label>
                    <div class="col-lg-offset-2 col-lg-8 text-center">
                        <textarea class="form-control"
                                  style="resize: vertical"
                                  name="text"
                                  rows="3"></textarea>
                    </div>
                </div>
                <div class="col-lg-12 text-right">
                    <?=$this->getSaveBar('addButton', 'Opinions') ?>
                </div>
            </form>
        </div>
    </div>
<?php else: ?>
    <?=$this->getTrans('noLogin') ?>
<?php endif; ?>

<script>
jQuery(document).ready(function () {
    $('.rating-add').rating({'showClear':false, 'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'starCaptions': {1:'<?=$this->getTrans('navi1stars') ?>', 2:'<?=$this->getTrans('navi2stars') ?>', 3:'<?=$this->getTrans('navi3stars') ?>', 4:'<?=$this->getTrans('navi4stars') ?>', 5:'<?=$this->getTrans('navi5stars') ?>'}});
});
</script>
