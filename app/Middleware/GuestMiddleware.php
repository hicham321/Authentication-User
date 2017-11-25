<?php
namespace App\Middleware;

class GuestMiddleware extends Middleware{

      public function __invoke($request, $response, $next){


      	if ($this->container->auth->checkAuth())
        {

          $this->container->flash->addMessage('error','user is already authenticated');
          return $response->withRedirect($this->container->router->pathFor($this->container->view));
        }

      	
      	$response= $next($request,$response);
      	

      	return $response;
      }

}

