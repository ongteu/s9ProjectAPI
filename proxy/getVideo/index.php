<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('LIB_ROOT')) {
    define('LIB_ROOT', dirname(__FILE__) . '/../../lib/');
    define('HELP_ROOT', dirname(__FILE__) . '/../../helper/');
    //Libraries for run api
    require(LIB_ROOT . 'Slim/Slim.php');
    require(LIB_ROOT . 'simple_html_dom.php');
    require(LIB_ROOT . 'class.File.php');
//    require(LIB_ROOT . 'Valitron/Validator.php');
    //Libraries for debug and benckmark
//    require(LIB_ROOT . 'Kint/Kint.class.php');
//    require(LIB_ROOT . 'Ubench.php');
    //Libraries for debug and benckmark
    require(HELP_ROOT . 'XMLHelper.php');
}

require '../core/class.GoogleVideo.php';
require '../core/class.MovieTubeCC.php';
require '../core/getStreamMP4.php';

//$bench = new Ubench;
//START BenchMark
//$bench->start();

$getLink = new getStreamLinkMP4();
$getLink->enable();

//END BenchMark
//$bench->end();
//$str .= PHP_EOL . 'Time: ' . $bench->getTime(true) . ' microsecond -> ' . $bench->getTime(false, '%d%s');
//$str .= PHP_EOL . 'MemoryPeak: ' . $bench->getMemoryPeak(true) . ' bytes -> ' . $bench->getMemoryPeak(false, '%.3f%s');
//$str .= PHP_EOL . 'MemoryUsage: ' . $bench->getMemoryUsage(true);
//MyFile\Log::write($str);
//unset($str);
?>
