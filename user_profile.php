<?php
	session_start();
	include_once("my_func.php");
	ini_set( "display_errors", 0);
	login_check($_COOKIE['login_chk']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Profile</title>
	</head>
	<body>
		<div>
			<h2>Welcome! <?php echo $_SESSION['userid']; ?><br></h2>
		</div>
		<div data-role="ui-content">
			<ul>
				<li><a href="simple_index.php">
					<h3>Main Page</h3>
				</a></li>
				<li><a href="logout.php">
					<h3>Sign Out</h3>
				</a></li>
				<li><h3>Photo</h3></li>
				<li><h3>Change Password</h3>
					<form name="pwform" action="password_update.php" method="post">
						Current Password:<input type="password" name="old_password" /> <br>
						New Password:<input type="password" name="new_password" placeholder="4~12 digits, alphabets, numbers and underline only" /> <br>
						Confirm New Password:<input type="password" name="new_password2" /> <br>
						<input type="submit" name="button" value="submit" />
					</form>
				</li>
				<li><h3>Edit Profile</h3>
					<form name="pform" action="user_profile_update.php" method="post">
						Fisrt Name:<input type="char" name="new_first_name" placeholder="<?php  show_null($_SESSION['first_name']); ?>" /> <br>
						Last Name:<input type="char" name="new_last_name" placeholder="<?php  show_null($_SESSION['last_name']); ?>" /> <br>
						Email:<input type="varchar" name="new_email" placeholder="<?php  show_null($_SESSION['email']); ?>" /> <br>
						Address:<input type="text" name="new_address" placeholder="<?php  show_null($_SESSION['address']); ?>" /> <br>
						<input type="submit" name="button" value="submit" />
					</form>
				</li>
			</ul>
		</div>
	</body>
</html>