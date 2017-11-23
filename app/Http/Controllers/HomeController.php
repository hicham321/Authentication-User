<?php

namespace App\Http\Controllers;

use Slim\Views\Twig as View;
use App\Controller ;

use App\User as User;

class HomeController extends Controller
{


 public function index ($request,$response){
    //$this->flash->addMessage('error','test message');
   	return $this->view->render($response,'home.twig');

 }
 //takes you to info page
 public function info ($request,$response){

   	
   	return $this->view->render($response,'info.twig');

 }

}