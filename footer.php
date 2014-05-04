<?php /*footer*/ ?>

<?php
$navlinks = "";
if (isset($_SESSION['id'])) {
    // Put stored session variables into local php variable

    $userid = $_SESSION['id'];

    $navlinks = '<li><a href="myprofile.php?id=' . $userid . '" data-role="button" data-icon="arrow-r" >My Profile</a></li>';


} else {
    $navlinks = '<li><a href="#login" data-role="button" data-icon="arrow-r" >Login</a></li>';

}
?>


  <!-- footer -->
  <div data-role="footer" data-position="fixed" data-id="vs_footer">

  <!-- navbar -->
    <div data-role="navbar">
      <ul>
        <li><a href="#debug" data-role="button" data-icon="arrow-r">Debug</a></li>
        <?php echo $navlinks; ?>
      </ul>
    </div>
  <!-- navbar -->

  </div>
  <!-- end footer -->

