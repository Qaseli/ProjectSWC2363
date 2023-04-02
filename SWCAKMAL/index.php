<?php
/*
Author: Muhammad Abba Gana
Website: www.guidetricks.blogspot.com
*/
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/login.css" />
</head>
<body>
<center>
<div class="form-group">
	<th class="nav" align="center"><img src="https://www.uptm.edu.my/images/logo/UPTM_Logo_WEB.png" width="500" height="200"></th>
	<strong style="color: aliceblue;"><marquee behavior="alternate">WELCOME TO COMPUTER SCIENCE DEPARTMENT F.C.E - ZUL AZRI CHAT SITE</marquee></span></font></div></strong>
<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $pss = $_POST['pss'];
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($conn,$username);
		$pss = stripslashes($pss);
		$pss = mysqli_real_escape_string($conn,$pss);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and pss='$pss'";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$rows = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['fullname'] = $row['fullname'];
			header("Location: choose.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username or password is incorrect.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
<body style="background-color: rgb(41, 14, 148) ;">
<h1 style="color: aliceblue;">Log In</h1>
<form action="" method="post" name="login">
<input type="number" name="username" placeholder="Student ID" required />
<input type="pss" name="pss" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p style="color: aliceblue;">Not registered yet? <a href='registration.php'>Register Here</a></p>
<p align="center" style="color: aliceblue;">Forgot Password? Click <a href="#" onClick="MyWindow=window.open('pwordrecover.php','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=300,height=250'); return false;">Here</a></span></p>
</body>
</div>
<?php } ?>
</body>
<br><br><br><br>
<p style="color: aliceblue;">Programmed and Designed by: <a><strong><a href="https://www.instagram.com/azrayyyie/">Zul Azri Bin Jalalludin </strong></p>
</html>
