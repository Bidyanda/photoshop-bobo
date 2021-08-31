<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/sc-2.0.3/sp-1.2.2/sl-1.3.2/datatables.min.css'
    ];
    public $js = [
        'js/main.js',
        "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js",
        // 'js/fastclick.js',
        // 'js/adminlte.min.js',
        // 'js/demo.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js',
        'https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/sc-2.0.3/sp-1.2.2/sl-1.3.2/datatables.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
