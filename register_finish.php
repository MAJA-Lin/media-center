<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign up page</title>
    </head>
    <body>
        <?php
            include("mysql_connect.inc.php");
            include_once("my_func.php");

            $userid = $_POST['userid'];
            $pw = $_POST['pw'];
            $pw2 = $_POST['pw2'];
            $email = $_POST['email'];

            //正則表示，(字母開頭，允許4-12字節，允許字母數字下劃線)
            $std_id = "/^[a-zA-Z0-9][a-zA-Z0-9_]{4,11}$/";
            $std_pw = "/^[a-zA-Z0-9]{4,11}+$/";
            //"\w" 比對數字字母字元（Alphanumerical characters）或底線字母（"_"），等效於 [A-Za-z0-9_]
            $std_email = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";

            /*Add condition where userID and userNo exist.
            *Better add another condition that verify account name , email and pw.
            * $sql used here will be replaced by the following $sql.
            */
            $sql = "SELECT * FROM user WHERE userid = '$userid'";
            $result = mysqli_query($link, $sql);
            $row = @mysqli_fetch_array($sql);

            if ( $row[1] == $userid) {
                js_alert("User ID incorrect.","register.php");
                /*
                echo 'User ID has been used!';
                echo "<a href=\"javascript:history.back()\">返回</a>";
                */
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
            }

            elseif ( !(preg_match($std_id, $userid)) ) {
                js_alert("UserID should be begin with numbers and alphabets.Length is between 4~12","register.php");
                /*
                echo 'UserID should be numbers, underline and alphabets, and the length is between 4~12';
                echo "<a href=\"javascript:history.back()\">返回</a>";
                */
            }

            elseif ( !(preg_match($std_pw, $pw)) ) {
                js_alert("Password should be numbers and alphabets, and the length is between 4~12","register.php");
            /*
                echo 'Password should be numbers and alphabets, and the length is between 4~12';
                echo "<a href=\"javascript:history.back()\">返回</a>";
                */
            }

            elseif ( !(preg_match($std_email, $email)) ) {
                js_alert("Email type is wrong!","register.php");

                /*
                echo 'Email type is wrong!';
                echo "<a href=\"javascript:history.back()\">返回</a>";
                */
            }

            elseif($userid != null && $pw != null && $pw2 != null && $pw == $pw2) {

                /*Should generater userNo here.
                *#code here
                */

                //Generate datetime
                //Timezone seems to be "+6" on wamp on my PC.
                $dtime = date("Y-m-d H:i:s",mktime (date('H')+6, date('i'), date('s'), date('m'), date('d'), date('Y')));
                //If userid and userno are unique, then insert.
                $sql_insert = "INSERT INTO user (userid, password, email, register_date) VALUES ('$userid', '$pw', '$email', '$dtime')";

                if(mysqli_query($link, $sql_insert)) {
                    /*
                    echo 'Successful!';
                    echo 'Now is '.$dtime;
                    */
                    //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                    js_alert("Sigh up successfully!","before_index.html");
                }
                else {
                    js_alert("Account has been used!","register.php");
                    /*
                    echo "Failed!\n";
                    echo mysqli_error($link);
                    echo 'Account has been used!';
                    echo "<a href=\"javascript:history.back()\">返回</a>";
                    //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                    */
                }
            }

            else {

                js_alert("Error input! Pleaser check your password.","register.php");

                /*
                echo 'Error input! Pleaser check your password.';
                echo "<a href=\"javascript:history.back()\">返回</a>";
                //echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                */
            }
        ?>
    </body>
</html>
