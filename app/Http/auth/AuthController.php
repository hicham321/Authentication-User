<?php

namespace App\Http\auth;

use Slim\Views\Twig as View;
use App\Controller ;

use App\User as User;

use Respect\Validation\Validator as v;

class AuthController extends Controller
{  

   protected $redirectTo='signup';

   //signin  get
   public function getSignIn($request, $response){

    $this->view->render($response, 'auth/signin.twig');
   }


   //sign in post
   public function postSignIn($request, $response){

    $auth= $this->auth->
    attempt($request->getParam('email'),
            $request->getParam('password')
       );
    //return to signin page when incorrect
    if (!$auth) {

         $this->flash->addMessage('error',' Could\'t sign in user');

         return $response->withRedirect($this->router->pathFor('auth.signin'));   
    }
    $this->flash->addMessage('info','User signed in with success');


    return $response->withRedirect($this->router->pathFor('home'));  
    
   }

   //sign up function
   public function getSignUp($request, $response){

    

   	return $this->view->render($response, 'auth/signup.twig');

   }
   

   //post sign up function
   public function postSignUp($request, $response){

   	$validation = $this->validator->validate($request,[

   		'email'=> v::noWhitespace()->notEmpty()->UniqueMail(),

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
    	//success flash message
      $this->flash->addMessage('info',' User signed up with success');
      //attempt to sign in the user after signing up
      $this->auth->attempt($request->getParam('email'),
            $request->getParam('password'));

      return $response->withRedirect($this->router->pathFor('home'));
    }
    else{
        //flash failure message
        $this->flash->addMessage('error','Couldn\'t add user, something went wrong');
     }

   }
   // sign out method
   public function getSignOut($request, $response){
    
     $this->auth->attemptSignout();

     return $response->withRedirect($this->router->pathFor('home'));

   }


}