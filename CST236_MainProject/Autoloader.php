<?php

/**
 * CST-236 Main Project
 * Autoloader.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * Autoloader for dependencies
 */

function my_autoloader($class){
    require $class . '.php';
}
spl_autoload_register(function($class){
    require $class . '.php';
});