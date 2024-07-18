<!DOCTYPE html>
<html>

<head>
	<title>LOGIN FOR ART GALLERY</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
	body {
		background: url('images/bgimgforlogin.jpg');
		background-repeat: no-repeat;
		background-size: cover;
		overflow: hidden;
	}
</style>

<body>
	<div class="text">
		<h3>
			<center>Log In To View And Buy Amazing And Beautiful Art!</center>
		</h3>

	</div>
	<div id="loader" class="center"></div>
	<form action="login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error">
				<?php echo $_GET['error']; ?>
			</p>
		<?php } ?>
		<label>User Name</label>
		<input type="text" name="uname" placeholder="User Name"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
		<a href="signup.php" class="ca">Create an account</a>
	</form>
	<script>
		document.onreadystatechange = function () {
			if (document.readyState !== "complete") {
				document.querySelector(
					"body").style.visibility = "hidden";
				document.querySelector(
					"#loader").style.visibility = "visible";
			} else {
				document.querySelector(
					"#loader").style.display = "none";
				document.querySelector(
					"body").style.visibility = "visible";
			}
		};
	</script>
</body>

</html>