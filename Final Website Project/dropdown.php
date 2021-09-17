<!DOCTYPE html>

<html lang="en">

<head>
  <title>AJAX</title>
  <meta charset="UTF-8">
  <meta name="description" content="AJAX">
  <meta name="author" content="Pranjal J">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <style>
    h1 {
        color: #d62a2a;
        text-align: center;
        font-family: Optima, sans-serif;
        font-weight: 85;
      }
    #plan_description {
        text-align: center;
        font-family: Optima, sans-serif;
        font-size: 12pt;
    }
    #plan_overlay {
        width: 20%;
        min-width: 30%;
        margin: 0% auto;
        display: block;
        padding: 2%;
        height: 10vh;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        text-align: center;
    }
    .plan_buttons {
      background-color: #bc2109;
      border: none;
      color: white;
      padding: 8px 15px;
      text-align: center;
      text-decoration: none;
      font-family: Tahoma, sans-serif;
      font-size: 16px;
    }
    option {
      width: 2px;
    }

  </style>
</head> 

   <body>
    <div id="header">
    <a href="./"><img src="WanderPlanLogo.JPG" alt="logo" id="logo"></a>
    </div>
    <div id="login-button">
      <form method="post" action="register.php"><input type="hidden" name="destination" value="explore.html"><input id="link" type="submit" value="Login"></form>
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
    <h1>Plan Your Trip</h1>
    <p id="plan_description">Choose any location from the dropdown menu to view our suggested itinerary!</p>
      
      <script language = "javascript" type = "text/javascript">

            //Browser Support Code
            function ajaxFunction(server,user,pwd,dbName){
               var ajaxRequest;  // The variable that makes Ajax possible!
               
               ajaxRequest = new XMLHttpRequest();
               
               // Create a function that will receive data sent from the server and will update
               // the div section in the same page.
          
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('ajaxDiv');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
               
               // Now get the value from user and pass it to server script.
               
               var place = document.getElementById("places").value;
              
               var queryString = "?place=" + place;
            
               queryString += "&server=" + server + "&user=" + user + "&pwd=" + pwd + "&dbName=" + dbName;
               
               ajaxRequest.open("GET", "planAJAX.php" + queryString, true);
               ajaxRequest.send(null);
            }

      </script>

      <form method = "POST" name = 'myForm'>

        <?php
          $server = "spring-2021.cs.utexas.edu";
          $user   = "cs329e_bulko_mjhaveri";
          $pwd    = "Plead8Shrimp9Goal";
          $dbName = "cs329e_bulko_mjhaveri";

          // print just to confirm they got passed correctly
          //echo "Server: <code>".$server."</code><br>";
          //echo "User: <code>".$user."</code><br>";
          //echo "Database name: <code>".$dbName."</code><br>";
          echo "<div id='plan_overlay'>";  
          echo "<select id='places'>";
          echo "<option value='Athens'> Athens </option>";
          echo "<option value='Bali'> Bali </option>";
          echo "<option value='Barcelona'> Barcelona </option>";
          echo "<option value='Bangkok'> Bangkok </option>";
          echo "<option value='Beijing'> Beijing </option>";
          echo "<option value='Delhi'> Delhi </option>";
          echo "<option value='Dubai'> Dubai </option>";
          echo "<option value='Hong Kong'> Hong Kong </option>";
          echo "<option value='Istanbul'> Istanbul </option>";
          echo "<option value='Kaula Lumpur'> Kaula Lumpur </option>";
          echo "<option value='London'> London </option>";
          echo "<option value='New York'> New York </option>";
          echo "<option value='Paris'> Paris </option>";
          echo "<option value='Phuket'> Phuket </option>";
          echo "<option value='Rome'> Rome </option>";
          echo "<option value='San Francisco'> San Francisco </option>";
          echo "<option value='Seoul'> Seoul </option>";
          echo "<option value='Singapore'> Singapore </option>";
          echo "<option value='Sydeny'> Sydney </option>";
          echo "<option value='Tokyo'> Tokyo </option>";
          echo "</select>";
           echo "<br><br>";
          echo "<input class='plan_buttons' type = \"button\" onclick = \"ajaxFunction('$server','$user','$pwd','$dbName')\" value = \"Submit\"/> <br><br> ";
        ?>
      </form>
      
      <div id = 'ajaxDiv'></div>
   </body>
</html>