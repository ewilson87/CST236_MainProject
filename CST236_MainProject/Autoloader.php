<?php

/**
 * CST-236 Main Project
 * Autoloader.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * Autoloader for dependencies
 */

/* function my_autoloader($class){
    // get the difference in folders between the location of autoloader and the file that called autoloader
    $lastdirectories = substr(getcwd(), strlen(__DIR__));
    
    // count the number of slashes (folder depth)
    $numberoflastdirectories = substr_count($lastdirectories, '\\');
    
    // this is the list of possible locations that classes are found in this app.
    $directories = ['businessService', 'businessService/model', 'database', 'presentation',
        'presentation/handlers', 'presentation/views', 'presentation/views/login', 'utility' ];
    
    // look inside each directory for the desired class
    foreach($directories as $d){
        $currentdirectory = $d;
        for ($x = 0; $x < $numberoflastdirectories; $x++){
            $currentdirectory = "../" . $currentdirectory;
        }
        $classfile = $currentdirectory . '/' . $class . '.php';
        
        if (is_readable($classfile)){
            echo "it works";
            if (require $d . '/' . $class . '.php'){
                break;
            }
        }
    }
} */


spl_autoload_register(function($class){
    
    // get the difference in folders between the location of autoloader and the file that called autoloader
    $lastdirectories = substr(getcwd(), strlen(__DIR__));
    
    // count the number of slashes (folder depth)
    $numberoflastdirectories = substr_count($lastdirectories, '\\');
    
    // this is the list of possible locations that classes are found in this app.
    $directories = ['businessService', 'businessService/model', 'database', 'presentation', 
        'presentation/handlers', 'presentation/views', 'presentation/views/login', 'utility' ];
    
    // look inside each directory for the desired class
    foreach($directories as $d){
        $currentdirectory = $d;
        for ($x = 0; $x < $numberoflastdirectories; $x++){
            $currentdirectory = "../" . $currentdirectory;
        }
        $classfile = $currentdirectory . '\\' . $class . '.php';
        
        if (is_readable($classfile)){
            if (require $d . '\\' . $class . '.php'){
                //echo "autoloader working<br>";
                break;
            }
        }
        
    }
});