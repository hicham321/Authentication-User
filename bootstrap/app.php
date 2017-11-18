<?php

session_start();

require __DIR__ .'/../vendor/autoload.php';


$settings= [
    'displayErrorDetails'=> true,
];
$app= new \Slim\App(['settings'=> $settings]);

require __DIR__ .'/../routes/web.php';


