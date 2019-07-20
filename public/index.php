<?php

/**
 * Lappuse - A PHP Framework For Web Artisans
 *
 * @package  Lappuse
 * @author   Mert Kabadayı <mert@lappuse.io>
 */

define('LAPPUSE_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Load the Tower factory
|--------------------------------------------------------------------------
|
| This bootstraps the framework and loads up this application.
|
*/

$tower = require_once __DIR__.'/../bootstrap.php';

/*
|--------------------------------------------------------------------------
| Running the Http Application
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

//$tower->http->handle(new Reponse, new Request);
$tower->http->run();