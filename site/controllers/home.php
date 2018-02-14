<?php

return function($site, $pages, $page) {
  require_once kirby()->roots()->controllers() . '/shared/shared-controller.php';

  if($page->slider() != '') {
    $string = str::split($page->slider(), ',');

    $slider = '[';
    foreach ($string as $item) {
      $slider .= "\"$item\", ";
    }
    $slider .= '"' . a::first($string) . '"]';

    $first_slide = a::first($string);
  }

  if($page->image($page->big_header())) {
    $big_header = thumb($page->image($page->big_header()), array('width' => 1920))->url();
  } else {
    $big_header = null;
  }

//  return compact('slider', 'first_slide', 'phone', 'headline_color', 'big_header', 'rgb', 'logo', 'favicon', 'bgAsRgb', 'baseAsRgb');


  return compact('slider', 'first_slide', 'phone', 'headline_color', 'rgb', 'logo', 'favicon', 'bgAsRgb', 'baseAsRgb');
};
