
<?php

/* @var $this \yii\web\View */
/* @var $content string */
use Yii;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetCustomer;
use common\widgets\Alert;
use yii\bootstrap\Modal;
AppAssetCustomer::register($this);

Modal::begin([
    'id' => 'page-modal',
    'clientOptions' => ['backdrop' => 'static'],
]);
echo '<div id="page-modal-loader" style="display: none;">
            <div class="loader"></div>
            <div class="fadeMe"></div>
        </div>
        <div id="page-modal-body"><br><br></div>';
Modal::end();
Modal::begin([
    'id' => 'page-modal-lg',
    'clientOptions' => ['backdrop' => 'static'],
    'size' => 'modal-lg',
    'header' => '<h3 class="text-center" id="page-modal-lg-header"></h3>'
]);
echo '<div id="page-modal-lg-loader" style="display: none;">
            <div class="loader"></div>
            <div class="fadeMe"></div>
        </div>
        <div id="page-modal-lg-body"><br><br></div>';
Modal::end();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap" align='center'>
    <div class="container" >
        <header class="section page-header">
          <!-- RD Navbar-->
          <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-minimal" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
              <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                  <!-- RD Navbar Panel-->
                  <div class="rd-navbar-panel">
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1"><span></span></button>
                    <!-- RD Navbar Brand--><a class="rd-navbar-brand" href="index.html"><img src="/images/logo-default-176x28.jpg" alt="" width="176" height="28" srcset="/images/logo-default-352x56.jpg 2x"/></a>
                  </div>
                  <div class="rd-navbar-main-element">
                    <div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
                      <!-- RD Navbar Nav-->
                      <ul class="rd-navbar-nav">
                        <li  <?= Yii::$app->controller->action->id=='cindex'?'class="rd-nav-item active"':'class="rd-nav-item"';?>><?= Html::a('Home',['cindex'],['class'=>"rd-nav-link"])?>
                        </li>
                        <li <?= Yii::$app->controller->action->id=='aboutme'?'class="rd-nav-item active"':'class="rd-nav-item"';?>><?= Html::a('About me',['aboutme'],['class'=>"rd-nav-link"])?>
                        </li>
                        <li <?= Yii::$app->controller->action->id=='gallery'?'class="rd-nav-item active"':'class="rd-nav-item"';?>><?= Html::a('Gallery',['gallery'],['class'=>"rd-nav-link"])?>
                        </li>
                        <li <?= Yii::$app->controller->action->id=='contactus'?'class="rd-nav-item active"':'class="rd-nav-item"';?>> <?= Html::a('Contacts',['contactus'],['class'=>"rd-nav-link"])?>
                        </li>
                        <li <?= Yii::$app->controller->action->id=='package'?'class="rd-nav-item active"':'class="rd-nav-item"';?>> <?= Html::a('Package',['package'],['class'=>"rd-nav-link"])?>
                        </li>
                        <?php if (Yii::$app->user->isGuest) { ?>
                          <li <?= Yii::$app->controller->action->id=='signup'?'class="rd-nav-item active"':'class="rd-nav-item"';?>> <?= Html::a('Sign up',['signup'],['class'=>"rd-nav-link",'size'=>'md','header'=>''])?>
                          </li>
                          <li <?= Yii::$app->controller->action->id=='login'?'class="rd-nav-item active"':'class="rd-nav-item"';?>> <?= Html::a('login',['login'],['class'=>"rd-nav-link",'size'=>'md','header'=>''])?>
                          </li>
                        <?php }else{ ?>
                          <li <?= Yii::$app->controller->action->id=='order-list'?'class="rd-nav-item active"':'class="rd-nav-item"';?>> <?= Html::a('Order',['site/order-list'],['class'=>"rd-nav-link"])?>
                          </li>
                          <!-- <li class="rd-nav-item"><?//= Yii::$app->user->identity->username; ?></li> -->
                          <li class="rd-nav-item"><?= Html::a('Logout',['logout'],['data-method'=>'post','data-confirm'=>'Are you sure to Logout'])?></li>
                        <?php } ?>
                      </ul>
                    </div>
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search"><a class="nav-icon" href="#">
                        <svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="17px" viewBox="0 0 17 17" enable-background="new 0 0 17 17" xml:space="preserve">
                          <path fill="none" stroke="" stroke-miterlimit="0" d="M4.775,0.588H0.708v4.286"></path>
                          <polyline fill="none" stroke="" stroke-miterlimit="0" points="16.552,4.654 16.552,0.588 12.485,0.588 "></polyline>
                          <polyline fill="none" stroke="" stroke-miterlimit="0" points="12.485,16.432 16.552,16.432 16.552,12.525 "></polyline>
                          <polyline fill="none" stroke="" stroke-miterlimit="0" points="0.708,12.577 0.708,16.432 4.722,16.432 "></polyline>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M0.708,8.404"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M40.875,37.651"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M8.313-0.151"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M37.574,10.094"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M0.067,10.094"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M0.708,4.707"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M16.552,4.655"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M16.816,12.524"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M0.708,12.577"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M4.722,16.432"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M4.734,12.886"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M4.76,4.9"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M4.775,0.905"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M12.485,16.432"></path>
                          <path fill="none" stroke="" stroke-miterlimit="10" d="M12.485,0.905"></path>
                          <circle fill="" stroke="" stroke-miterlimit="10" cx="8.63" cy="8.193" r="0.911"> </circle>
                        </svg></a></div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </header>
        <?= $content ?>
        <footer class="section footer-standard bg-gray-700">
          <div class="footer-standard-main">
            <div class="container">
              <div class="row row-50">
                <div class="col-lg-4">
                  <div class="inset-right-1">
                    <h4>About Me</h4>
                    <p>My name is Bobocha Mutum and I’m a photographer and retoucher. I’m offering my services to individual and corporate clients throughout the Imphal. Make your favorite life moment or event last and remain in your memory!</p>
                  </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4">
                  <div class="box-1">
                    <h4>Contact Information</h4>
                    <ul class="list-sm">
                      <li class="object-inline"><span class="icon icon-md mdi mdi-map-marker text-gray-700"></span><a class="link-default" href="#">Singjamei,Imphal, 705001</a></li>
                      <li class="object-inline"><span class="icon icon-md mdi mdi-phone text-gray-700"></span><a class="link-default" href="tel:#">9774223921</a></li>
                      <li class="object-inline"><span class="icon icon-md mdi mdi-email text-gray-700"></span><a class="link-default" href="mailto:#">bobochamutum09@gmail.com</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-sm-6 col-md-7 col-lg-4">
                  <h4>Newsletter</h4>
                  <p>Sign up to my newsletter and be the first to know about the latest news, special offers, events, and discounts.</p>
                  <!-- RD Mailform-->
                  <!-- <form class="rd-form rd-mailform form-inline" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="bat/rd-mailform.php">
                    <div class="form-wrap">
                      <input class="form-input" id="subscribe-form-2-email" type="email" name="email" data-constraints="@Email @Required">
                      <label class="form-label" for="subscribe-form-2-email">E-mail</label>
                    </div>
                    <div class="form-button">
                      <button class="button button-primary button-icon button-icon-only button-winona" type="submit" aria-label="submit"><span class="icon mdi mdi-email-outline"></span></button>
                    </div>
                  </form> -->
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="footer-standard-aside"><a class="brand" href="#"><img src="/images/logo-inverse-176x28.png" alt="" width="176" height="28" srcset="/images/logo-inverse-352x56.png 2x"/></a>
              <!-- Rights-->
              <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>All Rights Reserved.</span><span>&nbsp;</span><br class="d-sm-none"/>Design&nbsp;by&nbsp;<a href="https://www.google.com/">Bobocha</a></p>
            </div>
          </div>
        </footer>
    </div>
</div>
<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?//= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?//= Yii::powered() ?></p>
    </div>
</footer> -->
<!-- <?//= $this->render('modal') ?> -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?php
$this->registerJs(<<<JS
$(".openModal").click(function() {
    $("#page-modal-loader").show();
    $("#page-modal").modal("show").find("#page-modal-body")
    .load($(this).attr("href"), function() {
        $("#page-modal-loader").hide();
    });
    return false;
});

$(".openModallg").click(function() {
    $("#page-modal-lg-loader").show();
    $("#page-modal-lg").modal("show").find("#page-modal-lg-body")
    .load($(this).attr("href"), function() {
        $("#page-modal-lg-loader").hide();
    });
    return false;
});
JS
);
