<?php

include("bdd.php");
 if (isset($_GET['s'])){
	 $s=$_GET['s'];
	
	
	 $sql ="DELETE FROM voiture where matricule='$s'";
 mysql_query($sql) or die('erreur sql !'.$sql.'<br>'.mysql_error());
	 
 }

?>









