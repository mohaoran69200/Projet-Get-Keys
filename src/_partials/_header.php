<?php
// Vérifie si la session n'est pas déjà active avant de démarrer une nouvelle session
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarre la session PHP
}

// Vérifie si l'utilisateur est connecté en vérifiant si la variable de session 'username' est définie
$userLoggedIn = isset($_SESSION['username']);

// Si l'utilisateur est connecté, affiche le bouton "Disconnect"
if ($userLoggedIn) {
    $disconnectLink = '../security/logout.php'; // Lien vers la page de déconnexion
    $disconnectText = 'Disconnect'; // Texte du bouton de déconnexion
} else {
    $disconnectLink = '../security/login.php'; // Lien vers la page de connexion
    $disconnectText = 'Login'; // Texte du bouton de connexion
}
?>

<!-- Début de l'en-tête -->
<header>
    <!-- Début de la barre de navigation -->
    <nav class="navbar">
        <!-- Conteneur du logo -->
        <div class="container-logo">
            <!-- Logo et lien vers la page d'accueil -->
            <a href="../../index.php" class="home-button">
                <img src="../../assets/logo/House Keys.png" alt="Logo" />
                <span class="logo-text">Get Keys</span>
            </a>
        </div>
        <!-- Liens de navigation -->
        <div class="nav-links">
            <ul>
                <!-- Liens vers différentes sections -->
                <li><a href="#house">House</a></li>
                <li><a href="#apartment">Apartment</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#favorites">My favorites</a></li>
                <!-- Bouton "Add" redirigeant vers new.php -->
                <li>
                    <a href="/src/listings_ad/new.php" class="add-button">Add</a>
                </li>
                <!-- Bouton de connexion ou de déconnexion -->
                <li>
                    <a href="<?php echo $disconnectLink; ?>" class="disconnect-button">
                        <img src="../../assets/logo/Male User.png" alt="Logo" class="disconnect-logo" />
                        <?php echo $disconnectText; ?>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Fin de la barre de navigation -->

    <!-- Conteneur de recherche -->
    <div class="search-container">
        <!-- Titre de découverte -->
        <div class="title-discover">
            <h1>Discover a place you'll love to live</h1>
        </div>
        <!-- Champ de recherche -->
        <div id="search">
            <input type="search" placeholder="Search" />
            <button type="submit"></button>
        </div>
    </div>
</header>
<!-- Fin de l'en-tête -->
