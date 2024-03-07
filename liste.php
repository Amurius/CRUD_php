<?php
$connexion = new mysqli("127.0.0.1", "root", "", "animaux");
$requete = "SELECT * FROM animal";
$animaux = $connexion->query($requete);
$connexion ->close();
  ?>