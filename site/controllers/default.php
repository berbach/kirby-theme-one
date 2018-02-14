<?php

return function($site, $pages, $page) {
  require_once kirby()->roots()->controllers() . '/shared/shared-controller.php';

  $subpage = $page->children()->visible();

  return compact('subpage', 'phone', 'headline_color', 'header', 'rgb', 'logo', 'favicon', 'bgAsRgb', 'baseAsRgb');
};
