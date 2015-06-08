<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Sign up</title>
	</head>
	<body>
		<form name="form" method="post" action="register_finish.php">
			UserID：<input type="varchar" name="userid" placeholder="4~12 digits, alphabets, numbers and underline only" /> <br>
			Password：<input type="password" name="pw" placeholder="4~12 digits, alphabets and numbers only" /> <br>
			Password confirmed：<input type="password" name="pw2" placeholder="repeat your password"/> <br>
			Email：<input type="varchar" name="email" /> <br>
		<br>
		<input type="submit" name="button" />
		</form>
		<a href="before_index.html"><h3>Main page</h3></a>
	</body>
</html>
