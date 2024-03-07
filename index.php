<?php
  include('./liste.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleAll.css">
  <link rel="stylesheet" href="styleIndex.css">
  <title>Animaux Farfelus</title>
</head>

<body>
  <div id="page">
    <nav>
      <a href="index.php">Accueil</a>
      <a href="ajout.php">Ajouter</a>
      <a href="connexion.php">Connexion</a>
    </nav>
    <?php if (isset($_GET["message"]) && $_GET["message"] == "reussi") {
      echo "<a id='msgReussi' href='javascript:pouf();' >" . $_GET['text'] . "</a>";
    }
    ?>
    <div id="contenu">
      <div class="divAnimal">
      <?php 
        foreach ($animaux as $animal) {
          echo "<div class='animal'>";
          echo "<img src='".$animal['img']."' style='width: 100%;height:60%'/>";
          echo "<p> Cet animal s'appelle <b>".$animal["nom"]."</b>. Il fait parti de la famille des <b>".$animal["famille"]."</b>. Son poids est de <b>".$animal["poids"]."g</b> et sa taille moyenne est de : <b>".$animal["taille"]."cm</b> </p>";
          echo "</div>";
        }
      ?>
      </div>
    </div>
  </div>
  <b></b>
  <script defer>
    function pouf() {
      document.getElementById('msgReussi').style.display = 'none';
    }
  </script>
</body>

</html>