<?php
session_start(); // Démarre la session PHP

// Détruit toutes les données de session
session_destroy();

// Redirige vers login.php
header("Location: login.php");
exit;
?>
