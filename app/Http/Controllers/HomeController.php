<?php

namespace App\Http\Controllers;

use Slim\Views\Twig as View;
use App\Controller ;

class HomeController extends Controller
{


   public function index ($request,$response){


   	return $this->view->render($response,'home.twig');

 }

}