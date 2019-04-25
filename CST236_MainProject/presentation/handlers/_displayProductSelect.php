<?php
require_once '../../Autoloader.php';


?>
<style>
hr {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>

<div class="container">
		<div class="jumbotron">
			<h1 class="display-3">
				<?php echo $product[0]['carYear'] . " " . $product[0]['carMake'] . " " . $product[0]['carModel'] ?>
			</h1>
			<h1 class="display-4">
				<?php echo "$" . number_format(($product[0]['carPrice']), 2, '.', ',') ?>
			</h1>
			<p class="lead">
				<?php echo "VIN: " . $product[0]['carVin'] . "<hr>Vehicle ID: " . $product[0]['ID'] . "<hr>Description: <ul><li>" 
        . $product[0]['carDescription'] . "</li></ul><hr>"?>
			</p>
			<p class="text-center mt-4">
				<a class="btn btn-dark btn-lg"
					href="#"
					role="button">Add to cart (Function not yet implemeted)</a>
			</p>
		</div>
</div>







