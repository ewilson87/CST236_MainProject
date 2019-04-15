<?php

/**
 * CST-236 Main Project
 * Autoloader.php version 2.0
 * Program Author: Evan Wilson
 * Date: 15 April 2019
 * Autoloader for dependencies, works with both // and \ formats
 */


spl_autoload_register(function($class){
    
    // get the difference in folders between the location of autoloader and the file that called autoloader
    $lastdirectories = substr(getcwd(), strlen(__DIR__));
    
    // count the number of slashes (folder depth)
    $numberoflastdirectories = substr_count($lastdirectories, '\\');
    
    // compatibility check between systems (Windows localhost uses \\ where Heroku cloud uses /
    if ($numberoflastdirectories == 0){
        $numberoflastdirectories = substr_count($lastdirectories, '/');
        $alternate = true;
    }
    
    // this is the list of possible locations that classes are found in this app.
    $directories = ['businessService', 'businessService/model', 'database', 'presentation', 
        'presentation/handlers', 'presentation/views', 'presentation/views/login', 'utility' ];
    
    // look inside each directory for the desired class
    foreach($directories as $d){
        $currentdirectory = $d;
        for ($x = 0; $x < $numberoflastdirectories; $x++){
            if (isset($alternate) && !$alternate){
                $currentdirectory = "..\\" . $currentdirectory;
            }
            else {
                $currentdirectory = "../" . $currentdirectory;
            }
        }
        if (isset($alternate) && !$alternate){
            $classfile = $currentdirectory . '\\' . $class . '.php';
        }
        else {
            $classfile = $currentdirectory . '/' . $class . '.php';
        }
        
        if (is_readable($classfile)){
            if (isset($alternate) && !$alternate){
                if (require $d . '\\' . $class . '.php'){
                    //echo "autoloader working<br>";
                    break;
                }
            }
            else {
                if (require $d . '/' . $class . '.php'){
                    //echo "autoloader working<br>";
                    break;
                }
            }
        }
        
    }
});