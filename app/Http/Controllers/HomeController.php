<?php

namespace App\Http\Controllers;

use Slim\Views\Twig as View;
use App\Controller ;

use App\User as User;

class HomeController extends Controller
{


   public function index ($request,$response){

   	/*$user=User::where('userName', 'kk')->first();
   	User::create(['userName'=>'jiji'
   		,'email'=> 'ghfdhf@gherbi']);
    var_dump($user->email);


    die();*/
   	return $this->view->render($response,'home.twig');

 }

}