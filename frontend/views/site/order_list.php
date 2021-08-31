<?php
  use yii\helpers\Html;
  $status = [0=>'Pending',1=>'Confirmed','2'=>'Canceled'];
 ?>
  <section class="section section-overlap bg-decorate">
    <div class="col-12 text-center">
      <h3 class="section-title wow-outer"><span class="wow slideInUp">Your Order</span></h3>
    </div>
    <div class="section-overlap-content">
      <div class="container table-responsive">
        <table class="table table-sm table-bordered table-striped">
          <thead>
            <tr>
              <th>SLno</th>
              <th>Package</th>
              <th>Order Schedule</th>
              <th></th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($order as $srno=>$or) {?>
              <tr>
                <td><?= ++$srno;?></td>
                <td><?= $or['package_name']?></td>
                <td><?= $or['order_date']?></td>
                <td><?= '<img src="/'.$or['image'].'" class="cat-img">'?></td>
                <td><?= $status[$or['order_status']]?></td>
                <td><?= $or['order_status'] == 0 ? Html::a('Cancel',['site/order-cancel','id'=>$or['order_id']],['class'=>'btn btn-sm btn-danger']):'';?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <style>
  .cat-img {
      max-height: 40px;
      transition: 0.3s;
  }
  .cat-img:hover {
      transform: scale(5);
      transition: 0.5s;
  }
  </style>
