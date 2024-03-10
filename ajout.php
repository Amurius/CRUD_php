<?php
if (!empty($_GET['animalid'])){
  include ('./traitement.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleAll.css">
  <link rel="stylesheet" href="styleAjout.css">
  <title>Animaux Farfelus</title>
</head>

<body>
  <div id="page">
    <nav>
      <a href="index.php">Accueil</a>
      <a href="ajout.php">Ajouter</a>
      <a href="connexion.php">Connexion</a>
    </nav>
    <div id="contenu">
      <div id="divSubmit">
        <form action="traitement.php" method="post" id="formSubmit" enctype="multipart/form-data">
          <p>Nom de l'Animal</p>
          <input type="text" name="nom" id="nom"> 
          <p>Famille</p>
          <input type="text" name="famille" id="famille">
          <p>Poids en grammes</p>
          <input type="number" name="poids" id="poids">
          <p>Taille en cm</p>
          <input type="number" name="taille" id="taille">
          <p>Couleurs majeurs</p>
          <input type="text" name="couleur" id="couleur">
          <p>Image</p>
          <input type="file" name="imageAnimal" id="image"/>
          
          <input type="submit" value="Ajouter" name="ajout">
        </form>
      </div>
      <?php 
      if (isset($_GET["message"]) && $_GET["message"] == "erreur") {
        echo "<script type='text/javascript'>alert('$_GET[text]');</script>";
      }
      ?>
    </div>
  </div>
</body>
<script defer type="text/javascript">
  document.getElementById("nom").setAttribute("value",'<?php echo $nom ?>');
  document.getElementById("famille").setAttribute("value",'<?php echo $famille ?>');
  document.getElementById("poids").setAttribute("value",'<?php echo $poids ?>');
  document.getElementById("taille").setAttribute("value",'<?php echo $taille ?>');
  document.getElementById("couleur").setAttribute("value",'<?php echo $couleur ?>');
  document.getElementById("formSubmit").setAttribute("action",'traitement.php?animalid=<?php echo $id ?>');

</script>
</html>
