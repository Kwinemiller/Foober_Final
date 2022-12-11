<?php

require_once('../settings.php');

require_once('../theme/header.php');
$result=$connection->query('
	SELECT * FROM drivers  GROUP BY ID');
?>
<div class="container">
<h1>List of drivers</h1>
<?php

echo '<table>
    <tr>
		<th>ID</th>
		<th>Name</th>
        <th>Status</th>
		<th>Vehicle</th>
		<th>Vehicle Rank</th>
		<th>Country</th>
        <th>State</th>
        <th>City</th>
    </tr>';
while($drivers=$result->fetch()){
	echo '<tr>
		<td>'.$drivers['ID'].'</td>
		<td><a href="detail.php?id='.$drivers['ID'].'">'.$drivers['firstname'].' '.$drivers['lastname'].'</a></td>
        <td>'.$drivers['status'].'</td>
		<td>'.$drivers['vehicle'].'</td>
		<td>'.$drivers['vehicle_rank'].'</td>
		<td>'.$drivers['countries'].'</td>
        <td>'.$drivers['states'].'</td>
        <td>'.$drivers['cities'].'</td>
		<td><a href="delete.php?id='.$drivers['ID'].'">DELETE</a></td>
        <td><a href="modify.php?id='.$drivers['ID'].'">EDIT</a></td>
	</tr>';
}
echo '</table>
	<a href="create.php">Create drivers</a><br>
	<a href="../admin/index.php">Back to Admin Panel</a>';
?>
</div>
<?php
require_once('../theme/footer.php');