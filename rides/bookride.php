<?php
	
require_once('../settings.php');
require_once('../theme/header.php');

if(count($_POST)>0){
  $result=$connection->query('SELECT * FROM payment_methods WHERE user_ID='.$_GET['userid'].'');
  if(!($result->fetch())) {
    echo 'Error: Please <a href="../payment_methods/new_pm.php?userid='.$_GET['userid'].'">add a payment method </a>';
    die(); 
  }  
	$query=$connection->prepare('INSERT INTO rides (passenger_ID, driver_ID, cost, pickup_location, dropoff_location, date_pickup, payment_ID, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
	$query->execute([$_SESSION['ID'],$_GET['driverid'],20,$_POST['pickup_location'],$_POST['dropoff_location'],$_POST['date_pickup'],$_POST['payment_method'],'In Progress']);
  header('location: currentride.php?rideid='.$connection->lastInsertId().'');
}

?>

<?php

require_once('../theme/footer.php');

?>

<form method="POST">
  Pickup Location: <input name="pickup_location" type="text"><br>
  Dropoff Location: <input name="dropoff_location" type="text"><br>
  Pickup Date: <input name="date_pickup" type="date"><br>
  Payment Method: 
  <select name="payment_method">
    <?php
      $result=$connection->query('SELECT * FROM payment_methods WHERE user_ID='.$_SESSION['ID'].'');
      while($payment_method=$result->fetch()) { 
    ?>
    <option value="<?= $payment_method['ID'] ?>"><?= $payment_method['number'] ?></option>
    <?php
      }
    ?>
  </select><br>
  <button type="submit">Submit</button>
</form> 

<a href="../payment_methods/new_pm.php?userid='.$_GET['userid'].'">Add a payment method</a><br>
<a href="detail.php">Go back to list of rides</a><br />
<?php
require_once('../theme/footer.php');
?>
