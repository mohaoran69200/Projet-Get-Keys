<?php
// Récupération des données du formulaire
$localisation = $_POST['localisation']; // Récupère la valeur du champ 'localisation'
$prix = $_POST['prix']; // Récupère la valeur du champ 'prix'
$type = $_POST['type']; // Récupère la valeur du champ 'type'
$bedroom = $_POST['bedroom']; // Récupère la valeur du champ 'bedroom'
$bathroom = $_POST['bathroom']; // Récupère la valeur du champ 'bathroom'
$surface = $_POST['surface']; // Récupère la valeur du champ 'surface'
$description = $_POST['description']; // Récupère la valeur du champ 'description'

// Affichage des données récupérées
echo "localisation:". $localisation . "<br>"; // Affiche la localisation
echo "prix:". $prix . "<br>"; // Affiche le prix
echo "type:". $type . "<br>"; // Affiche le type
echo "bedroom:". $bedroom . "<br>"; // Affiche le nombre de chambres
echo "bathroom:". $bathroom . "<br>"; // Affiche le nombre de salles de bains
echo "surface:". $surface . "<br>"; // Affiche la surface
echo "description:". $description . "<br>"; // Affiche la description

// Affiche le contenu complet des données POST
var_dump($_POST);
?>
