<?php

	Function my_header($redirect){
		/*
		echo "<script>";
		echo "location.href='".$redirect."'";
		echo "</script>";
		return;
		*/
		echo ("<script>location.href='".$redirect."'</script>");
	}

	Function js_alert($msg, $redirect) {
		/*
		echo "<script>";
		echo "window.alert('".$msg."'')";
		echo "</script>";
		echo "<script>";
		echo "location.href='".$redirect."'";
		echo "</script>";
		return;
		*/
		echo ("<script>window.alert('".$msg."')
			location.href='".$redirect."';</script>");
		exit();
	}

	Function login_check($login_chk) {
		if(isset($login_chk)) {

			if($login_chk != "normal") {
				js_alert("Login failed!", "before_index.html");
			}

		}
		else {
			js_alert("Login failed!", "before_index.html");
		}
}

	Function show_null($cookie_name) {
		/*
		*echo value of COOKIE['???'];
		*If not exists, print out 'NULL' instead.(But not changing the value in database)
		*This is used in user_profile.php to show the data in the blank.
		*
		*And there is a default function called "is_null", Description: bool is_null ( mixed $var )
		*which returns TRUE if var is null, FALSE otherwise.
		*/
		if(isset($cookie_name) && $cookie_name!="") {
			echo $cookie_name;
			return $cookie_name;
		}
		else {
			echo 'NULL';
			return;
		}
	}

	Function set_data($new_data, $data) {
		/*
		*Used in user_profile_update.php & password_update.php
		*To update the data if the form is not empty or NULL
		*/
		if(isset($new_data) && $new_data!= ""){
			$new_data = trim($new_data);
			return $new_data;
		}
		else{
			return $data;
		}
	}

?>