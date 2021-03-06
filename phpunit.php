<?php

define('LAPPUSE_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Load Tower
|--------------------------------------------------------------------------
|
| This bootstraps the framework and loads up this application.
|
*/
$tower = require_once __DIR__.'/bootstrap.php';


/*
|--------------------------------------------------------------------------
| Run The Tower Phpunit Application
|--------------------------------------------------------------------------
|
| When we run the console application, the current CLI command will be
| executed in this console and the response sent back to a terminal
| or another output device for the developers. Here goes nothing!
|
*/
$tower->phpunit->run();