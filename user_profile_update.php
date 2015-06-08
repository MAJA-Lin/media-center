<?php
	session_start();
	include_once("mysql_connect.inc.php");
	include_once("my_func.php");

	$userid = $_SESSION['userid'];

	$fname = set_data($_POST['new_first_name'], $_SESSION['first_name']);
	$lname = set_data($_POST['new_last_name'], $_SESSION['last_name']);
	$set_email = set_data($_POST['new_email'], $_SESSION['email']);
	$set_address = set_data($_POST['new_address'], $_SESSION['address']);

	/*
	echo "new_fisrt_name = ".$_POST['new_first_name']."<br>";
	echo "And here is fname = ".$fname;
	*/



	$sql = "UPDATE user SET first_name='$fname', last_name='$lname', email='$set_email', address='$set_address' WHERE userid = '$userid'";
	//Besides UPDATE, here should do SELECT one more time to update value in SESSION
	$result = mysqli_query($link, $sql);

	/*
	*Yes, here can just use variables like $fname, $lname... to reset the Session.
	*But I want to make sure that the data have been updated correctly.
	*
	*/
	$sql2 = "SELECT * FROM user WHERE userid = '$userid'";
	$result2 = mysqli_query($link, $sql2) or die("Error in the consult.." . mysqli_error($link));
	$row = @mysqli_fetch_array($result2);
	$_SESSION['first_name'] = $row['first_name'];
	$_SESSION['last_name'] = $row['last_name'];
	$_SESSION['email'] = $row['email'];
	$_SESSION['address'] = $row['address'];

	js_alert("Profile updated!","user_profile.php");

?>