<?php
require_once('../settings.php');

$query=$connection->prepare('DELETE FROM payment_methods WHERE ID=?');
$query->execute([$_GET['id']]); 
echo 'The payment method has been deleted.';
?>