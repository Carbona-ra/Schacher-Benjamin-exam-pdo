

<!-- formulaire de recherche sur les list de planete -->

<form method="get">

    <label for="recherche">Nom de la planete</label>
    <input type="text" id="recherche" name="recherche" value="<?= htmlentities($_GET['recherche']??'')?>">

    <input type="submit" value="recherche">

</form>