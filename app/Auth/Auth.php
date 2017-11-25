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
              //Sets the global session variable to the id of the user
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

	    //checks if the user is signed in 

		public function changePassword($oldPassword,$newPassword){

			if (isset($_SESSION['user'])) {
	            $user= User::find($_SESSION['user']);
	        }

			if (password_verify($oldPassword,$user->password)) {
               $user->password= password_hash($newPassword,PASSWORD_DEFAULT);
               $user->save();
               return true;
			}

			return false;
		}
	}