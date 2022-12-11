<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Foober</title>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="">Foober</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="
            <?php
            if(isset($_SESSION['role'])) {
              if($_SESSION['role'] == 0) {
                echo '../drivers/userindex.php';
              } else if ($_SESSION['role'] == 1) {
                echo '../rides/driverrides.php';
              } else if ($_SESSION['role'] == 2) {
                echo '../admin/index.php';
              } 
            }else{
              echo 'landing.php';
            }
            ?>
            ">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="
            <?php
            if(isset($_SESSION['ID'])) {
              echo '../libs/signout.php';
            } else {
              echo 'libs/signout.php';
            }
            ?>
            ">Logout<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
  </head>
  <body>