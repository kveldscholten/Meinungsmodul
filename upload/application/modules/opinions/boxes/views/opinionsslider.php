<link rel="stylesheet" href="<?=$this->getStaticUrl('../application/modules/opinions/static/css/opinions.css') ?>">
<link rel="stylesheet" href="<?=$this->getStaticUrl('../application/modules/opinions/static/js/star-rating/css/star-rating.css') ?>">

<legend><?=$this->getTrans('menuOpinions') ?></legend>
<?php if ($this->get('opinions') != ''): ?>
    <div class='row'>
        <div class='col-sm-12'>
            <div class="carousel slide" data-ride="carousel" id="opinions-carousel">
                <div class="carousel-inner">
                    <?php foreach ($this->get('opinions') as $key => $opinion): ?>
                        <?php $userMapper = new \Modules\User\Mappers\User(); ?>
                        <?php $user = $userMapper->getUserById($opinion->getUserId()); ?>
                        <?php $date = new \Ilch\Date($opinion->getDate()); ?>
                        <div class="item opinions <?php if ($key == 0) { echo 'active'; }; ?>">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-2 text-center">
                                        <img class="img-circle opinions-img" src="<?=$this->getUrl().'/'.$user->getAvatar() ?>" alt="<?=$this->escape($user->getName()) ?>">
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text"
                                               class="rating"
                                               value="<?=$opinion->getRating() ?>"
                                               data-readonly="true"
                                               data-show-clear="false"
                                               data-show-caption="false">
                                        <p><?=$opinion->getText() ?></p>
                                        <small><?=$user->getName() ?> <?=$this->getTrans('at') ?> <?=$date->format('d.m.Y - H:i') ?></small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a data-slide="prev" href="#opinions-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                <a data-slide="next" href="#opinions-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
            </div>
            
            <div class="text-right">
                <a href="<?=$this->getUrl('opinions/index/index/') ?>" class="btn btn-default"><?=$this->getTrans('allOpinions') ?></a>
            </div>
        </div>
    </div>
<?php else: ?>
    <?=$this->getTrans('noOpinions') ?>
<?php endif; ?>

<script src="<?=$this->getStaticUrl('../application/modules/opinions/static/js/star-rating/js/star-rating.js') ?>" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $('#opinions-carousel').carousel({
        interval: <?=$this->get('opinionsInterval') ?>,
        pause: 'hover',
    });
});
</script>