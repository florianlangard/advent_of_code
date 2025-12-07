<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function dd(...$vars)
{
    echo '<pre>';
    foreach ($vars as $v) {
        print_r($v);
        echo "\n";
    }
    echo '</pre>';
    // die(); // stop execution
}

function display($var)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}
