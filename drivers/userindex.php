<?php

require_once('../settings.php');

require_once('../theme/header.php');
$result=$connection->query('SELECT * FROM drivers GROUP BY ID');
?>
<div class="container">
<h1>Available Drivers</h1>
<table>
    <tr>
		<th>Name</th>
		<th>Vehicle</th>
		<th>Vehicle Rank</th>
		<th>Country</th>
        <th>State</th>
        <th>City</th>
    </tr>
<?php
while($drivers=$result->fetch()){
?>
	<tr>
		<td><?= $drivers['firstname'] ?> <?= $drivers['lastname'] ?></td>
		<td><?= $drivers['vehicle'] ?></td>
		<td><?= $drivers['vehicle_rank'] ?></td>
		<td><?= $drivers['countries'] ?></td>
		<td><?= $drivers['states'] ?></td>
		<td><?= $drivers['cities'] ?></td>
		<td><a href="../rides/bookride.php?userid=<?= $_SESSION['ID'] ?>&driverid=<?= $drivers['ID'] ?>">Book</a></td>
	</tr>
<?php
}
?>
</table>
</div>
<br><br>
<a href="../users/modify.php?userid=<?= $_SESSION['ID'] ?>">Edit my Profile</a>
<?php
require_once('../theme/footer.php');
?>

