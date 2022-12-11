<?php
require_once('../settings.php');
require_once('../theme/header.php');
	
if(count($_POST)>0){
	$query=$connection->prepare('UPDATE drivers SET firstname=?, lastname=?, vehicle=?, vehicle_rank=?, vehicle_description=?, status=?, countries=?, states=?, cities=? WHERE ID=?');
	$query->execute([$_POST['firstname'],$_POST['lastname'],$_POST['vehicle'],$_POST['vehicle_rank'],$_POST['vehicle_description'],$_POST['status'],$_POST['countries'],$_POST['states'],$_POST['cities'],$_GET['id']]);
}
$query=$connection->prepare('SELECT * FROM drivers WHERE ID=?');
$query->execute([$_GET['id']]);
$drivers=$query->fetch();

?>

<form method="POST">
First Name:<input type="text" name="firstname" value="<?= $drivers['firstname'] ?>" /><br />
Last Name:<input type="text" name="lastname" value="<?= $drivers['lastname'] ?>" /><br />
Vehicle:<input type="text" name="vehicle" value="<?= $drivers['vehicle'] ?>" /><br />
Vehicle Rank <input type="text" name="vehicle_rank" value="<?= $drivers['vehicle_rank'] ?>" /><br />
Vehicle Description:<input type="text" name="vehicle_description" value="<?= $drivers['vehicle_description'] ?>" /><br />
Status:<input type="text" name="status" value="<?= $drivers['status'] ?>" /><br />
Country:<input type="text" name="countries" value="<?= $drivers['countries'] ?>" /><br />
State:<input type="text" name="states" value="<?= $drivers['states'] ?>" /><br />
City:<input type="text" name="cities" value="<?= $drivers['cities'] ?>" /><br />
<button type="submit">Submit</button>
</form>

<?php
if($_SESSION['role'] == 1) {
	echo '<a href="../rides/driverrides.php">Back to Rides</a>';
} else if ($_SESSION['role'] == 2) {
	echo '<a href="adminindex.php">Back to Index</a>';
}

require_once('../theme/footer.php');

?>