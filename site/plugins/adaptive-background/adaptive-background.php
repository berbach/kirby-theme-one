<?php

/**
 * Important:
 *
 * You have to set the default configuration:
 * c::set('berbach.adaptivebg.xs_max_width', 768);
 * c::set('berbach.adaptivebg.sm_max_width', 576);
 * c::set('berbach.adaptivebg.md_max_width', 768);
 * c::set('berbach.adaptivebg.lg_max_width', 1200);
 * c::set('berbach.adaptivebg.quality', 70);
 *
 *
 * Example:
 *
 * <?= adaptiveBackground($image, array(
 * 'class' => '.my-class', // required (class or id)
 * 'xs_width' => 520,
 * 'sm_width' => 300,
 * 'md_width' => 600,
 * 'lg_width' => 900, // required
 * 'md_min_width' => 500,
 * 'crop' => true|false,
 * ))
 * ?>
 *
 * 'lg_width' and 'class' is a required parameter.
 *
 * All height and quality properties and crop are optional.
 *
 * Use as class in header (style):
 *
 * <? $image = $page->big_header()->toFile();
 * if ($image):
 * echo adaptiveBackground($image, array('class' => '.my-class', lg_width' => 900,
 * 'md_width' => 720,
 * 'sm_width' => 520,
 * 'xs_width' => 720));
 * endif?>
 *
 * Use in Mark-up:
 *
 * <div class="page-fullscreen my-class">
 *
 * Example for minimal version:
 * <?= adaptiveBackground($image, array(
 * 'class' => '.my-class',
 * 'lg_width' => 900
 * )) ?>
 */


function adaptiveBackground($image, $settings = array()) {
    if (!isset($image)) {
        throw new Exception('Missing image');
    }

    if (!isset($settings['class']) || !is_array($settings)) {
        throw new Exception('class Setting is required!');
    }

    if (!c::get('berbach.adaptivebg.xs_max_width') ||
        !c::get('berbach.adaptivebg.sm_max_width') ||
        !c::get('berbach.adaptivebg.md_max_width') ||
        !c::get('berbach.adaptivebg.quality')) {
        throw new Exception('Missing Settings for adaptive backgrounds');
    }

    $xs_max_width = isset($settings['xs_max_width']) ? $settings['xs_max_width'] : c::get('berbach.adaptivebg.xs_max_width');
    $sm_max_width = isset($settings['sm_max_width']) ? $settings['sm_max_width'] : c::get('berbach.adaptivebg.sm_max_width');
    $md_max_width = isset($settings['md_max_width']) ? $settings['md_max_width'] : c::get('berbach.adaptivebg.md_max_width');

    $xs_width   = isset($settings['xs_width']) ? $settings['xs_width'] : null;
    $xs_height  = isset($settings['xs_height']) ? $settings['xs_height'] : null;
    $sm_width   = isset($settings['sm_width']) ? $settings['sm_width'] : null;
    $sm_height  = isset($settings['sm_height']) ? $settings['sm_height'] : null;
    $md_width   = isset($settings['md_width']) ? $settings['md_width'] : null;
    $md_height  = isset($settings['md_height']) ? $settings['md_height'] : null;
    $lg_width   = isset($settings['lg_width']) ? $settings['lg_width'] : null;
    $lg_height  = isset($settings['lg_height']) ? $settings['lg_height'] : null;

    $class  = isset($settings['class']) ? $settings['class'] : null;

    $blur       = isset($settings['blur']) ? $settings['blur'] : false;
    $grayscale  = isset($settings['grayscale']) ? $settings['grayscale'] : false;
    $crop       = isset($settings['crop']) ? $settings['crop'] : false;
    $quality    = isset($settings['quality']) ? $settings['quality'] : c::get('berbach.adaptivebg.quality');

    $url_origin = thumb($image, array('width'  => $lg_width,
                                      'height' => $lg_height,
                                      'crop' => $crop,
                                      'quality' => $quality,
                                      'blur' => $blur,
                                      'grayscale' => $grayscale))->url();
        $output = $class.'{ background-image: url("'.$url_origin.'") }';

    if ($md_width) {
        $url     = thumb($image, array('width'  => $md_width,
                                       'height' => $md_height,
                                       'crop' => $crop,
                                       'quality' => $quality,
                                       'blur' => $blur,
                                       'grayscale' => $grayscale))->url();
        $output .= '@media (max-width: '.$md_max_width.'px) { '.$class.'{ background-image: url("'.$url.'"); } }';
    }

    if ($sm_width) {
        $url     = thumb($image, array('width'  => $sm_width,
                                       'height' => $sm_height,
                                       'crop' => $crop,
                                       'quality' => $quality,
                                       'blur' => $blur,
                                       'grayscale' => $grayscale))->url();
        $output .= '@media (max-width: '.$sm_max_width.'px) { '.$class.'{ background-image: url("'.$url.'"); } }';
    }

    if ($xs_width) {
        $url     = thumb($image, array('width'  => $xs_width,
                                       'height' => $xs_height,
                                       'crop' => $crop,
                                       'quality' => $quality,
                                       'blur' => $blur,
                                       'grayscale' => $grayscale))->url();
        $output .= '@media (max-width: '.$xs_max_width.'px) { '.$class.'{ background-image: url("'.$url.'");} }';
    }

    return $output;
}