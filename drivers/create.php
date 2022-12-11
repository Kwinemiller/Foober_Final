<?php
require_once('../settings.php');
require_once('../theme/header.php');
	
if(count($_POST)>0){
	$query=$connection->prepare('INSERT INTO drivers (firstname, lastname, vehicle, vehicle_rank, vehicle_description, status, countries, states, cities) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$query->execute([$_POST['firstname'],$_POST['lastname'],$_POST['vehicle'],$_POST['vehicle_rank'],$_POST['vehicle_description'],$_POST['status'],$_POST['countries'],$_POST['states'],$_POST['cities']]);
}

?>

<form method="POST">
First Name:<input type="text" name="firstname" /><br />
Last Name:<input type="text" name="lastname"  /><br />
Vehicle:<input type="text" name="vehicle"  /><br />
Vehicle Rank <input type="text" name="vehicle_rank" /><br />
Vehicle Description:<input type="text" name="vehicle_description" /><br />
Status:<input type="text" name="status" /><br />
Country:<input type="text" name="countries" /><br />
State:<input type="text" name="states" /><br />
City:<input type="text" name="cities" /><br />
<button type="submit">Submit</button>
</form>

<a href="adminindex.php">Back to Index</a>

<?php

require_once('../theme/footer.php');

?>