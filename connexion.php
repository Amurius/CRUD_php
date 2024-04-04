<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styleAll.css">
  <link rel="stylesheet" href="styleConnexion.css">
  <title>Animaux Farfelus</title>
</head>

<body>
  <div id="page" onclick="javascript:pouf();">
    <nav>
      <a href="index.php">Accueil</a>
      <?php if (isset ($_SESSION["Identifiant"])) {
        echo "<a href='ajout.php'>Ajouter</a>";
        echo "<a href='traitement.php?deco=true'>Déconnection</a>";
      } else {
        echo "<a href=connexion.php?connection=true'>Ajouter</a>";
        echo "<a href='connexion.php?signup=true'>Sign up</a>";
        echo "<a href='connexion.php?connection=true'>Connection</a>    ";
      }
      ?>
    </nav>
    <div id="contenu">
      <?php if (isset ($_GET["signup"])) {
        echo "<h1 style='padding-bottom: 3%'>Sign Up</h1>";
      } else if (isset ($_GET["connection"])) {
        echo "<h1 style='padding-bottom: 3%'>Connection</h1>";
      }
      ?>
      <div id="divSubmit">
        <?php if (isset ($_GET["signup"])) {
          echo "<form id='formSubmit' method='post' action='traitement.php?inscription=true'>";
          echo "<input type='text' name='nomUser' placeholder='Votre nom d utilisateur'>";
          echo "<input type='text' name='email' placeholder='Votre email'>";
          echo "<input type='password' name='mdp' placeholder='Mot de passe'>";
          echo "<input type='password' name='mdpConfirm' placeholder='Confirmation de Mot de passe'>";
          echo "<input type='submit' name='inscription' value='inscription'>";
        } else if (isset ($_GET["connection"])) {
          echo "<form id='formSubmit' method='post' action='traitement.php?connect=true'>";
          echo "<input type='text' name='email' placeholder='Votre email'>";
          echo "<input type='password' name='mdp' placeholder='Mot de passe'>";
          echo "<input type='submit' name='connection' value='connection'>";
        }
        ?>
        </form>
      </div>
    </div>
  </div>
  <script defer>

  </script>
</body>

</html>