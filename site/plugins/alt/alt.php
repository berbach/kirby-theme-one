<?php

/**
 * get alt tag from image
 * @param array $data
 * @return mixed
 */
function alt($data) {
    if (strlen($data->alt()) > 1) {
        $alt = $data->alt();
    } else {
        $alt = $data->name();
    }

    return $alt;
}
