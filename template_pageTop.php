<?php
$envelope = '<img src="images/new-message.png" width="25" height="25" alt="Notes" title="This envelope is for logged in members">';
$loginLink = '<a href="login.php">Log In</a> &nbsp; | &nbsp; <a href="signup.php">Sign Up</a>';
if($user_ok == true) {
$sql = "SELECT notescheck FROM users WHERE username='$log_username' LIMIT 1";
$query = mysqli_query($db_conx, $sql);
$row = mysqli_fetch_row($query);
$notescheck = $row[0];
$sql = "SELECT id FROM notifications WHERE username='$log_username' AND date_time > '$notescheck' LIMIT 1";
$query = mysqli_query($db_conx, $sql);
$numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
$envelope = '<a href="notifications.php" title="Your notifications and friend requests"><img src="images/message-already-read.png" width="25" height="25" alt="Notes" ></a>';
    } else {
$envelope = '<a href="notifications.php" title="You have new notifications"><img src="images/notification.gif" width="25" height="25" alt="Notes"></a>';
}
    $loginLink = '<a href="user.php?u='.$log_username.'">'.$log_username.'</a> &nbsp; | &nbsp; <a href="logout.php">Log Out</a>';
}
?>
<div id="pageTop">
  <div id="pageTopWrap">
    <div id="pageTopLogo">
      <a href="index.php">
        <img src="images/logss.png" alt="logo" title="Home">
      </a>
    </div>
    <div id="pageTopRest">
      <div id="menu1">
        <div>
          <?php echo $envelope; ?> &nbsp; &nbsp; <?php echo $loginLink; ?>
        </div>
      </div>
      <div id="menu2">
        <div>
          <a href="index.php">
            <img src="images/home.png" alt="home" title="Home">
          </a>
          <!--<a href="#">Menu_Item_1</a>
          <a href="#">Menu_Item_2</a> -->
        </div>
      </div>
    </div>
  </div>
</div>

