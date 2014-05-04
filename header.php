<?php
session_start(); // Must start session first thing
/*
gamehack
*/
// See if they are a logged in member by checking Session data


//Connect to the database through our include
include_once "connect_to_mysql.php";


$toplinks = "";
if (isset($_SESSION['id'])) {
	// Put stored session variables into local php variable

    $userid = $_SESSION['id'];

    $toplinks = '<li><a href="user.php?id=' . $userid . '">Home</a></li>
	<li><a href="logout.php">Log Out</a></li>';

} else {
	$toplinks = '<li><a href="join.php">Register</a></li>
	<li><a href="login.php">Login</a></li>';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Run</title>
<link href="css/bootstrap-2.3.2.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">

</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Run</a>
        </div>
          <ul class="nav navbar-nav">
            <?php echo $toplinks; ?>
          </ul>
      </div>
    </div>
