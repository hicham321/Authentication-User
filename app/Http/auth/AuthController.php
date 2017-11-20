<?php

namespace App\Http\auth;

use Slim\Views\Twig as View;
use App\Controller ;

use App\User as User;

class AuthController extends Controller
{
   public function getSignUp($request, $response){

   	return $this->view->render($response, 'auth/signup.twig');

   }

   public function postSignUp(){

   }


}