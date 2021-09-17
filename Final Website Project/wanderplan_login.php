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
	$username = $_POST["username"];
	$password = $_POST["password"];
	$attempt = "$username".":"."$password"."\n";
	$successfulLogin = false;
	
	$data = file("./passwd.txt");
	foreach ($data as $try) {
		if ($attempt == $try) {
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
<head><link href="style.css" rel="stylesheet"></head> 
<div id="header">
        <a href="./"><img src="WanderPlanLogo.JPG" alt="logo" id="logo"></a>
    </div>
  <div id="container">
	<div id="login">
		<h2> Register for an account </h2>
		<form method="post" action="$script">
			Username: <input type = "text" name = "newUsername" size = "30" />
			<br><br>
			Password: <input type = "text" name = "newPassword" size = "30" />
			<br><br>
			<input type="submit" value="Register" name="validateRegistration"/>
		</form>
	</div>
  </div>
REGISTER;
}

// Check if registration is valid
function validateRegistration($destination) {
	$newUsername = $_POST["newUsername"];
	$newPassword = $_POST["newPassword"];
	$isValid = true;

	$data = file("./passwd.txt");
	foreach ($data as $try) {
		$thisTry = explode(":", $try);
		if ($newUsername == $thisTry[0]) {
			$isValid = false;
		}
	}

	// Add new user's info into passwd.txt
	if ($isValid) {
		$newUser = "$newUsername".":"."$newPassword"."\n";
		$file = fopen("./passwd.txt", "a");
		fwrite($file, $newUser);
		fclose($file);
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
<head><link href="style.css" rel="stylesheet"></head> 
	<div id="header">
        <a href="./"><img src="WanderPlanLogo.JPG" alt="logo" id="logo"></a>
    </div>
  <div id="container">
	<div id="login">
		<h2> Log in to view your iteneraries. </h2>
		<form method="post" action="$script">
			Username: <input type = "text" name = "username" size = "30" />
			<br><br>
			Password: <input type = "text" name = "password" size = "30" />
			<br><br>
			<input type="submit" value="Log In" name="loggingin"/>
			<input type="submit" value="Create an account" name="registration"/>
		</form>
	</div>
  </div>
LOGIN;
}

function showArticle($destination) {
	setcookie("loggedin", "true", time()+300);
	header("Location: $destination");
	echo "done";
}
?>