<div class="house">
    <!-- Image et bouton de favoris -->
    <div class="house-img">
        <div class="img-favorite">
            <p><?php echo $annonce["ville"]; ?></p>
            <button class="favoris-button">
                <img src="../../assets/logo/Favorite.png" alt="favorite">
            </button>
        </div>
        <!-- Carousel d'images -->
        <div id="<?php echo $annonce["idC"] ?>" class="carousel slide">
            <div class="carousel-indicators">
                <!-- Indicateurs du carousel -->
                <button type="button" data-bs-target="#<?php echo $annonce["idC"] ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#<?php echo $annonce["idC"] ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#<?php echo $annonce["idC"] ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <!-- Images du carousel -->
                <div class="carousel-item active">
                    <img src="<?php echo $annonce["imgs"][0] ?>" class="d-block w-100" alt="Houston1">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $annonce["imgs"][1] ?>" class="d-block w-100" alt="House2">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $annonce["imgs"][2] ?>" class="d-block w-100" alt="Houston3">
                </div>
            </div>
            <!-- Contrôles du carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $annonce["idC"] ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $annonce["idC"] ?>" data-bs-slide="next">
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
            <h2><?php echo $annonce["prix"]; ?></h2>
            <p><?php echo $annonce["type"]; ?></p>
        </div>
        <!-- Détails de la maison (nombre de chambres, de salles de bains et surface) -->
        <div class="detail">
            <span class="bd">
                <img src="../../../assets/logo/Empty Bed.png" alt="bed">
                <?php echo $annonce["bd"]; ?>
            </span>
            <span class="ba">
                <img src="../../../assets/logo/Bathtub.png" alt="Bathtub">
                <?php echo $annonce["ba"]; ?>
            </span>
            <span class="sft">
                <img src="../../../assets/logo/Surface.png" alt="Surface">
                <?php echo $annonce["sft"]; ?>
            </span>
        </div>
        <!-- Adresse et description de la maison -->
        <div class="adress">
            <p>
                <?php echo $annonce["des"]; ?>
            </p>
        </div>
    </div>
</div>