 <div class="house">
            <div class="house-img">
                <div class="img-favorite">
                    <p><?php echo $property["ville"]; ?></p>
                    <button class="favoris-button">
                        <img src="./logo/Favorite.png" alt="favorite">
                    </button>
                </div>
                <div id="<?php echo $property["idC"] ?>" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#<?php echo $property["idC"] ?>" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $property["img1"] ?>" class="d-block w-100" alt="Houston1">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $property["img2"] ?>" class="d-block w-100" alt="House2">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $property["img3"] ?>" class="d-block w-100" alt="Houston3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $property["idC"] ?>"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $property["idC"] ?>"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="img-button">
                    <button class="contact-button">Contact</button>
                    <button class="more-button">More</button>
                </div>
            </div>
            <div class="house-text">
                <div class="price">
                    <h2><?php echo $property["prix"];?></h2>
                    <p><?php echo $property["type"];?></p>
                </div>
                <div class="detail">
                    <span class="bd">
                        <img src="./logo/Empty Bed.png" alt="bed">
                        <?php echo $property["bd"];?>
                    </span>
                    <span class="ba">
                        <img src="./logo/Bathtub.png" alt="Bathtub">
                        <?php echo $property["ba"];?>
                    </span>
                    <span class="sft">
                        <img src="./logo/Surface.png" alt="Surface">
                        <?php echo $property["sft"];?>
                    </span>
                </div>
                <div class="adress">
                    <p>
                    <?php echo $property["des"];?>
                    </p>
                </div>
            </div>
        </div>



