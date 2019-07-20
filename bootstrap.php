<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/
require __DIR__.'/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Create The Tower Factory
|--------------------------------------------------------------------------
|
| It is a good way to configure and start the built-in packages that come with 
| the factory-class Tower. The factory is very flexible and supports many PSR 
| standards. Create a factory object by adding the main path of your application.
|
*/
$factory = new Lappuse\Tower\Factory(realpath(__DIR__));

/*
|--------------------------------------------------------------------------
| Running the Tower Application
|--------------------------------------------------------------------------
|
| This application is its own embedded application of the tower. Because it is 
| started before other applications, it is responsible for preparing the packages 
| added to the system. Thus your other applications that will work in your web 
| environment will have access to the packages.
|
*/
$factory->tower->run();

/*
|--------------------------------------------------------------------------
| Return The Factory
|--------------------------------------------------------------------------
|
| This command gives an example of your application created in the factory to 
| the called script. Thus, the creation of the samples may leave the real work 
| of the application and send it.
|
*/
return $factory;