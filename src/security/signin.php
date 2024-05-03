<?php

session_start(); // Démarre une session

// Connexion à la base de données
$dsn = 'mysql:host=localhost;port=3308;dbname=getkeys'; // Informations de connexion à la base de données
$username = 'mohamed'; // Nom d'utilisateur de la base de données
$password = '1990'; // Mot de passe de la base de données

try {
    $pdo = new \PDO($dsn, $username, $password); // Connexion à la base de données
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); // Définit le mode d'erreur PDO à ERRMODE_EXCEPTION

    // Vérifie si le formulaire d'inscription a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifie si la méthode de la requête est POST
        // Vérifie si les champs du formulaire ne sont pas vides
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            // Récupère les informations soumises dans le formulaire
            $email = $_POST['email']; // Récupère l'email soumis dans le formulaire
            $password = $_POST['password']; // Récupère le mot de passe soumis dans le formulaire

            // Vérifie si l'email existe déjà dans la base de données
            $stmt_check_email = $pdo->prepare("SELECT COUNT(*) AS num_rows FROM users WHERE email = :email");
            $stmt_check_email->bindParam(':email', $email);
            $stmt_check_email->execute();
            $row = $stmt_check_email->fetch(PDO::FETCH_ASSOC);

            if ($row['num_rows'] > 0) {
                // Affiche un message d'erreur si l'email existe déjà
                $error = "Cet email est déjà utilisé.";
            } else {
                // Hashage du mot de passe
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hashage du mot de passe avec l'algorithme par défaut de PHP

                // Prépare la requête SQL pour insérer un nouvel utilisateur dans la base de données
                $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");

                // Liaison des valeurs et exécution de la requête
                $stmt->bindParam(':email', $email); // Lie la valeur de l'email à la requête SQL
                $stmt->bindParam(':password', $hashed_password); // Lie la valeur du mot de passe hashé à la requête SQL
                $stmt->execute(); // Exécute la requête SQL pour insérer un nouvel utilisateur dans la base de données

                // Redirige l'utilisateur vers la page de connexion
                header("Location: login.php"); // Redirige l'utilisateur vers la page de connexion
                exit; // Arrête l'exécution du script
            }
        } else {
            // Affiche un message d'erreur si les champs du formulaire sont vides
            $error = "Veuillez remplir tous les champs.";
        }
    }
} catch (\PDOException $e) {
    // Affiche un message d'erreur en cas d'échec de la connexion à la base de données
    $error = "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Get Keys | Sign In</title>
    <link rel="stylesheet" href="../../assets/style/style.css" />
    <link rel="stylesheet" href="../../assets/style/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    // Inclusion du header
    require_once '../_partials/_header.php'; // Inclut le fichier du haut de page (header)
    ?>


    <div class="bg"></div>

    <main class="form-signin">
        <h1 class="h3">Sign In</h1>
        <?php if (isset($error)) { ?>
            <p class="erreurId"><?php echo $error; ?></p>
        <?php } ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required name="email">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required name="password">
                <label for="password">Password</label>
            </div>
            <button class="w-100 btn btn-lg" type="submit">Sign In</button>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<footer>
    <?php
    require_once '../_partials/_footer.php'; // Inclut le fichier du bas de page (footer)
    ?>

</footer>

</html>
