<?php
session_start();
$connexion = new mysqli("127.0.0.1", "root", "", "animaux");
if (isset($_GET['animalid']))
  $id = $_GET['animalid'];  
if (isset($_GET['inscription']))
  $inscription = $_GET['inscription'];
if (isset($_GET['connect']))
  $connect = $_GET['connect'];
  

if (!empty($_POST['nom']) && !empty($_POST['famille']) && !empty($_POST['poids']) && !empty($_POST['taille']) && !empty($_POST['couleur'])) {
  $nom = $_POST['nom'];
  $famille = $_POST['famille'];
  $poids = $_POST['poids'];
  $taille = $_POST['taille'];
  $couleur = $_POST['couleur'];

  $target_dir = "./images/";
  $target_file = $target_dir . basename($_FILES["imageAnimal"]["name"]);


  move_uploaded_file($_FILES["imageAnimal"]["tmp_name"], $target_file);
  if ($id == null){
    $requete = "INSERT INTO animal (nom,famille,poids,taille,couleur,img) VALUES ('$nom','$famille','$poids','$taille','$couleur','$target_file') ON DUPLICATE KEY UPDATE id = id";
    $connexion->query($requete);
    $message = "Ajout réussi";
    header("Location: index.php?message=reussi&text=$message");
  } else {
    $requete = "UPDATE animal SET nom = '$nom', famille = '$famille', poids= '$poids',taille= '$taille',couleur = '$couleur', img = '$target_file' WHERE id = $id";
    $connexion->query($requete);
    $message = "Update réussi";
    header("Location: index.php?message=reussi&text=$message");
  }
} else if (!empty($_GET['animalid'])) {
  $id = $_GET['animalid'];
  $requete = "SELECT * FROM animal WHERE id = '$id'";
  $donnees = $connexion->query($requete);
  $i = 0;
  while (null !== ($donnee = $donnees->fetch_all()) && $i == 0) {
    $row = $donnee['0'];
    $nom = $row['1'];
    $famille = $row['2'];
    $poids = $row['3'];
    $taille = $row['4'];
    $couleur = $row['5'];
    $image = $row['6'];
    $i = 1;
  }
} else if (!empty($_GET['animalidsuppr'])) {
  
  $id = $_GET['animalidsuppr'];
  $requete = "DELETE FROM animal WHERE id = '$id'";
  $donnees = $connexion->query($requete);
  $message = "Suppression réussi";
  header("Location: index.php?message=reussi&text=$message");
} else if(!empty($inscription)) {
  $user = $_POST['nomUser'];
  $password = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
  $email = $_POST['email'];

  if ($_POST['mdp'] === $_POST['mdpConfirm']) {
    if (!empty($user) && !empty($password) && !empty($email)) {

      $requete = "INSERT INTO user (nom, motDePasse, email) VALUES ('$user', '$password','$email')";
      $connexion->query($requete);
      header("Location: index.php");
    }
  } else {
    echo "<script>alert('wrong')</script>";
  }
} else if (!empty($connect)){
  $email = $_POST['email'];
  $requete = "SELECT id, motDePasse FROM user WHERE email = '$email'";
  $donnees = $connexion->query($requete);
  $i = 0;
  while (null !== ($donnee = $donnees->fetch_all()) && $i == 0) {
    $row = $donnee['0'];
    if (password_verify($_POST["mdp"],$row['1'])){
      session_start();
      $_SESSION['Identifiant'] = $row['0'];
      header("Location: index.php");
    }
    $i = 1;
  }
}else if (isset($_GET['deco'])){
  session_destroy();
  header("Location: index.php");
}
else {
  $message = "Veuillez renseigner tous les champs BANDE DE FILS DE HESSSS";
  header("Location: ajout.php?message=erreur&text=$message");
}
$connexion->close();


