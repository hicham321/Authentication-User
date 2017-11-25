<?php

namespace App\Http\auth;

use Slim\Views\Twig as View;
use App\Controller ;

use App\User as User;

use Respect\Validation\Validator as v;

class ChangePasswordController extends Controller
{  
    
    public function getchangePass($request,$response){

      return $this->view->render($response, 'auth/changePass.twig');

    }

    public function postChangePass($request,$response){

     
    $validation = $this->validator->validate($request,[

      'newPass'=> v::noWhitespace()->notEmpty(),

      'oldPass'=> v::noWhitespace()->notEmpty(),

    ]);

    if ($validation->failed()) {
       return $response->withRedirect($this->router->pathFor('auth.changePass'));

    }

    $authPass= $this->auth->changePassword($request->getParam('oldPass'),$request->getParam('newPass'));

    if (!$authPass) {
        $this->flash->addMessage('error','Wrong password');
        return $response->withRedirect($this->router->pathFor('home'));

    }


    $this->flash->addMessage('info','Password Changed with success');

    return $response->withRedirect($this->router->pathFor('home'));
 

    }

}