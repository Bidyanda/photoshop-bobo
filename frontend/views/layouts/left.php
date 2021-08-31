<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!-- <i class="fa fa-user-circle fa-2x" style="color: #fff;"></i> -->
                <p  data-letters="<?= substr(Yii::$app->user->identity->username,0,1)?>"></p>
                <p style="margin-top: 3px; padding: 8px 0px; color: #ccc;"></p>
            </div>
            <div class="pull-left info">
                <a href="#" style="font-size:15px;"><?= Yii::$app->user->identity->username?></a>
            </div><br>
            <div class=" user-panel pull-left info">
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <div class='user-panel header'>
          <span>NAVIGATION MENU</span>
        </div>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site/index']],
                    ['label' => 'Order', 'icon' => 'reorder', 'url' => ['/orders/index']],
                    ['label' => 'Category', 'icon' => 'table', 'url' => ['/category/index']],
                    ['label' => 'Item', 'icon' => 'sitemap', 'url' => ['/item/index']],
                    ['label' => 'Package', 'icon' => 'calendar', 'url' => ['/package/index']],
                    ['label' => 'Gallery', 'icon' => 'photo', 'url' => ['/gallery/index']],
                    ['label' => 'Customer', 'icon' => 'users', 'url' => ['/customer/index']],
                    ['label' => 'Setting', 'icon' => 'table',
                      'items'=>[
                        ['label' => 'Sub-category', 'icon' => 'wrench', 'url' => ['/sub-category/index']],
                      ]
                    ]
                ],
            ]
        ) ?>

    </section>

</aside>
<style>
.header {
    color: #43434e;
    padding-left: 27px;
    background-color: #1c2529;
    font-size: 11px;
}
</style>
