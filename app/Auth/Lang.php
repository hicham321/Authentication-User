<?php

namespace App\Auth;

/**
* 
*/
class Lang
{
	
	 /*
    @param $prefLocales: sorted array of prefered languages
    @return the language with the max score.
       @type: String 
       @value: 'en'|'fr'
     */
    public function chooseLanguage($prefLocales){

    	$fallbackLocal='en';

        if(isset($prefLocales['fr']) && isset($prefLocales['en'])){
        	if($prefLocales['fr']> $prefLocales['en']){      
                return 'fr';
            }

        }
        if(isset($prefLocales['fr']) && !isset($prefLocales['en'])){
         
            return 'fr';
        }


        return $fallbackLocal;
    }
	
}