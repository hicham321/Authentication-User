<?php

	namespace App\Auth;

	use App\User as User;

	/**
	* 
	*/
	class Auth 
	{
		
		public function attempt($email, $password)
		{
			//get user by email
			$user = User::where('email', $email)->first();

			if (!$user) {

	          return false;
			}


			if (password_verify($password,$user->password)) {

			  $_SESSION['user']=$user->id;
	          return true;

			}

			return false;
			
		}
		//checks if the user is signed in 

		public function checkAuth(){

			return isset($_SESSION['user']);
		}

		//Grabs the signed in user
		public function user(){
			
	        if (isset($_SESSION['user'])) {
	            return User::find($_SESSION['user']);
	        }
		    return false;
	    }
	    
        //attempt sign out
	    public function attemptSignout(){

	    	 if (isset($_SESSION['user'])) {
	            unset($_SESSION['user']);
	        }
	    }
	}