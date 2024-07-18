<?php
session_start();

include('db_conn.php');
$error_msg = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address = $_POST['address'];
    $preferences = $_POST['preferences'];

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE user_email = '$email' AND user_pass = '$password'");

    if (!empty($username) && !empty($email) && !empty($password) && !is_numeric($username)) {
        if ($password != $confirm_password) {
            $error_msg = "Password not match!";
        } elseif (mysqli_num_rows($select) > 0) {
            $error_msg = "User already Exist!";
        } elseif ((!preg_match("/^[a-zA-Z-' ]*$/", $username))) {
            $error_msg = "Only letters and white space allowed";
        } elseif (!(preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/", $email))) {
            $error_msg = "After @ it contains uppercase lowercase and special characters!!";
        } else {
            $query = "INSERT INTO `users` (user_name, user_email, user_pass, user_preference, user_address) 
            VALUES ('$username', '$email', '$password', '$preferences','$address')";
            mysqli_query($conn, $query);
            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="reg_style.css">
    <style>
        body {
            background: url('registerimg.jpg');
            background-repeat: no-repeat;
            background-size: 100%100%;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type=text],
        input[type=email],
        input[type=password] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #3e8e41;
        }

        .error h6 {
            color: red;
            margin-bottom: 10px;
        }

        .lang {
            padding: 10px 20px;
            width: 10%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Registration Form</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <label for="pref">Select Preferences:
                <select id="lang" name="preferences">
                    <option value="abstract">Abstract</option>
                    <option value="landscape">Landscape</option>
                    <option value="indian_contemporary">Indian Contemporary</option>
                    <option value="sculpture">Sculptures</option>
                    <option value="monochrome">Monochrome</option>
                </select></label>
            <br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <input type="submit" name="submit" value="Register">

        </form>
        <?php if (!empty($error_msg)): ?>
            <div class="error">
                <h6>
                    <?php echo $error_msg; ?>
                </h6>
            </div>

        <?php endif; ?>
    </div>
</body>

</html>