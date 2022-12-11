<?php

require_once('../settings.php');
require_once('../theme/header.php');

$result=$connection->query('SELECT * FROM users GROUP BY ID');
?>
<div class="container">
<h1>Edit users</h1>
<?php
echo '<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
		<tr>';
while($users=$result->fetch()){
	echo '<tr>
		<td>'.$users['ID'].'</td>
		<td>'.$users['firstname'].' '.$users['lastname'].'</td>
		<td>'.$users['email'].'</td>
		<td><a href="delete.php?id='.$users['ID'].'">DELETE </a></td>
		<td><a href="modify.php?id='.$users['ID'].'">MODIFY </a></td>
	</tr>';
}
echo '</table>';
?>
</div>
<?php
require_once('../theme/footer.php');
?>

