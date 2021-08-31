<?php
use yii\helpers\Html;
use yii\helpers\Url;

frontend\assets\AppAsset::register($this);
dmstr\web\AdminLteAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        .content-wrapper {
          background-color: #ffffff;
        }
    </style>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <div id="full-loader"></div>

    <?= $this->render(
        'header.php',
        ['directoryAsset' => $directoryAsset]
    ) ?>

    <?= $this->render(
        'left.php',
        ['directoryAsset' => $directoryAsset]
    )
    ?>

    <?= $this->render(
        'content.php',
        ['content' => $content, 'directoryAsset' => $directoryAsset]
    ) ?>

</div>

<?= $this->render('modal') ?>

<?php
// sidebar collapse memory
$this->registerJs(<<<JS
$(".sidebar-toggle").click(function() {
    if($("body").hasClass("sidebar-collapse")) {
        eraseCookie('medilane_sidebarcookie');
    } else {
        setCookie('medilane_sidebarcookie', 'open', 7);
    }
});
function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

let medilane_sidebarCookie = getCookie('medilane_sidebarcookie');
if (medilane_sidebarCookie) {
    $("body").addClass("sidebar-collapse");
}
JS
);
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<style>
  [data-letter]:before {
  content:attr(data-letters);
  display:inline-block;
  font-size:1em;
  width:2.5em;
  height:2.5em;
  line-height:2.5em;
  text-align:center;
  border-radius:50%;
  background:#596f7c;
  vertical-align:middle;
  margin-right:1em;
  color:white;
  font-size:9px;
  }

  [data-letters]:before {
  content:attr(data-letters);
  display:inline-block;
  font-size:1em;
  width:2.5em;
  height:2.5em;
  line-height:2.5em;
  text-align:center;
  border-radius:50%;
  background:#596f7c;
  vertical-align:middle;
  margin-right:1em;
  color:white;
  font-size:15px;
  text-transform: uppercase;
  }
  p {
    margin: 0 0 -2px;
}
li>a {
    font-size: 11px;
}
</style>
