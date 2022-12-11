<?php
require_once('../settings.php');
?>

<div class="container">
<h1>List of all rides</h1>
<?php
if($_SESSION['role']!=2){
	die('You are not authorized');
	
}
$result=$connection->query('SELECT * FROM rides GROUP BY ID');
require_once('../theme/header.php');
?>

<?php
echo '<table>
		<th>Ride ID&emsp;</th>
		<th>Status</th>
		<th>Pickup Location</th>
		<th>Dropoff Location</th>
		<th>Pickup Date</th>
		<th>Cost</th>';
	
while($rides=$result->fetch()){
	echo '<tr>
		<td>'.$rides['ID'].'</td>
		<td>'.$rides['status'].'</td>
		<td>'.$rides['pickup_location'].'</td>
		<td>'.$rides['dropoff_location'].'</td>
		<td>'.$rides['date_pickup'].'</td>
		<td>$'.$rides['cost'].'</td>
		<td><a href="delete.php?rideid='.$rides['ID'].'">Delete</a></td>
		<td><a href="modify.php?id='.$rides['ID'].'">Modify</a></td>
	</tr>';
}
echo '</table>';
require_once('../theme/footer.php');
?>
</div>