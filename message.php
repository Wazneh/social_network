<?php
include_once("php_includes/check_login_status.php");
$message = "";
$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
if($msg == "activation_failure"){
$message = '<h2>Activation Error</h2> Sorry there seems to have been an issue activating your account at this time. We have already notified ourselves of this issue and we will contact you via email when we have identified the issue.';
} else if($msg == "activation_success"){
$message = '<h2>Activation Success</h2> Your account is now activated. <a href="login.php">Click here to log in</a>';
} else {
$message = $msg;
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php include_once("template_pageTop.php");?>
<div id="pageMiddle">
<h2><?php echo $message; ?></h2>
</div>
<?php include_once("template_pageBottom.php");?>


