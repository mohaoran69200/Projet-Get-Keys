<?php
// Initialiser les variables de message d'erreur
$errors = [];

// Vérifications des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du champ 'localisation'
    if (empty($_POST['localisation'])) {
        $errors['localisation'] = "Localisation is required";
    }

    // Vérification du champ 'prix'
    if (empty($_POST['prix'])) {
        $errors['prix'] = "Price is required";
    }

    // Vérification du champ 'type'
    if (empty($_POST['type'])) {
        $errors['type'] = "Type is required";
    }

    // Vérification du champ 'bedroom'
    if (empty($_POST['bedroom'])) {
        $errors['bedroom'] = "Number of bedrooms is required";
    }

    // Vérification du champ 'bathroom'
    if (empty($_POST['bathroom'])) {
        $errors['bathroom'] = "Number of bathrooms is required";
    }

    // Vérification du champ 'surface'
    if (empty($_POST['surface'])) {
        $errors['surface'] = "Surface m2 is required";
    }

    // Vérification du champ 'description'
    if (empty($_POST['description'])) {
        $errors['description'] = "Description is required";
    }

    // Si aucune erreur n'est détectée, procéder à la redirection
    if (empty($errors)) {
        // Redirection vers la page de confirmation ou de traitement des données
        header("Location: confirmation.php");
        exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Get Keys | Home</title>
    <link rel="stylesheet" href="../assets/style/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>


<body>
    <?php 
    // Inclure le header
    require_once '../_partials/_header.php';
  ?>
    <main>
        <!-- Inclure le formulaire -->
        <?php
        require '../_partials/listings/_form_new_ad.php';
        ?>

        <?php 
        // Inclure le footer
        require_once '../_partials/_footer.php';
        ?>

    </main>
    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
