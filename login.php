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
      header("location: myprofile.php?id=$id");
      exit();

    } // close while
  } else {
    // Print login failure message to the user and link them back to your login page
    print "<p class='bg-warning text-warning' align='center'>Sorry, that name and password does not match our records.  Please try again </font><br />
    <br /><a href='login.php'>Click here</a> to go back to the login page.";
    exit();
  }
}// close if post



?>
