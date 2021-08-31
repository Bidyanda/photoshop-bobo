<?php
  use yii\helpers\Html;
  use yii\bootstrap\Modal;
  use dosamigos\datepicker\DatePicker;
  $today = date("Y-m-d");
  // Modal::begin([
  //     'id' => 'page-modal-lg',
  //     'clientOptions' => ['backdrop' => 'static'],
  //     'size' => 'modal-lg',
  //     'header' => '<h3 class="text-center" id="page-modal-lg-header"></h3>'
  // ]);
  // echo '<div id="page-modal-lg-loader" style="display: none;">
  //             <div class="loader"></div>
  //             <div class="fadeMe"></div>
  //         </div>
  //         <div id="page-modal-lg-body"><br><br></div>';
  // Modal::end();
 ?>
<div class="container">
  <div class="row row-50">
    <div class="col-12 text-center">
      <h3 class="section-title wow-outer"><span class="wow slideInUp">Package</span></h3>
    </div>
    <div class="col-12 isotope-wrap">
      <div class="isotope offset-top-2" data-isotope-layout="masonry" data-lightgallery="group" data-lg-thumbnail="false">
        <div class="row row-30">
          <?php
            if($package){
              foreach($package as $pak ){
              ?>
              <div class="col-12 col-sm-6 col-lg-4 isotope-item wow-outer">
                              <!-- Thumbnail Corporate-->
                              <p class="thumbnail-corporate-title"><a href="#"><?= $pak->package_name?></a></p>
                              <article class="thumbnail-corporate wow slideInDown"><img class="thumbnail-corporate-image" src="/<?= $pak->image?>" alt="" width="370" height="256"/>
                                <div class="thumbnail-corporate-caption">
                                  <p class="thumbnail-corporate-title"><?= Html::a($pak->package_name,['/package/view','package_id'=>$pak->package_id],['class'=>'openModallg'])?></p>
                                  <p><?= $pak->description ?></p>
                                  <p><?= $pak->no_of_camera_man." Camera Men"?></p>
                                  <a class="thumbnail-corporate-link" href="/<?= $pak->image?>" data-lightgallery="item">
                                    <span class="icon mdi mdi-magnify"></span>
                                    <span class="icon mdi mdi-magnify"></span>
                                  </a>
                                </div>
                                <div class="thumbnail-corporate-dummy"></div>
                              </article>
                              <p class="thumbnail-corporate-title" style="padding-top:2px;"><?= Html::a('Order Checked',['checked-date','id'=>$pak->package_id],['class'=>'text-sm btn btn-sm btn-warning openModal1'])?></p>
              </div>
            <?php
                }
            }else{
            ?>
            <h4 class="text-center text-danger">Data Not Found</h4>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$this->registerJs(<<<JS
$(".openModal1").click(function() {
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
