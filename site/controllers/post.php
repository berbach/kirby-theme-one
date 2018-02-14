<?php

return function($site, $pages, $page) {
    require_once kirby()->roots()->controllers() . '/shared/shared-controller.php';

    $list = $page->children()
        ->visible()
        ->sortBy('date', 'desc');

    if($tag = param('tag')) {
        $list = $list->filterBy('tags', $tag, ',');
    }

    $tags = $list->pluck('tags', ',', false);

    $list = $list->paginate(9);

    $pagination = $list->pagination();

    return compact('list', 'pagination', 'tags', 'tag', 'phone', 'headline_color', 'header', 'rgb', 'logo', 'favicon', 'bgAsRgb', 'baseAsRgb');
};
