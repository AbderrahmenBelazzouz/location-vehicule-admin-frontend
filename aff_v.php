<?php
include('bdd.php');

$sql=mysql_query("SELECT * FROM voiture");
while($row = mysql_fetch_array($sql)) 
{
	$image_v=$row['image_v'];
	
	echo"
          <div class=\"span4  work-item food\">
            <h2> voiture 1</h2>
            
            <div class=\"sample work-item-image-container\">
              <div class=\"work-item-overlay\">
                <div class=\"inner\">
                  <ul>
                    <li><button type=\"button\" onclick=\"myFunction()\">RESERVER</button></li>
                    <li><a class=\"detail-link\" href=\"work-details.html\">View Details</a></li>
                  </ul>
                </div>
              </div>
              <img src='assets/img/$image_v'/ alt=\"iPhonegraphy\" /> </div>
          </div>
        ";}




?>