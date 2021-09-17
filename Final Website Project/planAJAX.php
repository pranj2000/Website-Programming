<?php

   error_reporting(E_ALL);
   ini_set("display_errors", "on");
   
   $server = $_GET["server"];
   $user   = $_GET["user"];
   $pwd    = $_GET["pwd"];
   $dbName = $_GET["dbName"];

   // print just to confirm they got passed correctly
   //echo "Server: <code>".$server."</code><br>";
   //echo "User: <code>".$user."</code><br>";
   //echo "Database name: <code>".$dbName."</code><br><br>";
   
   // Connect to MySQL Server
   $mysqli = new mysqli($server, $user, $pwd, $dbName);

   if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } /*else {
      echo "<code>...Connection successful</code> <br>";
   }*/
  
   //Select Database
   $mysqli->select_db($dbName) or die($mysqli->error);
   
   // Retrieve data from Query String
   $place = $_GET['place'];
   
   // Escape User Input to help prevent SQL Injection
   $place = $mysqli->real_escape_string($place);

   //build query
   //echo "<code>...Building query</code><br>";

   $query = "SELECT * FROM travels JOIN restaurants ON travels.city =restaurants.city WHERE travels.city = '$place'";
   
   //Execute query
   //echo "<code>...Executing query</code><br><br>";
   $result = $mysqli->query($query) or die($mysqli->error);
   
   $row = $result->fetch_row();
   
   //Build Result String

   $display_string = "<table border=2 id='dropdown-table'> <tr><th>Time</th><th>Activity</th></tr>";
   $display_string .= "<tr><th>7AM</th><td>$row[7]</td></tr>";
   $display_string .= "<tr><th>8AM</th><td>$row[1]</td></tr>";
   $display_string .= "<tr><th>10AM</th><td>$row[2]</td></tr>";
   $display_string .= "<tr><th>12PM</th><td>$row[8]</td></tr>";
   $display_string .= "<tr><th>2PM</th><td>$row[3]</td></tr>";
   $display_string .= "<tr><th>5PM</th><td>$row[4]</td></tr>";
   $display_string .= "<tr><th>7PM</th><td>$row[9]</td></tr>";
   $display_string .= "<tr><th>9PM</th><td>$row[5]</td></tr>";
   
   //echo "Query: <code>" . $query . "</code> <br><br>";
   
   $display_string .= "</table>";
   echo $display_string;

?>