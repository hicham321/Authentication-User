<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/',function($request, $response){


    
	return $this->view->render($response,'home.twig');
});

$app->get('/home','HomeController:index')->setName('home');

$app->get('/info','HomeController:info')->setName('info');



//grouping sign up and sign in together to not get accessed by authenticated users 

$app->group('',function(){

	$this->get('/auth/signup','AuthController:getSignUp')->setName('auth.signup');

    $this->post('/auth/signup','AuthController:postSignUp');

    $this->get('/auth/signin','AuthController:getSignIn')->setName('auth.signin');

    $this->post('/auth/signin','AuthController:postSignIn');

})->add(new GuestMiddleware($container));



//grouping sign out and change password together to not get accessed by unauthenticated users 
$app->group('',function(){
	$this->get('/auth/signOut','AuthController:getSignOut')->setName('auth.signOut');

    //change password 
    $this->get('/auth/changePass','ChangePasswordController:getChangePass')->setName('auth.changePass');

    $this->post('/auth/changePass','ChangePasswordController:postChangePass');


})->add(new AuthMiddleware($container));




