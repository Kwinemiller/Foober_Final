<?php
require_once('../settings.php');
require_once('../theme/header.php');

$result=$connection->query('SELECT * FROM rides WHERE id='.$_GET['rideid'].'');
$currentride=$result->fetch();


?>

<h1>Your Ride</h1><br>
Destination: <?= $currentride['dropoff_location'] ?><br>
Ride Cost: $<?= $currentride['cost'] ?><br>
Status: <?= $currentride['status'] ?><br>

<a href="delete.php?rideid=<?= $_GET['rideid'] ?>">Cancel Ride</a>

<?php

require_once('../theme/footer.php');

?>
