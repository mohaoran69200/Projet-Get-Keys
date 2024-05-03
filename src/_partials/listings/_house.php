<?php
// if ($userLoggedIn) {
//     echo '<form action="/src/pages/favorites.php" method="post">';
//     echo '<input type="hidden" name="action" value="add">';
//     echo '<input type="hidden" name="annonce_id" value="'. $property["id"]. '">';
//     echo '<button type="submit" class="favoris-button">';
//     echo '<img src="../../../assets/logo/Favorite.png" alt="favorite">';
//     echo '</button>';
//     echo '</form>';
// }
?>




<div class="house">
    <!-- Image et bouton de favoris -->
    <div class="house-img">
        <div class="img-favorite">
            <p><?php echo $property["city"]; ?></p>
            <?php if ($userLoggedIn) : ?>
                <form action="src/pages/favorites.php" method="post">
                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="annonce_id" value="<?php echo $property["id"]; ?>">
                    <button type="submit" class="favoris-button">
                        <img src="../../../assets/logo/Favorite.png" alt="favorite">
                    </button>
                </form>
            <?php endif; ?>
        </div>
        <!-- Carousel d'images -->
        <div id="<?php echo $property["idCaroussel"] ?>" class="carousel slide">
            <div class="carousel-indicators">
                <!-- Indicateurs du carousel -->
                <?php foreach ($images as $index => $image) : ?>
                    <button type="button" data-bs-target="#<?php echo $property["idCaroussel"] ?>" data-bs-slide-to="<?php echo $index; ?>" <?php echo ($index === 0) ? 'class="active" aria-current="true"' : ''; ?> aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <!-- Images du carousel -->
                <?php foreach ($images as $index => $image) : ?>
                    <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                        <img src="../../../assets/images/<?php echo $image['name']; ?>" class="d-block w-100" alt="Image <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>

            </div>
            <!-- Contrôles du carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $property["idCaroussel"] ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $property["idCaroussel"] ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Boutons de contact et plus -->
        <div class="img-button">
            <button class="contact-button">Contact</button>
            <button class="more-button">More</button>
        </div>
    </div>
    <!-- Informations textuelles de la maison -->
    <div class="house-text">
        <!-- Prix et type de la maison -->
        <div class="price">
            <h2><?php echo $property["price"]; ?></h2>
            <p><?php echo $property["type of home"]; ?></p>
        </div>
        <!-- Détails de la maison (nombre de chambres, de salles de bains et surface) -->
        <div class="detail">
            <span class="bd">
                <img src="../../../assets/logo/Empty Bed.png" alt="bed">
                <?php echo $property["bedroom"]; ?>
            </span>
            <span class="ba">
                <img src="../../../assets/logo/Bathtub.png" alt="Bathtub">
                <?php echo $property["bathroom"]; ?>
            </span>
            <span class="sft">
                <img src="../../../assets/logo/Surface.png" alt="Surface">
                <?php echo $property["surface"]; ?>
            </span>
        </div>
        <!-- Adresse et description de la maison -->
        <div class="adress">
            <p>
                <?php echo $property["description"]; ?>
            </p>
        </div>
    </div>
</div>