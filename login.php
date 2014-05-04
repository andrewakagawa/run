<?php include 'header.php'; ?>

  <div id="wrap">
    <div class="page">
<?php

if ($_POST['name']) {
  //Connect to the database through our include
  include_once "connect_to_mysql.php";

  // Filter the posted variables
  $name = ereg_replace("[^A-Za-z0-9]", "", $_POST['name']); // filter everything but numbers and letters
  $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters
  $password = md5($password);

  // Make query and then register all database data that -
  // cannot be changed by member into SESSION variables.
  // Data that you want member to be able to change -
  // should never be set into a SESSION variable.

  $sql = mysql_query("SELECT * FROM users WHERE name='$name' AND password='$password'");
  $login_check = mysql_num_rows($sql);
  if($login_check > 0){
    while($row = mysql_fetch_array($sql)){

      // Get member ID into a session variable
      $id = $row["id"];
      session_register('id');
      $_SESSION['id'] = $id;

      // Get member ID into a session variable
      $name = $row["name"];
      session_register('name');
      $_SESSION['name'] = $name;

      // Update last_log_date field for this member now
      mysql_query("UPDATE users SET lastlogin=now() WHERE name='$name'");

      // Print success message here if all went well then exit the script
      header("location: user.php?id=$id");
      exit();

    } // close while
  } else {
    // Print login failure message to the user and link them back to your login page
    print "<p class='bg-warning text-warning' align='center'>Sorry, that name and password does not match our records.  Please try again </font><br />
    <br /><a href='login.php'>Click here</a> to go back to the login page.";
    exit();
  }
}// close if post
echo $name;
echo $password;



?>

      <div align="center" style>
       <h3><br />
         <br />
       Login here<br />
       <br />
       </h3>
  <form role="form" action="login.php" method="post" enctype="multipart/form-data">

      <div align="center"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></div>

    <div class="row">
     <div class="span12">
        <div class="form-group">
          <label class="4">User Name:</label>
            <div class="8">
             <input name="name" type="text" value="<?php echo "$name"; ?>"  class="form-control"/>
          </div>
        </div>
       </div>
      </div>

    <div class="row">
     <div class="span12">
        <div class="form-group">
          <label class="span4">Password:</label>
            <div class="span8">
                <input name="password" type="password" value="<?php echo "$password";?>" class="form-control" />
                <font size="-2" color="#006600">(letters or numbers only, no spaces no symbols)</font>
          </div>
        </div>
       </div>
      </div>

        <div class="form-group">
         <div align="center">
          <button name="Submit" type="submit" value="Submit Form" class="btn btn-primary"> Submit </button>
         </div>
        </div>

    </form>

   </div>
</div>

<?php include 'footer.php' ?>
