<?php
require_once('../settings.php');


$query=$connection->prepare('DELETE FROM rides WHERE ID=?');
$query->execute([$_GET['rideid']]); 
echo 'The ride has been deleted. <br>';
if($_SESSION['role'] == 1) {
    echo '<a href="driverrides.php">Back to Rides</a>';
} else if ($_SESSION['role'] == 0) {
    echo '<a href="../drivers/userindex.php">Back to Driver Index</a>';
} else if ($_SESSION['role'] == 2) {
    echo '<a href="../rides/adminindex.php">Back to Ride Index</a>';
}
?>