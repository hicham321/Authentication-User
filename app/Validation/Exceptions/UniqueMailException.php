<?php

namespace App\Validation\Exceptions;


use Respect\Validation\Exceptions\ValidationException;




/**
* 
*/
class UniqueMailException extends ValidationException
{
	
	public static $defaultTemplates=[
        self::MODE_DEFAULT=>[
        	self::STANDARD => 'Email is taken.'
        ]

	];
}