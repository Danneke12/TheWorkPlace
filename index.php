<?php
/**
 * Created by PhpStorm.
 * User: d.vorstenbosch
 * Date: 31-10-2016
 * Time: 12:11
 */
include("cms/config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      if($count == 1) {

         $_SESSION['login_user'] = $myusername;
         header("location: cms/panel.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }

   }
?>
<html>
<head>
    <title>Login Page - ITS</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
<div align = "center">
    <img src="images/logo.png" style="padding-bottom:2%; padding-top: 2%;">
    <div style="width: 500px">
        <div class="menu-login"><b>Login</b></div>
        <div class="table-bordered padding-login">
            <form action = "" method = "post">
                <label>Username  :</label> <input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password  :</label> <input type = "password" name = "password" class = "box" /><br/><br />
                <input class="btn" type = "submit" value = " Login "/><br />

            </form>
            <?php error_reporting(0);?>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
        </div>
    </div>
</div>
</body>
</html>
