<?php include 'header.php' ?>

<?php
/*Logout page*/
session_destroy();
if(!session_is_registered('id')){
$msg = "You are now logged out";
} else {
$msg = "<h2>could not log you out</h2>";
}
?>

<!-- Page: Logout -->
<div id="logout" data-role="page" data-theme="a" data-title="View Source: Logout">

  <!-- header -->
  <div data-role="header" data-position="fixed" data-id="vs_header">
    <h1>Logout</h1>
    <a href="#home" data-icon="home" data-iconpos="notext">Home</a>
    <a href="#info" data-icon="info" data-iconpos="notext" data-rel="dialog" >Info</a>
  </div>
  <!-- header -->

  <!-- content -->
  <div data-role="content">
    <div id="developerData">
      <div align="center">
      <br>
      <br>
      <br>
      <br>
      <p class="text-center"><b><?php echo "$msg"; ?><br>
      <a href="index.php">Click here</a> to return to our home page </b></p>
    </div>
  </div>

<?php include 'footer.php'?>
