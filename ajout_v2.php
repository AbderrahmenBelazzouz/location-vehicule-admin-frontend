<?php
include('bdd.php');


if(isset($_POST['modele'])) $mod=$_POST['modele'];
else $mod='';
if(isset($_POST['couleur'])) $coul=$_POST['couleur'];
else $coul='';
if(isset($_POST['matricule'])) $matr=$_POST['matricule'];
else $matr='';
if(isset($_POST['type'])) $type=$_POST['type'];
else $type='';
if(isset($_POST['d_f_serence'])) $ser=$_POST['d_f_serence'];
else $ser='';
if(isset($_POST['compteur'])) $comp=$_POST['compteur'];
else $comp='';
if(isset($_POST['prix_v'])) $prix=$_POST['prix_v'];
else $prix='';


if(($_FILES['image_v']['error'])==UPLOAD_ERR_OK)
{ $img=$_FILES['image_v']; 
  $image=$img['name'];
copy($img['tmp_name'],"./assets/img/$image");}else{}



if(isset($_POST['remarque'])) $r=$_POST['remarque'];
else $r='';


$sql ="INSERT INTO voiture VALUES ('','$mod','$coul','$matr','$type','$ser','$comp','$prix','$image','0','$r')";
 mysql_query($sql) or die('erreur sql !'.$sql.'<br>'.mysql_error());
 
header("Location:admin.php");




?>