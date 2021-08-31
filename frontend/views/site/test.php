<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

use yii\helpers\Html;


$svg = '<svg id="mySvgElement" xmlns="http://www.w3.org/2000/svg" height="179.2" width="179.2">
	<g>
		<path transform="scale(0.1,-0.1) translate(0,-1536)" d="M1536 224v704q0 40 -28 68t-68 28h-704q-40 0 -68 28t-28 68v64q0 40 -28 68t-68 28h-320q-40 0 -68 -28t-28 -68v-960q0 -40 28 -68t68 -28h1216q40 0 68 28t28 68zM1664 928v-704q0 -92 -66 -158t-158 -66h-1216q-92 0 -158 66t-66 158v960q0 92 66 158t158 66h320 q92 0 158 -66t66 -158v-32h672q92 0 158 -66t66 -158z" style="&#10;    fill: #03a9f4;&#10;"/>
	</g>
</svg>';

// echo $svg;
$im = new \Imagick();
$svg = file_get_contents($svg);

?>

<?= Html::beginForm(['test'], 'POST') ?>
<textarea placeholder="past json here" name="json" class="form-control" row="6"></textarea>
<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<?= Html::endForm() ?>

<div style="max-width: 50%;">
	<img src="<?= ($data) ?>">
	<img src="<?= ($back) ?>">
</div>

<?php
    function base64EncodeImage ($svg) {
        $base64_image = 'data:image/svg+xml;base64,' .base64_encode(unescape(rawurlencode($svg)));
        return $base64_image;
    }
    function unescape($str) {
        $ret = '';
        $len = strlen ( $str );
        for($i = 0; $i < $len; $i ++) {
            if ($str [$i] == '%' && $str [$i + 1] == 'u') {
                $val = hexdec ( substr ( $str, $i + 2, 4 ) );
                if ($val < 0x7f)
                    $ret .= chr ( $val );
                else if ($val < 0x800)
                    $ret .= chr ( 0xc0 | ($val >> 6) ) . chr ( 0x80 | ($val & 0x3f) );
                else
                    $ret .= chr ( 0xe0 | ($val >> 12) ) . chr ( 0x80 | (($val >> 6) & 0x3f) ) . chr ( 0x80 | ($val & 0x3f) );
                $i += 5;
            } else if ($str [$i] == '%') {
                $ret .= urldecode ( substr ( $str, $i, 3 ) );
                $i += 2;
            } else
                $ret .= $str [$i];
        }
        return $ret;
    }
