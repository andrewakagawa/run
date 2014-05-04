<?php

// Set error message as blank upon arrival to page
$errorMsg = "";
// First we check to see if the form has been submitted
if (isset($_POST['Submit'])){

  //Connect to the database through our include
  include_once "connect_to_mysql.php";

  // Filter the posted variables
  $name = ereg_replace("[^A-Za-z0-9]", "", $_POST['name']); // filter everything but numbers and letters
  $password = ereg_replace("[^A-Za-z0-9]", "", $_POST['password']); // filter everything but numbers and letters

  // Check to see if the user filled all fields with
  // the "Required"(*) symbol next to them in the join form
  // and print out to them what they have forgotten to put in
  if((!$name) || (!$password)){

    $errorMsg = "<div class='bg-warning text-warning'><b>You did not submit the following required information!<br /><br /><ul>";
    if(!$name){
      $errorMsg .= "<li>User Name</li>";
    } if(!$password){
      $errorMsg .= "<li>Password</li>";
    }
    echo $errorMsg."</ul><a href='join.php'>Click here</a> to go back to the join page.</b></div>";

  } else {

    // Database duplicate Fields Check
    $sql_name_check = mysql_query("SELECT name FROM users WHERE user='$user' LIMIT 1");
    $name_check = mysql_num_rows($sql_name_check);
    if ($email_check > 0){
      $errorMsg = "<u>ERROR:</u><br />Your user name is already in use inside our system. Please try another.";
    } else {

      // Add MD5 Hash to the password variable
      $hashedPass = md5($password);

      // Add user info into the database table, claim your fields then values
      $sql = mysql_query("INSERT INTO users (name, password, signupdate)
      VALUES('$name', '$hashedPass', now())") or die (mysql_error());
      // Get the inserted ID
      $id = mysql_insert_id();

      $id = ereg_replace("[^0-9]", "", $id); // filter everything but numbers for security
      if (!$id) {
        echo "Missing Data to Run";
        exit();
      }

      // Register session id
      session_register('id');
      $_SESSION['id'] = $id;

      // Update last_log_date field for this member now
      mysql_query("UPDATE users SET lastlogin=now() WHERE id='$id'");

      // Print success message here if all went well then exit the script
      header("location: myprofile.php?id=$id");

      exit(); // Exit so the form and page does not display, just this success message
    } // Close else after database duplicate field value checks
  } // Close else after missing vars check
} //Close if $_POST

?>

<div id="wrap">
  <div class="page">

      <div align="center" style>
       <h3><br />
         <br />
       Register here<br />
       <br />
       </h3>
     </div>


  <form role="form" action="join.php" method="post" enctype="multipart/form-data">

      <div align="center"><font color="#FF0000"><?php echo "$errorMsg"; ?></font></div>

    <div class="row">
     <div class="span12">
        <div class="form-group">
          <label class="4">User Name:</label>
            <div class="8">
             <input name="name" type="text" value="<?php echo "$name"; ?>" class="form-control"/>
          </div>
        </div>
       </div>
      </div>

    <div class="row">
     <div class="span12">
        <div class="form-group">
          <label class="span4">Password:</label>
            <div class="span8">
                <input name="password" type="password" value="<?php echo "$password"; ?>" class="form-control" />
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
<?php include 'footer.php'?>
