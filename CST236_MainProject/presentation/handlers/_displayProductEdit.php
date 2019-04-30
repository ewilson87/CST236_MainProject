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


<div class="container text-center">
	<div class="row mb-4 justify-content-center">
        <div class="col-sm-12">
            <div class="card border-warning mb-3">
                <div class="card-header bg-dark text-light border-warning">
                	<h1>Vehicle Edit</h1>
                </div>
                <form method="post" action="productAdminHandler.php">
    				<div class="card-body text-left bg-info">
    					<input type="hidden" id="ID" name="ID" value="<?php echo $product[0]['ID'] ?>">
    					<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text text-center" style="width: 120px" id="id-addon">ID</span>
  							</div>
  							<input type="text" class="form-control" value="<?php echo $product[0]['ID'] ?>" aria-label="id" aria-describedby="id-addon" disabled>
  							<div class="input-group-append"> 
    							<span class="input-group-text">Note: Cannot alter ID</span>
    						</div>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text text-center" style="width: 120px" id="make-addon">Make</span>
  							</div>
  							<input type="text" class="form-control" name="carMake" value="<?php echo $product[0]['carMake'] ?>" aria-label="Make" aria-describedby="make-addon" required>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="model-addon">Model</span>
  							</div>
  							<input type="text" class="form-control" name="carModel" value="<?php echo $product[0]['carModel'] ?>" aria-label="Model" aria-describedby="model-addon" required>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="year-addon">Year</span>
  							</div>
  							<input type="text" class="form-control" name="carYear" value="<?php echo $product[0]['carYear'] ?>" aria-label="Year" aria-describedby="year-addon" required>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="vin-addon">VIN</span>
  							</div>
  							<input type="text" class="form-control" name="carVin" value="<?php echo $product[0]['carVin'] ?>" aria-label="VIN" aria-describedby="vin-addon" required>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="price-addon">Price</span>
  							</div>
  							<input type="text" class="form-control" name="carPrice" value="<?php echo $product[0]['carPrice'] ?>" aria-label="Price" aria-describedby="price-addon" required>
  							<div class="input-group-append">
    							<span class="input-group-text">Note: Do not include $ or ,</span>
    						</div>
						</div>
						<hr>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="description-addon">Description</span>
							</div>
                          <textarea class="form-control" name="carDescription" aria-label="description" required><?php echo $product[0]['carDescription'] ?></textarea>
                        </div>
                        <hr>
                    </div>
                    <div class="card-footer bg-dark text-light border-warning">
                		<button class="btn btn-secondary border border-warning" data-toggle="confirmation" name="productEditSave" type="submit">Submit</button>
                	</div>
                </form>
        	</div>
    	</div>
	</div>
</div>

