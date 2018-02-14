<?php

// get phone number and remove all non numeric characters
$phone = $site->phone();
$phone = preg_replace("/[^0-9,.]/", "", $phone);
$phone = substr($phone, 1); // remove first character
$phone = "+49" . $phone;

if($site->headline_color() == 'black') {
  $headline_color = '#000';
} else {
  $headline_color = '#fff';
}

if($page->image($page->header())) {
  $header = thumb($page->image($page->header()), array('width' => 1920, 'height' => 375, 'crop' => true))->url();
} elseif($site->image($site->small_header())) {
  $header = thumb($site->image($site->small_header()), array('width' => 1920, 'height' => 375, 'crop' => true))->url();
} else {
  $header = null;
}

if($site->image($site->logo())) {
  $logo = thumb($site->image($site->logo()), array('height' => 45))->url();
}

if($site->image($site->favicon())) {
    $favicon = array(
        '180' => thumb($site->image($site->favicon()), array('width' => 180, 'height' => 180, 'crop' => true))->url(),
        '32' => thumb($site->image($site->favicon()), array('width' => 32, 'height' => 32, 'crop' => true))->url(),
        '16' => thumb($site->image($site->favicon()), array('width' => 16, 'height' => 16, 'crop' => true))->url(),
    );
} else {
    $favicon = '';
}

function hexToRgb($color){
// convert hex to rgb
    $hex = str_replace("#", "", $color);

    if (strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    $rgb = array($r, $g, $b);
    return $rgb;
}

$bgAsRgb = hexToRgb($site->bg_color());
$baseAsRgb = hexToRgb($site->base_color());