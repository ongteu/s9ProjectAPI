<?php

/*
 * 
 */

if (!defined('LIB_ROOT')) {
    define('LIB_ROOT', dirname(__FILE__) . '/../../lib/');
    define('HELP_ROOT', dirname(__FILE__) . '/../../helper/');
    //Libraries for run api
    require(LIB_ROOT . 'Slim/Slim.php');
    require(LIB_ROOT . 'simple_html_dom.php');
//    require(LIB_ROOT . 'NotORM.php');
    require(LIB_ROOT . 'class.File.php');
//    require(LIB_ROOT . 'Valitron/Validator.php');
    //Libraries for debug and benckmark
//    require(LIB_ROOT . 'Kint/Kint.class.php');
    require(LIB_ROOT . 'Ubench.php');
    //Libraries for debug and benckmark
    require(HELP_ROOT . 'XMLHelper.php');
}
require 'class.VNExpress.php';
require 'getNews.php';

if (MODE_APP === "RELEASE") {
    $app = new News();
    $app->enable();
} else {
    $bench = new Ubench;
    $bench->start();
    
    $app = new News();
    $app->enable();
    
    $bench->end();
    $str = PHP_EOL . 'Time: ' . $bench->getTime(true) . ' microsecond -> ' . $bench->getTime(false, '%d%s');
    $str .= PHP_EOL . 'MemoryPeak: ' . $bench->getMemoryPeak(true) . ' bytes -> ' . $bench->getMemoryPeak(false, '%.3f%s');
    $str .= PHP_EOL . 'MemoryUsage: ' . $bench->getMemoryUsage(true);
    s9Helper\MyFile\Log::write($str, APP_NAME, "test");
    unset($str);
}


?>
