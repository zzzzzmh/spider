<?php


// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    die('require PHP > 5.3.0 !');
}

    //define('APP_STATUS', 'config_online');
    define('APP_STATUS', 'config_test');
    define('APP_DEBUG', true);


define('APP_PATH', __DIR__.'/Application/');
require __DIR__.'/thinkphp_3.2.3_full/ThinkPHP/ThinkPHP.php';

