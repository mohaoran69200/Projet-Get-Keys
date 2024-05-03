<?php
// Démarre une session
session_start();

$pdo = new \PDO('mysql:host=localhost;port=3308;dbname=getkeys', 'mohamed', '1990');

// Récupération des annonces
$sql = 'SELECT * FROM listings';
$stmt = $pdo->query($sql); // Exécute la requête
$allResult = $stmt->fetchAll(); // Récupère toutes les lignes restantes du résultat de votre requête en une seule opération

// Récupération des images associées à chaque annonce
$sqlImages = 'SELECT * FROM images WHERE id_listings = :id_listings';
$stmtImages = $pdo->prepare($sqlImages);

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
                <?php foreach ($allResult as $property) :
                    if ($property['type of home'] === 'House') : 
                        // Récupération des images associées à cette annonce
                        $stmtImages->execute(['id_listings' => $property['id']]);
                        $images = $stmtImages->fetchAll();
                        ?>
                        <?php include __DIR__ . '/src/_partials/listings/_house.php'; ?>
                <?php endif;
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
                <?php foreach ($allResult as $property) :
                    if ($property['type of home'] === 'Apartment') : 
                        // Récupération des images associées à cette annonce
                        $stmtImages->execute(['id_listings' => $property['id']]);
                        $images = $stmtImages->fetchAll();
                        ?>
                        <?php include __DIR__ . '/src/_partials/listings/_house.php'; ?>
                <?php endif;
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
