<?php

session_start();

require __DIR__ .'/../vendor/autoload.php';


$settings= [
    'displayErrorDetails'=> true,
];
$app= new \Slim\App(['settings'=> $settings]);

$container = $app-> getContainer();

require __DIR__ .'/../routes/web.php';

require_once __DIR__.'/dependencies.php';

