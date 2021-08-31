<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper" style="background-color:white">
    <section class="content-header">
        <h1 class="page-title" style="font-size:16px"><?= $this->title ?></h1>

        <!-- <?//= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?> -->
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
  <div class="row">
    <div class="col-md-6 text-left"><strong style="font-size: 12px;">Copyright &copy; <?= date('Y') ?> <a href="https://www.google.com">Photography</a>.</strong> All rights reserved.</div>
    <div class="col-md- 6 text-right"><strong style="font-size: 12px;">You will be logged out for inactivity.</div>
  </div>
</footer>
<style>
.table-bordered {
  border: 1px solid #ece9e9;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #ece9e9;
}
</style>
