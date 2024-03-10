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
  <div id="page" onclick="javascript:pouf();">
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
          echo "<img src='" . $animal['img'] . "' style='width: 100%;height:60%'/>";
          echo "<p> Cet animal s'appelle <b>" . $animal["nom"] . "</b>. Il fait parti de la famille des <b>" . $animal["famille"] . "</b>. Son poids est de <b>" . $animal["poids"] . "g</b> et sa taille moyenne est de : <b>" . $animal["taille"] . "cm</b> </p>";
          echo "<a href='ajout.php?animalid=" . $animal["id"] . "' id='modif'>Modifier</a>";
          echo "<a href='javascript:confirme();' id='suppr'>Supprimer</a>";
          // echo "<a href='traitement.php?animalidsuppr=" . $animal["id"] . "' onclick='confirm('Are you sure?');'>Supprimer</a>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>
  <script defer>
    function pouf() {
      document.getElementById('msgReussi').style.display = 'none';
    }
    function confirme() {
      text ='tu veux vraimement delete ?';
      if (confirm(text) == true) {
        document.location = "traitement.php?animalidsuppr=<?php echo $animal["id"]?>";
      } else {
        alert("You canceled!");
      }
    }
  </script>
</body>

</html>