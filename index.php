<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['username'])) {
    // Vérifie si des actions sont effectuées
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
        if ($_POST['action'] == 'add' && isset($_POST['annonce_id'])) {
            // Récupère l'identifiant de l'annonce à ajouter
            $annonceId = $_POST['annonce_id'];
            // Récupère les propriétés immobilières depuis la session
            $properties = $_SESSION['properties'];
            // Parcours les propriétés immobilières
            foreach ($properties as &$property) {
                // Vérifie si l'annonce correspond à l'identifiant
                if ($property['id'] == $annonceId) {
                    // Marque l'annonce comme favorite
                    $property['favoris'] = true;
                    break;
                }
            }
            // Met à jour les propriétés immobilières dans la session
            $_SESSION['properties'] = $properties;
            // Redirige l'utilisateur vers la page des favoris après avoir ajouté l'annonce
            header("Location: favorites.php");
            exit();
        }
    }
}

// Tableau des propriétés immobilières
$properties = [
    [
        "id" => 1,
        "ville" => "Houston, TX",
        "prix" => "$1,600,000",
        "bd" => "4bd",
        "ba" => "3ba",
        "sft" => "2,808 sft",
        "des" => "Discover luxury living in this 2-story masterpiece on a serene cul-de-sac ... ",
        "type" => "For sale",
        "type-home" => "House",
        "imgs" => [
            "/assets/images/imghouston1.jpg",
            "/assets/images/imghouston2.jpg",
            "/assets/images/imghouston3.jpg"
        ],
        "idC" => "Carroussel1",
        "favoris" => false // Initialiser favoris à false
    ],
    [
        "id" => 2,
        "ville" => "Pacific Palisades, CA",
        "prix" => "$8,250,000",
        "bd" => "6bd",
        "ba" => "8ba",
        "sft" => "7,148 sft",
        "des" => "Fall in love with the visual symphony that is the prestigious Paseo Miramar ...  ",
        "type" => "For sale",
        "type-home" => "House",
        "imgs" => [
            "/assets/images/pp2.jpg",
            "/assets/images/pp3.jpg",
            "/assets/images/pp4.jpg"
        ],
        "idC" => "Carroussel2",
        "favoris" => false // Initialiser favoris à false
    ],
    [
        "id" => 3,
        "ville" => "Boston, MA",
        "prix" => "$2,500/mo",
        "bd" => "2bd",
        "ba" => "2ba",
        "sft" => "1,100 sft",
        "des" => "This two-bedroom has a lot going for it ... ",
        "type" => "For rent",
        "type-home" => "Apartment",
        "imgs" => [
            "/assets/images/boston2.jpg",
            "/assets/images/boston3.jpg",
            "/assets/images/bostonapart.jpg",
        ],
        "idC" => "Carroussel4",
        "favoris" => false // Initialiser favoris à false
    ],
    [
        "id" => 4,
        "ville" => "New-York, NY",
        "prix" => "$5,780/mo",
        "bd" => "2bd",
        "ba" => "2ba",
        "sft" => "1,454 sft",
        "des" => "Spacious large 2 bedroom CO-OP in the heart of flushing ... ",
        "type" => "For rent",
        "type-home" => "Apartment",
        "imgs" => [
            "/assets/images/nyapart.jpg",
            "/assets/images/ny2.jpg",
            "/assets/images/ny3.jpg",
        ],
        "idC" => "Carroussel5",
        "favoris" => false // Initialiser favoris à false
    ],
    [
        "id" => 5,
        "ville" => "Orlando, FL",
        "prix" => "$1,375,000",
        "bd" => "4bd",
        "ba" => "4ba",
        "sft" => "2,976 sft",
        "des" => "Welcome home to this absolutely stunning and well-appointed home in Laureate Park ...  ",
        "type" => "For sale",
        "type-home" => "House",
        "imgs" => [
            "/assets/images/orlandohouse1.jpg",
            "/assets/images/orlando2.jpg",
            "/assets/images/orlando3.jpg",
        ],
        "idC" => "Carroussel3",
        "favoris" => false // Initialiser favoris à false
    ],
    [
        "id" => 6,
        "ville" => "Oklahoma City, OK",
        "prix" => "$1,900/mo",
        "bd" => "2bd",
        "ba" => "4ba",
        "sft" => "3,195 sft",
        "des" => "Looking for an awesome investment opportunity ?!",
        "type" => "For rent",
        "type-home" => "Apartment",
        "imgs" => [
            "/assets/images/okcapart.jpg",
            "/assets/images/okc2.jpg",
            "/assets/images/okc3.jpg",
        ],
        "idC" => "Carroussel6",
        "favoris" => false // Initialiser favoris à false
    ],
];

// Enregistrement du tableau properties en session si ce n'est pas déjà fait
if (!isset($_SESSION['properties'])) {
    $_SESSION['properties'] = $properties;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Get Keys | Home</title>
    <link rel="stylesheet" href="./assets/style/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php require_once './src/_partials/_header.php'; ?>
    <main>
        <!-- Section des maisons à vendre -->
        <section>
            <h1 id="house">House</h1>
            <!-- Conteneur pour les maisons à vendre -->
            <div class="house-container">
                <?php foreach ($_SESSION['properties'] as $property) :
                    if (isset($property['type-home']) && $property['type-home'] === 'House') :
                        include __DIR__ . '/src/_partials/listings/_house.php';
                    endif;
                endforeach; ?>
            </div>
            <!-- Fin du conteneur des maisons à vendre -->
        </section>
        <!-- Fin de la section des maisons à vendre -->

        <!-- Section des appartements à louer -->
        <section>
            <h1 id="apartment">Apartment</h1>
            <!-- Conteneur pour les appartements à louer -->
            <div class="apartment-container">
                <?php foreach ($_SESSION['properties'] as $property) :
                    if (isset($property['type-home']) && $property['type-home'] === 'Apartment') :
                        include __DIR__ . '/src/_partials/listings/_house.php';
                    endif;
                endforeach; ?>
            </div>
            <!-- Fin du conteneur des appartements à louer -->
        </section>
        <!-- Fin de la section des appartements à louer -->
    </main>
    <?php require_once './src/_partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
