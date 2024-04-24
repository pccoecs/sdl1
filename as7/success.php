<?php
	session_start();
	include('conn.php');

	// Check if session is set
	if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
		// Check if cookies are present
		if (isset($_COOKIE["user"]) && isset($_COOKIE["pass"])) {
			$username = $_COOKIE["user"];
			$password = $_COOKIE["pass"];
			$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
			if (mysqli_num_rows($query) > 0) {
				$row = mysqli_fetch_assoc($query);
				$_SESSION['id'] = $row['userid'];
			}
		}
	}

	// Check if session is still not set, redirect to login page
	if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
		header('location: index.php');
		exit();
	}
	
	// Fetch user data
	$query=mysqli_query($conn,"SELECT * FROM user WHERE userid='".$_SESSION['id']."'");
	$row=mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Success</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
	<h2>Login Success</h2>
	<?php echo $row['fullname']; ?>
	<br>
	<a href="logout.php">Logout</a>
</body>
</html>
