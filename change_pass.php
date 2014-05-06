<?php
include_once("php_includes/check_login_status.php");
if(!$user_ok){
	header("location: message.php?msg=you are not allowed to be here!");
exit();
}
if(isset($_POST["oldPassword"]) && isset($_POST["newPassword"]) && $user_ok){
	//include_once("php_includes/db_conx.php");
	$oldPassword=md5($_POST["oldPassword"]);
	$newPassword=md5($_POST["newPassword"]);
	$id=$log_id;

	$sql = "SELECT  password FROM users WHERE id='$id' AND activated='1' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $row = mysqli_fetch_row($query);
    $db_pass_str = $row[0];
	
	if($db_pass_str==$oldPassword){
		$sql = "UPDATE users SET password='$newPassword' WHERE id='$id' LIMIT 1";
		mysqli_query($db_conx,$sql);
		header("location: message.php?msg=Password changed Successfully");
	}
	else
		header("location: message.php?msg=Error Changing password");


	//resetPassword($log_username,$oldPassword,$newPassword); 
}
function checkPassword($username, $password) {
    $sql = "SELECT id, username, password FROM users WHERE username='$username' AND activated='1' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $row = mysqli_fetch_row($query);
    $db_pass_str = $row[2];
	header ("location: message.php?msg=$db_pass_str");
	return ($db_pass_str == $password);
}

function resetPassword($username, $old_password, $new_password) {
	if(checkPassword($username, $old_password)) {
		$sql = "UPDATE TABLE users SET password=$new_password WHERE username='$username'";
		mysqli_query($sql);
		header("location: message.php?msg=password successfuly changed");
	}
	else{
		//header("location: message.php?msg=Error changing password $log_username");
		//exit();
	}
}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Yet Another Social Network</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="style/style.css">
<script src="js/main.js"></script>
<style>
#pageMiddle{
margin-top:20px;
margin-bottom:20px;
}
</style>
</head>

<body>
<?php include("template_pageTop.php");?>
	
 	<div id="pageMiddle">
	  <div id="wel">
		  <form id="loginform" onsubmit="change_pass.php" method="post">
			<div>Old Password:</div>
			<input type="text" name="oldPassword" onfocus="emptyElement('status')" maxlength="88">
			<div>New Password:</div>
			<input type="password" name="newPassword" onfocus="emptyElement('status')" maxlength="100">
			<br /><br />
			<button id="submit">Submit</button>
		  </form>
	  </div>
    </div>
<?php include_once("template_pageBottom.php");?>
</body>
</html


