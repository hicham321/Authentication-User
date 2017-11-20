<?php

// The views
$container['view']= function($container){
    $view= new \Slim\Views\Twig(__DIR__ .'/../resources/views',['cache'=> false,]);

    $view-> addExtension(new \Slim\Views\TwigExtension(
     $container->router,
     $container->request->getUri()

    ));

    return $view;

};


// the controllers 
$container['HomeController']= function($container){

    return new \App\Http\Controllers\HomeController($container);
};
$container['AuthController']= function($container){

    return new \App\Http\auth\AuthController($container);
};


//The database
$container['db']= function($container) use($capsule){

    return $capsule;
};