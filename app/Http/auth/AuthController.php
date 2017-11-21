<?php

namespace App\Http\auth;

use Slim\Views\Twig as View;
use App\Controller ;

use App\User as User;

use Respect\Validation\Validator as v;

class AuthController extends Controller
{  

   protected $redirectTo='signup';

   //sign up function
   public function getSignUp($request, $response){

   	return $this->view->render($response, 'auth/signup.twig');

   }
   

   //post sign up function
   public function postSignUp($request, $response){

   	$validation = $this->validator->validate($request,[

   		'email'=> v::noWhitespace()->notEmpty(),

   		'name'=> v::noWhitespace()->notEmpty()->alpha(),

   		'password'=> v::noWhitespace()->notEmpty(),

   	]);

   	if ($validation->failed()) {
   		 return $response->withRedirect($this->router->pathFor('auth.signup'));

   	}

   	//var_dump($request->getParams());

   	$user= new User;
    $user->userName= $request->getParam('name');
    $user->email= $request->getParam('email');
    $user->password= password_hash($request->getParam('password'),PASSWORD_DEFAULT);

    if($user->save()){
    	//success 
        return $response->withRedirect($this->router->pathFor('home'));
    }
    else{
        //flash failure message
    	echo 'something went wrong';
    }

   }


}