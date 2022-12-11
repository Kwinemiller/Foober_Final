<?php
require_once('../settings.php');

$query=$connection->prepare('DELETE FROM drivers WHERE ID=?');
$query->execute([$_GET['id']]); 

echo 'The driver has been deleted.
    <br>
    <a href="adminindex.php">Back to index</a>';