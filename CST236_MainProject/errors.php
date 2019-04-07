<?php
/**
 * CST-236 Main Project
 * index.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * Used to report errors to the user
 */

require_once 'header.php';

 //if there are any errors, loop through array and echo each one
    if (count($errors) > 0) : ?>
 
    <div class="error">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>