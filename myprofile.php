<?php
include 'header.php';

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


<!-- Page: profile-->
<div id="myprofile" data-role="page" data-theme="a" data-title="View Source: My Profile">

  <!-- header -->
  <div data-role="header" data-position="fixed" data-id="vs_header">
    <h1>My Profile</h1>
    <a href="#home" data-icon="home" data-iconpos="notext">Home</a>
    <a href="#info" data-icon="info" data-iconpos="notext" data-rel="dialog" >Info</a>
  </div>
  <!-- header -->
  <!-- content -->
  <div data-role="content">
    <div id="developerData">
      <div align="center">
        <h3>Welcome <?php echo "$username"; ?></h3>
          <ul><li>Member since: <?php echo "$signupdate"; ?></li>
          <li>Last login: <?php echo "$lastlogin"; ?></li></ul>
          <form role="form" action="logout.php" method="post" enctype="multipart/form-data">
            <button name="Submit" type="submit" > Logout </button>
          </form>


      </div>
    </div><!-- end devdata tag-->
  </div><!-- end content -->

  <!-- footer -->
  <div data-role="footer" data-position="fixed" data-id="vs_footer">

    <!-- navbar -->
    <div data-role="navbar">
      <ul>
        <li><a href="/run_app" data-role="button" data-icon="arrow-l" data-rel="back">back</a></li>
      </ul>
    </div>
    <!-- navbar -->

 </div>
  <!-- end footer -->
</div>
<!-- page -->

