<?php

return function($site, $pages, $page) {
  require_once(kirby()->roots()->controllers() . '/shared/shared-controller.php');

  return compact('phone', 'headline_color', 'rgb', 'blog', 'logo', 'favicon', 'bgAsRgb', 'baseAsRgb');
};
