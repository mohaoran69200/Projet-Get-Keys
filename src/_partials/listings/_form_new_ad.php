<div class="form-section">
    <div class="form-container">
        <form method="post" enctype="multipart/form-data">
            <!-- Champ 'Localisation' -->
            <label for="localisation">Localisation</label>
            <input type="text" name="localisation" id="localisation" required>
            <?php if (!empty($errors['localisation'])) echo '<div class="error">' . $errors['localisation'] . '</div>'; ?>

            <!-- Champ 'Price' -->
            <label for="prix">Price</label>
            <input type="text" name="prix" id="prix" required>
            <?php if (!empty($errors['prix'])) echo '<div class="error">' . $errors['prix'] . '</div>'; ?>

            <!-- Champ 'Type' (sélection) -->
            <label for="type-transaction">Type</label>
            <select name="type" id="type-transaction" required>
                <option value="">Select type</option>
                <option value="sale">For sale</option>
                <option value="rent">For rent</option>
            </select>
            <?php if (!empty($errors['type'])) echo '<div class="error">' . $errors['type'] . '</div>'; ?>

            <!-- Champ 'Type-home' (sélection) -->
            <label for="type-home">Type of home</label>
            <select name="type-home" id="type-home" required>
                <option value="">Select type</option>
                <option value="House">House</option>
                <option value="Apartment">Apartment</option>
            </select>
            <?php if (!empty($errors['type-home'])) echo '<div class="error">' . $errors['type'] . '</div>'; ?>

            <!-- Champ 'Number of bedroom' -->
            <label for="bedroom">Number of bedroom</label>
            <input type="text" name="bedroom" id="bedroom" required>
            <?php if (!empty($errors['bedroom'])) echo '<div class="error">' . $errors['bedroom'] . '</div>'; ?>

            <!-- Champ 'Number of bathroom' -->
            <label for="bathroom">Number of bathroom</label>
            <input type="text" name="bathroom" id="bathroom" required>
            <?php if (!empty($errors['bathroom'])) echo '<div class="error">' . $errors['bathroom'] . '</div>'; ?>

            <!-- Champ 'Surface m2' -->
            <label for="surface">Surface m2</label>
            <input type="text" name="surface" id="surface" required>
            <?php if (!empty($errors['surface'])) echo '<div class="error">' . $errors['surface'] . '</div>'; ?>

            <!-- Champ 'Description' (textarea) -->
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" required></textarea>
            <?php if (!empty($errors['description'])) echo '<div class="error">' . $errors['description'] . '</div>'; ?>

            <!-- Section pour uploader des images -->
            <label for="images">Upload Images</label>
            <input type="file" name="images[]" accept="image/*" multiple>
            <small>Minimum 3 images</small>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn_form">Submit</button>
        </form>
    </div>
</div>