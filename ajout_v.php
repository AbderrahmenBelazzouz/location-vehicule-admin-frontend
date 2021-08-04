<?php
include('bdd.php');

if(isset($_POST['firstname'])) $num=$_POST['firstname'];
else $num='';


echo "$num";
 
$sql ="DELETE FROM voiture WHERE  matricule = '$num'";
 mysql_query($sql) or die('erreur sql !'.$sql.'<br>'.mysql_error());
 
 

 
 header("Location:admin.php");









?>