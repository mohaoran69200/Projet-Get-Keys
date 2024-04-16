<form action="annonces" method="post">

<label for="name">Localisation</label>
<input type="text" name="localisation" id="localisation" required>

<label for="name">Price</label>
<input type="text" name="prix" id="prix" required>

<label for="name">Type</label>
<select name="type" id="type-transaction">
    <option value="sale">For sale</option>
    <option value="rent">For rent</option>
</select>

<label for="name">Number of bedroom</label>
<input type="text" name="bedroom" id="bedroom" required>

<label for="name">Number of bathroom</label>
<input type="text" name="bathroom" id="bathroom" required>

<label for="name">Surface m2</label>
<input type="text" name="surface" id="surface" required>

<label for="name">Description</label>
<textarea name="description" id="description" cols="30" rows="10" required></textarea>

<button type="submit">Submit</button>
</form>