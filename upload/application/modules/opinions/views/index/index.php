<link rel="stylesheet" href="<?=$this->getModuleUrl('static/css/opinions.css') ?>">
<link rel="stylesheet" href="<?=$this->getModuleUrl('static/js/star-rating/css/star-rating.css') ?>">

<legend><?=$this->getTrans('menuOpinions') ?></legend>
<div class="row">
    <div class="col-lg-offset-2 col-lg-4 col-md-6 col-sm-6 col-xs-12">
        <div class="opinions rating-block">
            <h4><?=$this->getTrans('averageRating') ?></h4>
            <i class="fa fa-quote-left"></i> <?=$this->get('opinionsCount') ?> <?=$this->getTrans('opinions') ?>
            <h2><?=$this->get('opinionsRating') ?> <small>/ 5</small></h2>
            <input type="text"
                   class="rating"
                   value="<?=$this->get('opinionsRating') ?>"
                   data-readonly="true"
                   data-show-clear="false"
                   data-show-caption="false">              
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 opinions">
        <h4><?=$this->getTrans('ratingBreakdown') ?></h4>
        <div class="pull-left">
            <div class="pull-left" style="width: 35px; line-height: 1;">
                <div style="height: 9px; margin: 5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width: 180px;">
                <div class="progress" style="height: 9px; margin: 8px 0;">
                    <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?=$this->get('opinionsStarRatingWidth5') ?>%"></div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?=$this->get('opinionsStarRating5') ?></div>
        </div>

        <div class="pull-left">
            <div class="pull-left" style="width: 35px; line-height: 1;">
                <div style="height: 9px; margin: 5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width: 180px;">
                <div class="progress" style="height: 9px; margin: 8px 0;">
                    <div class="progress-bar progress-bar-primary" role="progressbar" style="width: <?=$this->get('opinionsStarRatingWidth4') ?>%"></div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?=$this->get('opinionsStarRating4') ?></div>
        </div>

        <div class="pull-left">
            <div class="pull-left" style="width: 35px; line-height: 1;">
                <div style="height: 9px; margin: 5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width: 180px;">
                <div class="progress" style="height: 9px; margin: 8px 0;">
                    <div class="progress-bar progress-bar-info" role="progressbar" style="width: <?=$this->get('opinionsStarRatingWidth3') ?>%"></div>
                </div>
            </div>
            <div class="pull-right" style="margin-left:10px;"><?=$this->get('opinionsStarRating3') ?></div>
        </div>

        <div class="pull-left">
            <div class="pull-left" style="width: 35px; line-height: 1;">
                <div style="height: 9px; margin: 5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width: 180px;">
                <div class="progress" style="height: 9px; margin: 8px 0;">
                    <div class="progress-bar progress-bar-warning" role="progressbar" tyle="width: <?=$this->get('opinionsStarRatingWidth2') ?>%"></div>
                </div>
            </div>
            <div class="pull-right" style="margin-left: 10px;"><?=$this->get('opinionsStarRating2') ?></div>
        </div>

        <div class="pull-left">
            <div class="pull-left" style="width: 35px; line-height: 1;">
                <div style="height: 9px; margin: 5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
            </div>
            <div class="pull-left" style="width: 180px;">
                <div class="progress" style="height: 9px; margin: 8px 0;">
                    <div class="progress-bar progress-bar-danger" role="progressbar" style="width: <?=$this->get('opinionsStarRatingWidth1') ?>%"></div>
                </div>
            </div>
            <div class="pull-right" style="margin-left: 10px;"><?=$this->get('opinionsStarRating1') ?></div>
        </div>
    </div>
</div>

<div class="opinions">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><?=$this->getTrans('navigation') ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if ($this->getRequest()->getParam('rating') == '' AND $this->getRequest()->getParam('add') == '') { echo 'class="active"'; } ?>>
                        <a href="<?=$this->getUrl(array('controller' => 'index', 'action' => 'index')); ?>"><?=$this->getTrans('naviAll') ?></a>
                    </li>
                    <li <?php if ($this->getRequest()->getParam('rating') == 5) { echo 'class="active"'; } ?>>
                        <a href="<?=$this->getUrl(array('controller' => 'index', 'action' => 'index', 'rating' => 5)); ?>"><?=$this->getTrans('navi5stars') ?></a>
                    </li>
                    <li <?php if ($this->getRequest()->getParam('rating') == 4) { echo 'class="active"'; } ?>>
                        <a href="<?=$this->getUrl(array('controller' => 'index', 'action' => 'index', 'rating' => 4)); ?>"><?=$this->getTrans('navi4stars') ?></a>
                    </li>
                    <li <?php if ($this->getRequest()->getParam('rating') == 3) { echo 'class="active"'; } ?>>
                        <a href="<?=$this->getUrl(array('controller' => 'index', 'action' => 'index', 'rating' => 3)); ?>"><?=$this->getTrans('navi3stars') ?></a>
                    </li>
                    <li <?php if ($this->getRequest()->getParam('rating') == 2) { echo 'class="active"'; } ?>>
                        <a href="<?=$this->getUrl(array('controller' => 'index', 'action' => 'index', 'rating' => 2)); ?>"><?=$this->getTrans('navi2stars') ?></a>
                    </li>
                    <li <?php if ($this->getRequest()->getParam('rating') == 1) { echo 'class="active"'; } ?>>
                        <a href="<?=$this->getUrl(array('controller' => 'index', 'action' => 'index', 'rating' => 1)); ?>"><?=$this->getTrans('navi1stars') ?></a>
                    </li>
                </ul>
                <?php if($this->getUser()): ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-right <?php if ($this->getRequest()->getParam('add') == 1) { echo 'active'; } ?>">
                            <a href="<?=$this->getUrl(array('controller' => 'index', 'action' => 'index', 'add' => 1)); ?>"><?=$this->getTrans('naviAddOpinions') ?></a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>

<div class="opinions-entries">
    <?php if ($this->getRequest()->getParam('add') == 1): ?>    
        <?php include APPLICATION_PATH.'/modules/opinions/views/index/add.php'; ?>
    <?php else: ?>
        <?php if ($this->get('opinions') != ''): ?>
            <div class='row'>
                <div class='col-sm-12'>
                    <?php foreach ($this->get('opinions') as $opinion): ?>
                        <?php $userMapper = new \Modules\User\Mappers\User(); ?>
                        <?php $user = $userMapper->getUserById($opinion->getUserId()); ?>
                        <?php $date = new \Ilch\Date($opinion->getDate()); ?>
                        <div class="item opinions">
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
            </div>
        <?php else: ?>
            <?=$this->getTrans('noOpinions') ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

<script src="<?=$this->getModuleUrl('static/js/star-rating/js/star-rating.js') ?>" type="text/javascript"></script>
