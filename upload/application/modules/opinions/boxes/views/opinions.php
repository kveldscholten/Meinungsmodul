<link rel="stylesheet" href="<?=$this->getBoxUrl('static/css/opinions.css') ?>">
<link rel="stylesheet" href="<?=$this->getBoxUrl('static/js/star-rating/css/star-rating.css') ?>">

<?php if ($this->get('opinions') != ''): ?>
    <div class='row'>
        <div class='col-sm-12'>
            <?php foreach ($this->get('opinions') as $opinion): ?>
                <?php
                $userMapper = $this->get('userMapper');
                $user = $userMapper->getUserById($opinion->getUserId());
                $date = new \Ilch\Date($opinion->getDate());
                ?>
                <div class="item opinions box">
                    <blockquote>
                        <div class="row">
                            <input type="text"
                                   class="rating"
                                   value="<?=$opinion->getRating() ?>"
                                   data-readonly="true"
                                   data-show-clear="false"
                                   data-show-caption="false">
                            <p><?=$opinion->getText() ?></p>
                            <small><?=$user->getName() ?> <?=$this->getTrans('at') ?> <?=$date->format('d.m.Y - H:i') ?></small>
                        </div>
                    </blockquote>
                </div>
            <?php endforeach; ?>

            <div class="text-right">
                <a href="<?=$this->getUrl('opinions/index/index/') ?>" class="btn btn-default"><?=$this->getTrans('allOpinions') ?></a>
            </div>
        </div>
    </div>
<?php else: ?>
    <?=$this->getTrans('noOpinions') ?>
<?php endif; ?>

<script src="<?=$this->getBoxUrl('static/js/star-rating/js/star-rating.js') ?>" type="text/javascript"></script>
