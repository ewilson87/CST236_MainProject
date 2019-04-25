<?php
/**
 * CST-236 Main Project
 * index.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * Used to report errors to the user
 */

require_once '../../../header.php';

 //if there are any errors, loop through array and echo each one
    if (count($errors) > 0) : ?>
 
 
             <div class="container mb-4">
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body text-center bg-danger">
					<h3 class="card-title">
        <?php foreach ($errors as $error) : ?>

						<?php echo $error ?>
						<hr>

        <?php endforeach ?>
					</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<?php  endif ?>

