<?php
// book ride with info {}- HTML side is done, possibly send to a request list?
// updates driver data. {}-



?>

<form action="ride.php" method="post">
<div class="media">
  <div class="media-body">
    <h5 class="mt-0 mb-1">Request Pickup</h5>
	<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Email and Password</span>
  </div>
  <input type="text" aria-label="First name" class="form-control">
  <input type="text" aria-label="First name" class="form-control">
  <div>
  Country:
  <input type="text" aria-label="First name" class="form-control">
  </div>
  <div>
  State: 
  <input type="text" aria-label="Last name" class="form-control">
  </div>
  <div>
  City: 
  <input type="text" aria-label="Last name" class="form-control">
  </div>
  <div>
  Pickup:
  <input type="text" aria-label="address" class="form-control">
  </div>
  <div>
  Dropoff: 
  <input type="text" aria-label="address" class="form-control">
  </div>
  <div>
  Driver: 
  <select class="custom-select" id="inputGroupSelect01">
    <option selected>Choose...</option>
	<?php
	//Needs work allows the list of available drivers to be selected for a ride
	// change if does not work with ideas
	if(file_exists('rides/index.php')){
		$fh=fopen('rides/index.php', 'r');
		
		$index=1;
		?>
		<select name='drivers'>
	<?php
		while ($line=fgets($fh)){
			?>
			
			
			<option value='<?php echo $category ?>'><?php echo $catgeory ?></option>
			
			<?php
			$index++;
		}
		
		?>
		</select>
		<?php
		fclose($fh);
	}

?>
</div>
  </div>
  <a class="btn btn-primary" href="ride.php" role="button">
  <button type="button" class="btn btn-primary">Book Ride</button>
  </a>
  
</div>