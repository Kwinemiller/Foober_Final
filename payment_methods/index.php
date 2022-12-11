<?php
require_once('../settings.php');

require_once('../theme/header.php');

$result=$connection->query('SELECT * FROM payment_methods WHERE user_id = '.$_SESSION['ID'].' GROUP BY ID');


?>
<div class="container">
<h1>Payment Methods</h1>
<?php
echo '<a href="new_pm.php">Add payment method</a>';
echo '<table>';
while($payment_method=$result->fetch()){
	echo '<tr>
		<td>'.$payment_method['number'].'</td>
		<td>'.$payment_method['expdate'].'</td>
		<td>'.$payment_method['name'].'</td>
    <td><a href="edit_pm.php?='.$payment_method['ID'].'">Edit</a></td>
    <td><a href="delete_pm.php?='.$payment_method['ID'].'">Delete</a></td>
	</tr>';
}
echo '</table>';
?>
</div>
<?php

require_once('../theme/footer.php');