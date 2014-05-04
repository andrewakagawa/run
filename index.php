<?php include 'header.php'; ?>

<Body>

 <!-- Page: home -->
<div id="home" data-role="page" data-theme="a" data-title="View Source: Home">

  <!-- header -->
  <div data-role="header" data-position="fixed">
    <h1>Run Quest</h1>
    <a href="#info" data-icon="info" data-iconpos="notext" data-rel="dialog" class="ui-btn-right">Info</a>
  </div>

  <!-- end header -->

  <!-- content -->
  <div data-role="content" class="ui-block-a" >

    <div id="map"></div><!--prints the map-->

    <button onClick="start()">Start</button>
    <button onClick="stop()">Stop</button>

    <form role="form" action="login.php" method="post" enctype="multipart/form-data">

      <input type="hidden" name="dist" id="distance" value="" />
      <button name="Submit" type="submit" value="Post"> Submit </button>

    </form>

    <p id="track">Loading...</p><!--prints the stopwatch-->

  </div>

  <!-- end content -->

  <!-- footer -->
    <?php include 'footer.php';?>
  <!-- end footer -->
</div>
<!--end page -->

<!-- Page: Signup Login -->
<div id="login" data-role="page" data-theme="a" data-title="View Source: Login">

  <!-- header -->
  <div data-role="header" data-position="fixed" data-id="vs_header">
    <h1>Login</h1>
    <a href="#home" data-icon="home" data-iconpos="notext">Home</a>
    <a href="#info" data-icon="info" data-iconpos="notext" data-rel="dialog" >Info</a>
  </div>
  <!-- header -->

  <!-- content -->
  <div data-role="content">
    <div id="developerData">
      <div align="center">
        <h3>Login here</h3>
        <form role="form" action="login.php" method="post" enctype="multipart/form-data">

          <label>User Name:</label>
          <input name="name" type="text" value="<?php echo "$name"; ?>"  class="form-control"/>

          <label>Password:</label>
          <input name="password" type="password" value="<?php echo "$password";?>" class="form-control" />
          <button name="Submit" type="submit" value="Submit Form" class="btn btn-primary"> Submit </button>

        </form>
        <h3>Register here</h3>
        <form role="form" action="join.php" method="post" enctype="multipart/form-data">

          <label>User Name:</label>
          <input name="name" type="text" value="<?php echo "$name"; ?>"  class="form-control"/>

          <label>Password:</label>
          <input name="password" type="password" value="<?php echo "$password";?>" class="form-control" />
          <button name="Submit" type="submit" value="Submit Form" class="btn btn-primary"> Submit </button>

        </form>
      </div>
    </div><!-- end devdata tag-->
  </div><!-- end content -->

  <!-- footer -->
  <div data-role="footer" data-position="fixed" data-id="vs_footer">

    <!-- navbar -->
    <div data-role="navbar">
      <ul>
        <li><a href="#" data-role="button" data-icon="arrow-l" data-rel="back">back</a></li>
      </ul>
    </div>
    <!-- navbar -->

 </div>
  <!-- end footer -->
</div>
<!-- page -->


<!-- Page: Geolocation -->
<div id="debug" data-role="page" data-theme="a" data-title="View Source: Debug">

  <!-- header -->
  <div data-role="header" data-position="fixed" data-id="vs_header">
    <h1>Debug</h1>
    <a href="#home" data-icon="home" data-iconpos="notext">Home</a>
    <a href="#info" data-icon="info" data-iconpos="notext" data-rel="dialog" >Info</a>
  </div>
  <!-- header -->

  <!-- content -->
  <div data-role="content">
    <div id="developerData">
      <p id="geo">Loading...</p>
    </div>
  </div>
  <!-- end content -->

  <!-- footer -->
  <div data-role="footer" data-position="fixed" data-id="vs_footer">

    <!-- navbar -->
    <div data-role="navbar">
      <ul>
        <li><a href="#" data-role="button" data-icon="arrow-l" data-rel="back">back</a></li>
      </ul>
    </div>
    <!-- navbar -->

  </div>
  <!-- end footer -->
</div>
<!-- page -->

</Body>
</Html>
