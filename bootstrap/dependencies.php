<?php
use Respect\Validation\Validator as v;


//Authentication
$container['auth']= function($container){

    return new \App\Auth\Auth;
};

// The views
$container['view']= function($container){
    $view= new \Slim\Views\Twig(__DIR__ .'/../resources/views',['cache'=> false,]);

    $view-> addExtension(new \Slim\Views\TwigExtension(
     $container->router,
     $container->request->getUri()

    ));
    $view->getEnvironment()->addGlobal('auth', [
     'check' =>$container->auth->checkAuth(),
     'user' => $container->auth->user(),
    ]);

    $view->getEnvironment()->addGlobal('flash', $container->flash);

    return $view;

};
//the validator
$container['validator']= function($container){

    return new \App\Validation\Validator;
};

// the controllers 
$container['HomeController']= function($container){

    return new \App\Http\Controllers\HomeController($container);
};
$container['AuthController']= function($container){

    return new \App\Http\auth\AuthController($container);
};
$container['ChangePasswordController']= function($container){

    return new \App\Http\auth\ChangePasswordController($container);
};



//The database
$container['db']= function($container) use($capsule){

    return $capsule;
};
//csrf
$container['csrf']= function($container){

    return new \Slim\Csrf\Guard;
};
// flash messages
$container['flash']= function($container){

    return new \Slim\Flash\Messages;
};

//middleware dependencies
$app->add(new \App\Middleware\OldInputMiddleware($container));
$app->add(new \App\Middleware\ValidationErrorsMiddleWare($container));
$app->add(new \App\Middleware\CsrfViewMiddleware($container));

$app->add($container->csrf);

v::with('App\\Validation\\Rules\\');


