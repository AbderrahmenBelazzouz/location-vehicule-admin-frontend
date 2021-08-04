<?php
include("bdd.php");
 if (isset($_GET['valeur'])){
	 $valeur=$_GET['valeur'];
	 $name=$_GET['name'];
	 $id_vf=$_GET['id_vf'];
	 $sql ="UPDATE voiture set $name='$valeur' where matricule=$id_vf";
 mysql_query($sql) or die('erreur sql !'.$sql.'<br>'.mysql_error());
	 
 }

?>