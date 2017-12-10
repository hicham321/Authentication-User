<?php
use Respect\Validation\Validator as v;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use App\Translation\TranslatorExtension;
use \App\Auth\Lang as language;




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
     // add translator functions to Twig
    //$view->addExtension(new TranslatorExtension($container->get('translator')));
    
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
$app->add(function (\Slim\Http\Request $request, $response, $next) use ($container) {

        //$lang = $request->getHeader('Accept-Language');
        $prefLocales = array_reduce(explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']), 
                    function ($res, $el) { 

                        list($l, $q) = array_merge(explode(';q=', $el), [1]); 
                        $res[$l] = (float) $q; 
                        return $res; 

                    }, []);

        arsort($prefLocales);
        
        // $lang could be something like 'de-DE,de;q=0.9,en-US;q=0.8,en;q=0.7'
        // see above link for more information about parsing it
        //$parsedLang = parseLang($lang);
        $parsedLang= language::chooseLanguage($prefLocales);
        $loader = new FileLoader(new Filesystem(),  __DIR__ . '/../resources/lang' );

        $translator = new Translator($loader, $parsedLang);

        // add the extension to twig
        $container->view->addExtension(new TranslatorExtension($translator));

        // execute the other middleware and the actual route
         
            

        return $next($request,$response);;
    });


v::with('App\\Validation\\Rules\\');


