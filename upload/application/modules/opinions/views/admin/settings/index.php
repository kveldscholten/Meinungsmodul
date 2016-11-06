<legend><?=$this->getTrans('settings') ?></legend>

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

<form class="form-horizontal" method="POST" action="">
    <?=$this->getTokenField() ?>
    <div class="form-group <?=$this->validation()->hasError('opinions_box_count') ? 'has-error' : '' ?>">
        <label for="opinions_box_count" class="col-lg-2 control-label">
            <?=$this->getTrans('opinionsLimit') ?>
        </label>
        <div class="col-lg-1">
            <input class="form-control"
                   type="number"
                   id="opinions_box_count"
                   name="opinions_box_count"
                   min="2"
                   value="<?=$this->get('opinions_box_count') ?>">
        </div>
    </div>
    <div class="form-group <?=$this->validation()->hasError('opinions_slider_interval') ? 'has-error' : '' ?>">
        <label for="opinions_slider_interval" class="col-lg-2 control-label">
            <?=$this->getTrans('opinionsInterval') ?>
        </label>
        <div class="col-lg-1">
            <input class="form-control"
                   type="number"
                   id="opinions_slider_interval"
                   name="opinions_slider_interval"
                   min="1000"
                   value="<?=$this->get('opinions_slider_interval') ?>">
        </div>
    </div>
    <?=$this->getSaveBar()?>
</form>
