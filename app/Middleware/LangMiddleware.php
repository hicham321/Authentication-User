<?php

namespace App\Middleware;

use App\Translation\TranslatorExtension;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;


/**
* 
*/
class LangMiddleware extends Middleware
{

	public function __invoke(\Slim\Http\request $request, $response, $next)  {
        
       
    }
    
   
	
}