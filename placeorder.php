<?php

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "tblproduct";

$con = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$con) {
    echo "Connection failed!";
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="css/dash.css"> -->
    <link rel="stylesheet" href="css/navbar.css">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <style>
        .msg {
            width: 100%;
            height: 20%;
            background-color: #fff;
            padding-top: 5%;
            padding-bottom: 10%;
            margin-top: 15%;
        }

        body {
            background-image: url("registerimg.jpg");
            background-repeat: no-repeat;
            background-size: 100%100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            display: flex;
            justify-content: center;
        }

        p {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <nav>
        <label class="logo">Art Gallery</label>
        <ul>
            <li><a class="active" href="dash.php">Home</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Paintings <i class="fas fa-caret-down"></i>
                </a>
                <ul>
                    <li><a href="paints.php?q=abstract">Abstract</a></li>
                    <li><a href="paints.php?q=landscape">Landscape</a></li>
                    <li><a href="paints.php?q=sculpture">Monochrome</a></li>
                </ul>
            </li>
            <li><a href="#">Contact</a></li>
        </ul>

        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <form action="paints.php" method="post">
            <input name="search" type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
        </form>
    </nav>
    <div class="msg">
        <h1>Your Order Has Been Placed</h1><br>
        <p>Thank you for ordering with us! We'll contact you by email with your order details.</p>
    </div>

</body>

</html>