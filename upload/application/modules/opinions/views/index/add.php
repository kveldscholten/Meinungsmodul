<!-- Fehlerausgabe der Validation -->
<?php if ($this->validation()->hasErrors()): ?>
    <div class="alert alert-danger" role="alert">
        <strong> <?=$this->getTrans('errorsOccured') ?>:</strong>
        <ul>
            <?php foreach ($this->validation()->getErrorMessages() as $error): ?>
                <li><?=$error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<!-- Ende Fehlerausgabe der Validation -->

<?php if ($this->getUser()): ?>
    <form class="form-horizontal" method="POST" action="">
        <?=$this->getTokenField() ?>
        <div class="form-group <?=$this->validation()->hasError('rating') ? 'has-error' : '' ?>">
            <label for="opinions_box_count"
                   class="col-lg-offset-2 col-lg-2 col-md-2 col-sm-2 col-xs-4 control-label" style="text-align: left">
                <?=$this->getTrans('rating') ?>
            </label>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-8 opinions">
                <input class="rating-add" name="rating" value="5">
            </div>
        </div>
        <div class="form-group <?=$this->validation()->hasError('text') ? 'has-error' : '' ?>">
            <label for="opinions_box_count" class="col-lg-offset-2 col-lg-8">
                <?=$this->getTrans('comment') ?>
            </label>
            <div class="col-lg-offset-2 col-lg-8">
                <textarea class="form-control"
                          style="resize: vertical"
                          name="text"
                          rows="3"
                          required><?= $this->originalInput('text') ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 text-right">
                <?=$this->getSaveBar('addButton', 'Opinions') ?>
            </div>
        </div>
    </form>
<?php else: ?>
    <?=$this->getTrans('noLogin') ?>
<?php endif; ?>

<script>
    jQuery(document).ready(function () {
        $('.rating-add').rating({'showClear':false, 'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'starCaptions': {1:'<?=$this->getTrans('navi1stars') ?>', 2:'<?=$this->getTrans('navi2stars') ?>', 3:'<?=$this->getTrans('navi3stars') ?>', 4:'<?=$this->getTrans('navi4stars') ?>', 5:'<?=$this->getTrans('navi5stars') ?>'}});
    });
</script>
