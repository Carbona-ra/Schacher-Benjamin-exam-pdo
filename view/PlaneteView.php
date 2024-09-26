<?php
// --------------------------------
// Vue d'une seul planete
// --------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=htmlentities($planete->getNom())?></title>
</head>
<body>

    <!-- affichage des information d'une planete en particulier -->

    <p><a href="?page=planete">Revenir à la liste des planete</a></p>
    <h1><?=htmlentities($planete->getNom())?></h1>
    <p><b>Gravite</b> : <?=htmlentities($planete->getGravite())?></p>
    <p><b>Categorie</b> : <?=htmlentities($planete->getCategorie())?></p>
    <p><b>Diametre</b> : <?=htmlentities($planete->getDiametre())?> Km</p>
    <img src="<?=htmlentities($planete->getimgUrl())?>">
    <p><a target="blink" href="<?=htmlentities($planete->getlienNasa())?>">Lien vers le site de la Nasa</a></p>
    <br>
    <p><a  href="?page=planete&action=update&planete_id=<?=htmlentities($planete->getID())?>">Modifier la planete</a></p>
    <p><a href="?page=planete&action=delete&planete_id=<?=htmlentities($planete->getID())?>">Supprimer la planete</a></p>
</body>
</html>
