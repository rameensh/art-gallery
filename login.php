<?php
include('db_conn.php');
session_start();

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: login.php?error=Password is required");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND user_pass='$pass'";

		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['user_name'] === $uname && $row['user_pass'] === $pass) {
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['id'] = $row['user_id'];
				$_SESSION['preference'] = $row['user_preference'];
				header("Location: dash.php");
				exit();
			} else {
				header("Location: login.php?error=Incorect User name or password");
				exit();
			}
		} else {
			header("Location: login.php?error=Incorect User name or password");
			exit();
		}
	}

} else {
	header("Location: index.php");
	exit();
}
?>