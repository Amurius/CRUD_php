<?php

$connexion = new mysqli("127.0.0.1", "root", "", "animaux");

########################################################################
$nom = $_POST['nom'];
$famille = $_POST['famille'];
$poids = $_POST['poids'];
$taille = $_POST['taille'];
$couleur = $_POST['couleur'];



$target_dir = "./images/";
$target_file = $target_dir.basename($_FILES["imageAnimal"]["name"]);


move_uploaded_file($_FILES["imageAnimal"]["tmp_name"], $target_file);

if (!empty($nom) && !empty($famille) && !empty($poids) && !empty($taille) && !empty($couleur) && isset($_FILES["imageAnimal"])) {
  $requete = "INSERT INTO animal (nom,famille,poids,taille,couleur,img) VALUES ('$nom','$famille','$poids','$taille','$couleur','$target_file') ON DUPLICATE KEY UPDATE id = id";
  $connexion->query($requete);
  $message = "Ajout réussi";
  header("Location: index.php?message=reussi&text=$message");
} else {
  $message = "Veuillez renseigner tous les champs BANDE DE FILS DE HESSSS";
  header("Location: ajout.php?message=erreur&text=$message");
}
$connexion->close();
########################################################################


