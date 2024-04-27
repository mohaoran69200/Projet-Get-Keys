<?php
session_start();

// // Vérifier si l'utilisateur a des annonces favorites
// if (isset($_SESSION['properties']) && !empty($_SESSION['properties'])) {
//     // Parcourir toutes les annonces
//     foreach ($_SESSION['properties'] as $property) {
//         // Vérifier si l'annonce est marquée comme favori
//         if (isset($property['favoris']) && $property['favoris']) {

//         }
//     }
// } else {
//     echo "Vous n'avez aucune annonce préférée.";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites</title>
    <link rel="stylesheet" href="../../assets/style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
    <?php require_once '../../src/_partials/_header.php'; ?>

    <main>
        <h1>Mes favoris</h1>

        <div class="favorites-container">
            <?php
            if (isset($_SESSION['properties']) && !empty($_SESSION['properties'])) {
                // Parcourir toutes les annonces
                foreach ($_SESSION['properties'] as $property) {
                    // Vérifier si l'annonce est marquée comme favori
                    if (isset($property['favoris']) && $property['favoris']) {
                        include '../_partials/listings/_house.php';
                    }
                }
            } else {
                $message = "Vous n'avez aucune annonce préférée.";
            }
            if (isset($message)) {
                echo "<p>$message</p>";
            }
            ?>
        </div>
    </main>

    <?php require_once '../../src/_partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
