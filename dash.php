<?php
include('db_conn.php');
session_start();
$user_id = $_SESSION['id'];
$preference = $_SESSION['preference'];
if (!isset($user_id)) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/dash.css">
  <link rel="stylesheet" href="css/navbar.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Dashboard</title>

  <style>
    body {
      background-image: url("registerimg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>
  <div id="loader" class="center"></div>

  <?php include('navbar.php'); ?>

  <?php include('footer.php'); ?>

  <script>
    document.onreadystatechange = function () {
      if (document.readyState !== "complete") {
        document.querySelector("body").style.visibility = "hidden";
        document.querySelector("#loader").style.visibility = "visible";
      } else {
        document.querySelector("#loader").style.display = "none";
        document.querySelector("body").style.visibility = "visible";
      }
    };
  </script>

</body>

</html>