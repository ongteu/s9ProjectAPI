<?php

/*
 * Define mode for apis application
 * 2 modes: DEBUG and RELEASE
 */

//define("MODE_APP", "DEBUG");
define("MODE_APP", "RELEASE");

/*
 * REQUIRE for run APIs
 * DO NOT Touch this file if must needed
 */
require_once "../includeLibs.php";

/*
 * Define name of api application choose what ever you want
 */
define("APP_NAME", "Youtify");
require_once APP_NAME . ".php";

/*
 * Function call to start Slim APIs application
 */

function startApp() {
    $dbUser = "s2admin";
    $dbPass = "mdata!6789";
    $dbHost = "localhost";
    $dbName = "YoutifyDotCom";

    $app = new Youtify($dbHost, $dbName, $dbUser, $dbPass);
    $app->enable();
}

/*
 * Run Slim app in mode defined
 */
if (MODE_APP === "RELEASE") {
    startApp();
} else {
    $bench = new Ubench;
    $bench->start();
    startApp();
    $bench->end();
    $str .= PHP_EOL . 'Time: ' . $bench->getTime(true) . ' microsecond -> ' . $bench->getTime(false, '%d%s');
    $str .= PHP_EOL . 'MemoryPeak: ' . $bench->getMemoryPeak(true) . ' bytes -> ' . $bench->getMemoryPeak(false, '%.3f%s');
    $str .= PHP_EOL . 'MemoryUsage: ' . $bench->getMemoryUsage(true);
    MyFile\Log::write($str, APP_NAME, "TestDEBUG");
    unset($str);
}
