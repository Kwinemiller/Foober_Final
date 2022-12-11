<?php
require_once('../settings.php');
require_once('../theme/header.php');

$result=$connection->query('SELECT * FROM rides WHERE driver_ID='.$_SESSION['ID'].'');

?>

<h1>Your Rides</h1><br>
<table>
    <tr>
        <th>Destination&emsp;</th>
        <th>Ride Cost&emsp;</th>
        <th>Status&emsp;</th>
    </tr>
<?php
while($rides=$result->fetch()) {
?>
    <tr>
        <td><?= $rides['dropoff_location'] ?></td>
        <td><?= $rides['cost'] ?></td>
        <td><?= $rides['status'] ?></td>
        <td><a href="delete.php?rideid=<?= $rides['ID'] ?>">Cancel Ride</a></td>
    <tr>
<?php 
}
?>
<table>
<?php

require_once('../theme/footer.php');

?>

<br><br>
<a href="../drivers/modify.php?id=<?= $_SESSION['ID'] ?>">Edit My Profile</a>