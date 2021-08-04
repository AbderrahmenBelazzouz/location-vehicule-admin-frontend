<?php                 
include('bdd.php');

$sql=mysql_query("SELECT * FROM voiture");
while($row = mysql_fetch_array($sql)) 
{
	$id_v=$row['id_v'];
	$modele=$row['modele'];
	$couleur=$row['couleur'];
	$matricule=$row['matricule'];
	$type=$row['type'];
	$d_f_serence=$row['d_f_serence'];
	$compteur=$row['compteur'];
	$prix_v=$row['prix_v'];
	$image_v=$row['image_v'];
	$disponible=$row['disponible'];
	$remarque=$row['remarque'];
	if ($disponible==0){$disponiblee='oui';}else {$disponiblee='non';}
	if($disponible==0)
	echo"
	<tr id='aymen$matricule' class='modif' data-id='$matricule'>
    <td data-element='modele'>$modele</td>
	<td data-element='matricule'>$matricule</td>
	<td data-element='d_f_serence'>$d_f_serence</td>
    <td data-element='compteur'>$compteur</td>
	<td data-element='prix_v'>$prix_v</td>
	<td data-element='disponiblee'>$disponiblee</td>
    <td data-element='image_v'><img src='assets/img/$image_v'/ style='height:40px; wight:60px'></td>
    <td data-element='remarque'>$remarque</td>
    <th data-element='remarque'><i class='icon-remove' onclick='supprimer($matricule)'></i>  <i class='icon-bell'></i></th>
  </tr>"; 
  else if($disponible==1)
	  echo"
	<tr style='color:red' class='modif' data-id='$matricule'>
    <td data-element='modele'>$modele</td>
	<td data-element='matricule'>$matricule</td>
	<td data-element='d_f_serence'>$d_f_serence</td>
    <td data-element='compteur'>$compteur</td>
	<td data-element='prix_v'>$prix_v</td>
	<td data-element='disponiblee'>$disponiblee</td>
    <th data-element='image_v'><img src='assets/img/$image_v'/ style='height:40px; wight:60px'></th>
    <td data-element='remarque'>$remarque</td>
	<th data-element='remarque'><i class='icon-remove' onclick='supprimer($matricule)'></i>  <i class='icon-bell'></i></th>
  </tr>" ;
  else if($disponible==3)
	  echo"
	<tr style='color:lime;' class='modif' data-id='$matricule'>
    <td data-element='modele'>$modele</td>
	<td data-element='matricule'>$matricule</td>
	<td data-element='d_f_serence'>$d_f_serence</td>
    <td data-element='compteur'>$compteur</td>
	<td data-element='prix_v'>$prix_v</td>
	<td data-element='disponiblee'>$disponiblee</td>
    <th data-element='image_v'><img src='assets/img/$image_v'/ style='height:40px; wight:60px'></th>
    <td data-element='remarque'>$remarque</td>
	<th data-element='remarque'><i class='icon-remove' onclick='supprimer($matricule)'></i>  <i class='icon-bell' onclick='valid($matricule)'></i></th>
  </tr>" ;
}



?>

<script>
function supprimer(sup){
	var s=sup;
	var r=confirm("are you sur");
if ( r==true){
	$.get("supp_v.php",{"s":s},function(data){})
	alert('votre voiture a éte supp')
	var mll='aymen'+s;
$('#'+mll).hide(1500) 	
	} else {}
	
	
	
	
	
}





</script>