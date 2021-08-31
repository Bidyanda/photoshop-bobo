<?php
use yii\helpers\Html;

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">PHOTO</span><span class="logo-sm">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <p data-letter="<?= substr(Yii::$app->user->identity->username,0,1)?>"><?= Yii::$app->user->identity->username?></p>
                        <!-- <i class="fa fa-user-circle" style="color: #fff;"></i> -->
                        <!-- <span class="hidden-xs"><?//= Yii::$app->user->identity->username?></span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <?= Html::a('Change Password', ['/site/change-password'], ['class'=>'openModal', 'header' => 'Change Password', 'size' => 'sm']) ?>
                        </li>
                        <li>
                            <?= Html::a('Logout', ['/site/logout'], ['data-method' => 'POST']) ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
