<div class="house">
    <!-- Image et bouton de favoris -->
    <div class="house-img">
        <div class="img-favorite">
            <p><?php echo $property["ville"]; ?></p>
            <button class="favoris-button">
                <img src="../../../assets/logo/Favorite.png" alt="favorite">
            </button>
        </div>
        <!-- Carousel d'images -->
        <div id="<?php echo $property["idC"] ?>" class="carousel slide">
            <div class="carousel-indicators">
                <!-- Indicateurs du carousel -->
                <button type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <?php
if (isset($property["imgs"]) && is_array($property["imgs"]) && count($property["imgs"]) > 0) {
    $image = $property["imgs"][0];
} else {
    $image = ''; // Ou une autre valeur par défaut
}
?>
                <!-- Images du carousel -->
                <div class="carousel-item active">

                    <img src="<?php echo $property["imgs"][0] ?>" class="d-block w-100" alt="Houston1">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $property["imgs"][1] ?>" class="d-block w-100" alt="House2">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $property["imgs"][2] ?>" class="d-block w-100" alt="Houston3">
                </div>
            </div>
            <!-- Contrôles du carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide="next">
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
            <h2><?php echo $property["prix"]; ?></h2>
            <p><?php echo $property["type"]; ?></p>
        </div>
        <!-- Détails de la maison (nombre de chambres, de salles de bains et surface) -->
        <div class="detail">
            <span class="bd">
                <img src="../../../assets/logo/Empty Bed.png" alt="bed">
                <?php echo $property["bd"]; ?>
            </span>
            <span class="ba">
                <img src="../../../assets/logo/Bathtub.png" alt="Bathtub">
                <?php echo $property["ba"]; ?>
            </span>
            <span class="sft">
                <img src="../../../assets/logo/Surface.png" alt="Surface">
                <?php echo $property["sft"]; ?>
            </span>
        </div>
        <!-- Adresse et description de la maison -->
        <div class="adress">
            <p>
                <?php echo $property["des"]; ?>
            </p>
        </div>
    </div>
</div>