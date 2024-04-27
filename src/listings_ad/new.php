<?php
// Démarre la session PHP
session_start();
// Initialiser les variables de message d'erreur
$errors = [];

// Vérifie si l'utilisateur est connecté en vérifiant si la variable de session 'username' est définie
$userLoggedIn = isset($_SESSION['username']);

// Si l'utilisateur n'est pas connecté, redirige-le vers la page de connexion
if (!$userLoggedIn) {
    header('Location: ../security/login.php');
    exit; // Arrête l'exécution du script après la redirection
}

// Vérifications des données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $annonce = [];
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

    // Vérification si le fichier a été uploadé sans erreur
    if (isset($_FILES['images'])) {
        $file_errors = $_FILES['images']['error'];

        // Vérifie s'il y a des erreurs lors du téléchargement des fichiers
        if (is_array($file_errors)) {
            foreach ($file_errors as $file_error) {
                if ($file_error != UPLOAD_ERR_OK) {
                    $errors['images'] = "Error uploading files";
                    break;
                }
            }
        } else {
            if ($file_errors != UPLOAD_ERR_OK) {
                $errors['images'] = "Error uploading files";
            }
        }

        // Définit les types de fichiers autorisés
        $allowed = ['jpg', 'jpeg', 'png', 'gif']; // Extensions autorisées

        // Boucle sur les fichiers téléchargés
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            // Récupère le nom du fichier
            $filename = $_FILES['images']['name'][$key];
            // Récupère le chemin temporaire du fichier
            $filetmp = $tmp_name;
            // Récupère l'extension du fichier
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            // Vérifie si l'extension du fichier est autorisée
            if (!in_array(strtolower($ext), $allowed)) {
                $errors['images'] = "Extension de fichier non autorisée.";
                break;
            } else {
                // Si le fichier est valide, le déplace vers le dossier de destination
                $destination = "/assets/uploads/" . uniqid('propertie-') . $filename;
                move_uploaded_file($filetmp, "../.." . $destination);
                // Stocke le chemin du fichier dans le tableau $annonce['imgs']
                $imgs[] = $destination;
            }
        }

        // Vérification du nombre minimum d'images téléchargées
        if (count($_FILES["images"]["name"]) < 3) {
            $errors['images'] = "Veuillez télécharger au moins trois images.";
        }
    }

    // Si aucune erreur n'est détectée, ajouter l'annonce au tableau $properties en session
    if (empty($errors)) {
        // Récupération des données du formulaire
        $annonce = [
            "id" => uniqid('annonce-'), // Génère un identifiant unique pour l'annonce
            "ville" => $_POST['localisation'],
            "prix" => $_POST['prix'],
            "bd" => $_POST['bedroom'],
            "ba" => $_POST['bathroom'],
            "sft" => $_POST['surface'],
            "des" => $_POST['description'],
            "type" => $_POST['type'],
            "type-home" => $_POST['type-home'],
            // Vous devrez également gérer le téléchargement d'images ici
            "imgs" => $imgs,
            "idC" => uniqid("Carroussel") // Génère un identifiant unique pour l'annonce
        ];

        // Ajout de l'annonce au tableau $properties en session
        $_SESSION['properties'][] = $annonce;

        // Redirection vers la page de confirmation ou de traitement des données
        header("Location: ../../index.php");
        exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Get Keys | Nouvelle Annonce</title>
    <link rel="stylesheet" href="../../assets/style/style.css" />
    <link rel="stylesheet" href="../../assets/style/form.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    // Inclure le header
    require_once '../_partials/_header.php';
    ?>
    <main>
        <!-- Inclure le formulaire -->
        <?php require '../_partials/listings/_form_new_ad.php'; ?>
    </main>
    <?php
    // Inclure le footer
    require_once '../_partials/_footer.php';
    ?>
    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>