<?php
// --------------------------------
// Vue des planetes gazeuse
// --------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des planetes </title>
</head>
<body>
    <p><a href="?">Revenir à l'accueil</a></p>
    <h1>Liste des planetes gazeuse</h1>
    <ul>
        <!-- boucle pour crée une liste des objet récupérer dans la BDD -->
        <?php foreach( $planete as $planeteObject ) : ?>
            <li><h2><a href="?page=planete&planete_id=<?=$planeteObject->getId()?>"><?=$planeteObject->getNom()?></a></h2></li>
        <?php endforeach; ?>
    </ul>
    <p><a href="?page=planete&action=create">Ajouter une planete</a></p>
</body>
</html>
