<?php
// Démarre la session PHP
session_start();


$query = "INSERT INTO users (email"

    // Vérification si le nom d'utilisateur existe dans la "base de données" et si le mot de passe correspond
    if (isset($users[$username]) && $users[$username] == $password) 
        // Regénération de l'ID de session pour la sécurité (évite l'exploitation de session fixation)
        session_regenerate_id(true);

        // Redirection de l'utilisateur vers la page d'acceuil'
        header('Location: ../../index.php');
        exit; // Arrêt du script pour éviter l'exécution de code supplémentaire après la redirection
    } else {
        // Si les identifiants sont incorrects, préparation d'un message d'erreur
        $error = 'Identifiants incorrects!';
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" /> <!-- Définit l'encodage des caractères -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Définit les propriétés de l'affichage sur les appareils mobiles -->
    <title>Get Keys | Login</title> <!-- Titre de la page -->
    <link rel="stylesheet" href="../../assets/style/style.css" /> <!-- Inclut la feuille de style principale -->
    <link rel="stylesheet" href="../../assets/style/login.css" /> <!-- Inclut la feuille de style spécifique pour la page de connexion -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>


<body>
    <?php
    // Inclusion du header
    require_once '../_partials/_header.php'; // Inclut le fichier du haut de page (header)
    ?>


    <div class="bg">


    </div>

    <main class="form-signin">

        <h1 class="h3">Login</h1> <!-- Titre principal de la page de connexion -->
        <?php if (isset($error)) { ?> <!-- Vérifie si une erreur est définie -->
            <p class="erreurId"><?php echo $error; ?></p> <!-- Affiche un message d'erreur si une erreur est présente -->
        <?php } ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> <!-- Formulaire de connexion avec envoi des données vers la même page -->

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Username" required name="pseudo"> <!-- Champ de saisie pour le nom d'utilisateur -->
                <label for="username">Username</label> <!-- Libellé du champ de saisie pour le nom d'utilisateur -->
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required name="password"> <!-- Champ de saisie pour le mot de passe -->
                <label for="password">Password</label> <!-- Libellé du champ de saisie pour le mot de passe -->
            </div>

            <div class="checkbox mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" name="remember_me" id="rememberMeSwitch"> <!-- Case à cocher pour "Se souvenir de moi" -->
                    <label class="form-check-label" for="rememberMeSwitch"> Remember me</label> <!-- Libellé de la case à cocher -->
                </div>

            </div>
            <button class="w-100 btn btn-lg" type="submit">Connect</button> <!-- Bouton de connexion -->
        </form>

    </main>


    <footer>
        <!-- Inclusion du footer -->
        <?php
        require_once '../_partials/_footer.php'; // Inclut le fichier du bas de page (footer)
        ?>
    </footer>
    <!-- Inclusion de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> <!-- Inclut le JavaScript de Bootstrap -->

</body>

</html>
