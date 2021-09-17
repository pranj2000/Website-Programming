<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>repl.it</title>
    <link href="style_plan.css" rel="stylesheet" type="text/css" />
    <script src="plan.js" defer></script>
  </head>
  <body>

    <div id="header">
        <a href="./"><img src="WanderPlanLogo.JPG" alt="logo" id="logo"></a>
    </div>

    <div id="top-nav" style="display: block;">
        <table>
          <tr>
            <td><a href="./">Home</a></td>
            <td><a href="explore.html"</a>Explore</td>  
            <td><a href="plan.html">Plan</a></td>
            <td><a href="contactus.html">Contact</a></td>
            <td><a href="faq.html">FAQ</a></td>
          </tr>                
        </table>
    </div>

    <?php

    $place = $_POST["place"];
    if ($place == "Smokies"){
            echo '<table align="center" width="30%" border="2">';
            echo '<caption style="margin-bottom:0.25cm;"> <b>Itinerary for Smoky Mountains</b> </caption>';
            echo '<tbody><tr><th style="width:130px"> Time </th><th> Name </th></tr>';
            echo '<tr><td name="time"> 8:00 am </td><td> Madam\'s Diner </td></tr>';
            echo '<tr><td class="time"> 10:00 am </td><td> Laurel Falls Trail </td></tr>';
            echo '<tr><td class="time"> 12:00 pm </td><td> Great Smoky Distillery </td></tr>';
            echo '<tr><td class="time"> 2:00 pm </td><td> Smokies Favorite Foods </td></tr>';
            echo '<tr><td class="time"> 4:00 pm </td><td> Alum Cave Trailhead </td></tr>';
            echo '<tr><td class="time"> 6:00 pm </td><td>  </td></tr>';
            echo '<tr><td class="time"> 8:00 pm </td><td> AirBnB </td></tr>';
            echo '<tr><td class="time"> 10:00 pm </td><td> Madam\'s Diner </td></tr>';
            echo '</tbody></table>';
         }
         else if ($place == "Austin"){
            echo '<table align="center" width="30%" border="2">';
            echo '<caption style="margin-bottom:0.25cm;"> <b>Itinerary for Austin</b> </caption>';
            echo '<tbody><tr><th style="width:130px"> Time </th><th> Name </th></tr>';
            echo '<tr><td name="time"> 8:00 am </td><td> Kerbey Lane </td></tr>';
            echo '<tr><td class="time"> 10:00 am </td><td> UT-Austin Campus </td></tr>';
            echo '<tr><td class="time"> 12:00 pm </td><td> Zilker Park </td></tr>';
            echo '<tr><td class="time"> 2:00 pm </td><td> Austin Eastcider </td></tr>';
            echo '<tr><td class="time"> 4:00 pm </td><td> The Domain </td></tr>';
            echo '<tr><td class="time"> 6:00 pm </td><td> Franklin\'s BBQ </td></tr>';
            echo '<tr><td class="time"> 8:00 pm </td><td> </td></tr>';
            echo '<tr><td class="time"> 10:00 pm </td><td> 6th Street </td></tr>';
            echo '</tbody></table>';
         } else if ($place == "Maui"){
            echo '<table align="center" width="30%" border="2">';
            echo '<caption style="margin-bottom:0.25cm;"> <b>Itinerary for Maui</b> </caption>';
            echo '<tbody><tr><th style="width:130px"> Time </th><th> Name </th></tr>';
            echo '<tr><td name="time"> 8:00 am </td><td> Starbucks </td></tr>';
            echo '<tr><td class="time"> 10:00 am </td><td> Kaanapali Beach </td></tr>';
            echo '<tr><td class="time"> 12:00 pm </td><td> Hana Highway </td></tr>';
            echo '<tr><td class="time"> 2:00 pm </td><td> </td></tr>';
            echo '<tr><td class="time"> 4:00 pm </td><td> </td></tr>';
            echo '<tr><td class="time"> 6:00 pm </td><td> </td></tr>';
            echo '<tr><td class="time"> 8:00 pm </td><td> </td></tr>';
            echo '<tr><td class="time"> 10:00 pm </td><td> AirBnB </td></tr>';
            echo '</tbody></table>';
         }


    ?>

</body>
</html>