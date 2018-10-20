<?php

/**
 * Function for convenient listing of an array, object
 * @param $data
 */
function debug($data)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
}