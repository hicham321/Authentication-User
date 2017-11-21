<?php
namespace App\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;

use App\User as User;

/**
* 
*/
class UniqueMail extends AbstractRule
{
	
	public function validate($input)
	{
      
      
      return User::where('email',$input)->count()===0;

	}
}