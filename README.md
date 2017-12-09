 # Slim-Authentication
 
 This is a skeleton project that implements user authetication (SignIn, SignUp, Changing Paswword), and implements CSRF protection and adds translation mechanism, this project was mainly created to get you up and running with your Slim web Application.
 
 ### Prerequisites
 I used the Composer dependency manager to install my dependencies, the dependencies can be found in the project's Composer.json file:
 
 ```
 {
    "require": {
        "slim/slim": "^3.0",
        "slim/twig-view": "^2.3",
        "illuminate/database": "^5.5",
        "respect/validation": "^1.1",
        "slim/csrf": "^0.8.2",
        "slim/flash": "^0.4.0",
        "illuminate/translation": "^5.5"

    },

    "autoload": {

    	"psr-4":{
    		"App\\":"app"
    	}
    }
}
```

 
 ### Installing
After importing the project into your workspace and after installing Composer (if you don't have it available) all you need to do is open the project on a terminal and do:
```
composer install
```
## Built With

* [Slim 3](https://www.slimframework.com/) - The web framework used.
* [Composer](https://getcomposer.org/) - php dependency manager.
* [Twig](https://twig.symfony.com/) - Templating engine for php.

## Usage

Run the application and go on (http://localhost/user/public/).




 
 
 
 

