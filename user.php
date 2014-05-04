<?php include 'header.php'?>


<?php
// Use the URL 'id' variable to set who we want to query info about
$id = ereg_replace("[^0-9]", "", $_GET['id']); // filter everything but numbers for security
if ($id == "") {
  echo "Missing Data to Run";
  exit();
}

//Connect to the database through our include
include_once "connect_to_mysql.php";

// Query member data from the database and ready it for display
$sql = mysql_query("SELECT * FROM users WHERE id='$id' LIMIT 1");
$count = mysql_num_rows($sql);
if ($count > 1) {
  echo "There is no user with that id here.";
  exit();
}
while($row = mysql_fetch_array($sql)){
  $username = $row["name"];

  // Convert the sign up date to be more readable by humans
  $signupdate = strftime("%b %d, %Y", strtotime($row['signupdate']));
  $lastlogin = strftime("%b %d, %Y", strtotime($row['lastlogin']));
}

?>
<div id="wrap">
  <div class="page">

    <!-- My Info -->
    <div id="white-shadow-box">
      <div class="row">
        <div class="span12"><ul style="list-style-type: none;">
          <li><h4>Welcome <?php echo "$username"; ?></h4></li>
        </div></ul>
      </div>
      <div class="row">
        <div class="span6"><ul style="list-style-type: none;">
          <li>Member since: <?php echo "$signupdate"; ?></li>
          <li>Last login: <?php echo "$lastlogin"; ?></li></ul>
        </div>
      </div>
    </div>

  </div><!-- end page-->
</div><!-- end wrap-->

<?php include 'footer.php'?>

