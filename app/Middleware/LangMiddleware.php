<?php

namespace App\Middleware\LangMiddleware;



/**
* 
*/
class LangMiddleware extends Middleware
{

	public function __invoke($request, $response, $next){
        
        if(isset($_SESSION['lang'])){

      	    $this->container->view->getEnvironment()->addGlobal('lang',$_SESSION['lang']);
        }
      	$_SESSION['lang']= $request->getParams();
      	$response= $next($request,$response);
      	

      	return $response;
      }
	
	
}