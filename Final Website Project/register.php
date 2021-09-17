<?php
session_start();

if (isset($_POST["destination"])) {
	$_SESSION["destination"] = $_POST["destination"];
}

$destination = $_SESSION["destination"];

// If not logged in
if (isset($_COOKIE["loggedin"])) {
	showArticle($destination);
}
else if (isset($_POST["loggingin"])) {
	validateLogin($destination);
}
else if (isset($_POST["registration"])) {
	register();
}
else if (isset($_POST["validateRegistration"])) {
	validateRegistration($destination);
}
else {
	loginPrompt($destination);
}


// Check if user and pass are valid
function validateLogin($destination) {
	$server = "spring-2021.cs.utexas.edu";
	$user   = "cs329e_bulko_pranjalj";
	$pwd    = "Rustic5curb!scarce";
	$dbName = "cs329e_bulko_pranjalj";

	$mysqli = new mysqli($server, $user, $pwd, $dbName);
  	
  	if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } else {
   }

   $mysqli->select_db($dbName) or die($mysqli->error);
 	
	$username = $_POST["username"];
	$password = $_POST["password"];
	$username = $mysqli->real_escape_string($username);
  	$password = $mysqli->real_escape_string($password);

   	$query = "SELECT username, password FROM passwords WHERE username = '$username'";

   	$result = $mysqli->query($query) or die($mysqli->error);

	$successfulLogin = false;

	if (mysqli_num_rows($result) == 1){
      $row = $result->fetch_row();
      //$sql_pwd = mysql_fetch_field($result, 1);
      if ($password == $row[1]){
         $successfulLogin = true;
      }
  }
	if ($successfulLogin) {
		showArticle($destination);
	}
	else {
		loginPrompt();
		print <<<ALERT
			<script language="javascript">;
			alert("Invalid username or password. Please create an account if you don't have one.");
			</script>
ALERT;
	}
}

function register() {
	$script = $_SERVER['PHP_SELF'];
	print <<<REGISTER
<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="author" content="Pranjal J">
  <link href="style.css" rel="stylesheet" type="text/css" />
</head> 

   <body>
    <div id="header">
        <a href="./"><img src="WanderPlanLogo.JPG" alt="logo" id="logo"></a>
    </div>

    <div id="top-nav" style="display: block;">
        <table>
          <tr>
            <td><a href="./">Home</a></td>
            <td><a href="explore.html">Explore</a></td>  
            <td><a href="dropdown.php">Plan</a></td>
            <td><a href="contactus.html">Contact</a></td>
            <td><a href="faq.html">FAQ</a></td>
          </tr>      
        </table>
    </div>
    <div class="overlay">
    	<form method="post" action="$script" style="text-align:center;">
      <div class="login_text">
    		<p><b>Register</b></p>
      </div>
			Username: <input type = "text" name = "newUsername" size = "30" />
			<br><br>
			Password: <input type = "text" name = "newPassword" size = "30" />
			<br><br>
			<input class="login_page_buttons" type="submit" value="Register" name="validateRegistration"/>
		</form>
  </div>
    </body>
REGISTER;
}

// Check if registration is valid
function validateRegistration($destination) {
	$server = "spring-2021.cs.utexas.edu";
	$user   = "cs329e_bulko_pranjalj";
	$pwd    = "Rustic5curb!scarce";
	$dbName = "cs329e_bulko_pranjalj";
	$mysqli = new mysqli($server, $user, $pwd, $dbName);

	if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } else {
   }

   	$mysqli->select_db($dbName) or die($mysqli->error);
 	
	$newUsername = $_POST["newUsername"];
	$newPassword = $_POST["newPassword"];
	$newUsername = $mysqli->real_escape_string($newUsername);
   	$newPassword = $mysqli->real_escape_string($newPassword);

   	$query = "SELECT username, password FROM passwords WHERE username = '$newUsername'";

   	$result = $mysqli->query($query) or die($mysqli->error);
   	$isValid = true;

   	if (mysqli_num_rows($result) != 0){
      $isValid=false;
    } 
	
	// Add new user's info into passwd.txt
	if ($isValid) {
		$sql_values = "('".$newUsername."', '" .$newPassword."'".")";
        $command = "INSERT INTO passwords (username, password) VALUES".$sql_values;
        $insert_results = $mysqli->query($command) or die($mysqli->error);
        echo "<script language='javascript'>alert('New User Registered')</script>";
		showArticle($destination);
		print <<<ALERT
			<script language="javascript">;
			alert("Registration successful.");
			</script>
ALERT;

	}
	else {
		register();
		print <<<ALERT
			<script language="javascript">;
			alert("Username is already taken. Please try again.");
			</script>
ALERT;

	}
}

function loginPrompt() {
	$script = $_SERVER['PHP_SELF'];
	print <<<LOGIN
<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="author" content="Pranjal J">
  <link href="style.css" rel="stylesheet" type="text/css" />
</head> 

   <body>
    <div id="header">
        <a href="./"><img src="WanderPlanLogo.JPG" alt="logo" id="logo"></a>
    </div>

    <div id="top-nav" style="display: block;">
        <table>
          <tr>
            <td><a href="./">Home</a></td>
            <td><a href="explore.html">Explore</a></td>  
            <td><a href="plan.html">Plan</a></td>
            <td><a href="contactus.html">Contact</a></td>
            <td><a href="faq.html">FAQ</a></td>
          </tr>      
        </table>
    </div>
    <div class="overlay">
    	<form method="post" action="$script" style="text-align:center;">
      <div class="login_text">
    		<p><b>Login</b></p>
      </div>
			Username: <input type = "text" name = "username" size = "30" />
			<br><br>
			Password: <input type = "text" name = "password" size = "30" />
			<br><br>
			<input class="login_page_buttons" type="submit" value="Log In" name="loggingin"/>
			<input class="login_page_buttons" type="submit" value="Create an account" name="registration"/>
		</form>
  </div>

    </body>
LOGIN;
}

function showArticle($destination) {
	setcookie("loggedin", "true", time()+300);
	header("Location: $destination");
	echo "done";
}
?>