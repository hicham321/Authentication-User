<?php

session_start();

require __DIR__ .'/../vendor/autoload.php';

//database properties
$db= [
	'driver'=>'mysql',
	'host'=>'localhost',
	'database'=>'auth',
	'username'=>'root',
	'password'=>'',
	'charset'=>'utf8',
	'collation'=>'utf8_unicode_ci',
	'prefix'=>''

];
//settings
$settings= [
    'displayErrorDetails'=> true,
    'db'=>$db,
    'translations_path' => __DIR__ . 'app/translation/' // path to the translation files

];


$app= new \Slim\App(['settings'=> $settings]);

$container = $app-> getContainer();

require_once __DIR__ .'/dbConfig.php';

require __DIR__ .'/../routes/web.php';

require_once __DIR__.'/dependencies.php';
