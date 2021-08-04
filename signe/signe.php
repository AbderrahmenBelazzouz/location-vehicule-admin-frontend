
<!DOCTYPE html>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="mycss/signe.css" media="screen" />

<style>
html{
 background-image: url("dfghjkl.jpg");
}
</style>
<body>

<?php
/* connexion */
$link = mysqli_connect("localhost", "root", "", "web");
 
// vérification
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
// Protège les caractères spéciaux d'une chaîne pour l'utiliser dans une requête SQL
$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['lname']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$nbrl = mysqli_real_escape_string($link, $_REQUEST['nbrL']);
$gender= mysqli_real_escape_string($link, $_REQUEST['gender']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$pword = mysqli_real_escape_string($link, $_REQUEST['pword']);
$adr = mysqli_real_escape_string($link, $_REQUEST['adr']);

// attempt insert query execution
$sql = "INSERT INTO  utilisateur (nom_u,prenom_u,age,n_permi,sexe,mail_u,telephone_u,mdp,adr) 
VALUES ('$fname', '$last_name', '$age','$nbrl','$gender','$email','$phone','$pword','$adr')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// fermer connection
mysqli_close($link);
?>

<!-- *****************************************************************************************************************************-->
<!--boîte d'inscription-->
<!-- la methode post pour Récupérer les valeurs d'un formulaire -->
<form id="regForm" action="" method="post">
  <h1>Register:</h1>
  <!--  "div" pour chaque étape du formulaire -->
  <div class="tab">Nom:
    <p><input placeholder="Nom..." oninput="this.className = ''" name="fname"></p>
    <p><input placeholder="Prenom..." oninput="this.className = ''" name="lname"></p>
	<p><input placeholder="l'age..." oninput="this.className = ''" name="age"></p>
    <p><input placeholder="numéro de permis..." oninput="this.className = ''" name="nbrL"></p>
    <p>   Male  <input type="radio" name="gender" value="male">
         Female   <input type="radio" name="gender" value="female">  <br> </p>
  </div>
  
  
  <div class="tab">Contact Info:
    <p>E-mail<input placeholder="example@exaple.com" oninput="this.className = ''" name="email"></p>
    <p>Phone<input type="tel" placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
	<p>adresse<textarea name="adr" rows="3" cols="38">  Tapez l'adresse ici </textarea> </p>
  </div>
  
  
  <div class="tab">Login Info:
    <p> mot de passe<input placeholder="mot de passe..." oninput="this.className = ''" name="pword" type="password"></p>
	 <p> confirme<input placeholder="confirme mot de passe..." oninput="this.className = ''" name="pword2" type="password"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Cercles qui indiquent les étapes du formulaire -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
<!-- *****************************************************************************************************************************-->

<script>
var currentTab = 0; // L'onglet actuel est défini comme le premier onglet (0)
showTab(currentTab); // Afficher l'onglet en cours
function showTab(n) {
  // Cette fonction affichera l'onglet spécifié du formulaire ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... et corrigez les boutons Précédent / Suivant:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //.. et exécutez une fonction qui affichera l'indicateur de pas correct:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // Cette fonction va déterminer quel onglet afficher
  var x = document.getElementsByClassName("tab");
  //Quittez la fonction si un champ de l'onglet actuel est invalide:
  if (n == 1 && !validateForm()) return false;
  // Masquer l'onglet actuel:
  x[currentTab].style.display = "none";
  // Augmenter ou diminuer la tabulation actuelle de 1:
  currentTab = currentTab + n;
  // si vous avez atteint la fin du formulaire ...
  if (currentTab >= x.length) {
    // ... le formulaire est soumis:
    document.getElementById("regForm").submit();
    return false;
  }
  // Sinon, affichez l'onglet correct:
  showTab(currentTab);
}

function validateForm() {
  // Cette fonction concerne la validation des champs de formulaire
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  //Une boucle qui vérifie chaque champ de saisie de l'onglet en cours
  for (i = 0; i < y.length; i++) {
    // Si un champ est vide 
    if (y[i].value == "") {
      // ajouter une classe "invalide" au champ:
      y[i].className += " invalid";
      //et définissez le statut valide actuel sur false 
      valid = false;
    }
  }
  // Si le statut valide est "true", marquez l'étape comme terminée et valide:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // renvoyer le statut valide
}

function fixStepIndicator(n) {
  // Cette fonction supprime la classe "active" de toutes les étapes ...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... et ajoute la classe "active" à l'étape en cours:
  x[n].className += " active";
}

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>

