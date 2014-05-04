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
<div id="wrap">
  <div class="page">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p class="text-center"><b><?php echo "$msg"; ?><br>
    <a href="join.php">Click here</a> to return to our home page </b></p>
  </div>
</div>

<?php include 'footer.php'?>
