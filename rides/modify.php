<?php
//modify.php
require_once('../settings.php');

if($_SESSION['role']==0){
	die('You are not authorized to modify this request');
	
}
if(count($_POST)>0){
	$query=$connection->prepare('UPDATE rides SET pickup_location=?, dropoff_location=? WHERE ID=? ');
	$query->execute([$_POST['pickup_location'],[$_POST['dropoff_location'],[$_GET['ID']]]]);

}

$query=$connection->prepare('SELECT * FROM rides WHERE ID=?');
$query->execute([$_GET['id']]);
$category=$query->fetch();

?>

<form method="POST">
<div>
Change Pickup location to: 
<input name="name" type="text" value="<?= $category['pickup_location'] ?>"/>
<button type="submit">Submit</button>
</div>
<div>
Change Dropoff location to:
<input name="name" type="text" value="<?= $category['dropoff_location'] ?>"/>
<button type="submit">Submit</button>
</div>
</form>