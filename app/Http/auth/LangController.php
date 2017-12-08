<?php


namespace App\Http\auth;
use App\Controller ;
use Slim\Views\Twig as View;

use App\Translation\TranslatorExtension;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;





/**
* 
*/
class LangController extends Controller
{

	//signin  get english
   public function getEnglish($request, $response){

   	$loader = new FileLoader(new Filesystem(),  __DIR__ . '/../resources/lang' );
     // Register the french translator (set to "en" for English)
    $translator = new Translator($loader, "en");

    $this->translator=$translator;

   }

   //signin  get french
   public function getFrench($request, $response){

   	$loader = new FileLoader(new Filesystem(),  __DIR__ . '/../resources/lang' );
     // Register the french translator (set to "en" for English)
    $translator = new Translator($loader, "fr");

    $this->view->translator=$translator;

   }

   //post english
   public function postEnglish($request, $response){

   	$loader = new FileLoader(new Filesystem(),  __DIR__ . '/../resources/lang' );
     // Register the french translator (set to "en" for English)
    $translator = new Translator($loader, "en");

    $this->translator=$translator;

   }


   //post french
   public function postFrench($request, $response){
   	$loader = new FileLoader(new Filesystem(),  __DIR__ . '/../resources/lang' );
     // Register the french translator (set to "en" for English)
    $translator = new Translator($loader, "fr");

    $this->translator=$translator;
   
   }

	
}