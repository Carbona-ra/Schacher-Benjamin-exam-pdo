<?php
    //affichage d'un message de succés si la modification a aboutie  
    if(isset($success)) {
        echo "<p style='color:green'>$success</p>";
    } else {
        
        ?>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .form-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
            }
            .form-container h1 {
                text-align: center;
                margin-bottom: 20px;
            }
            .form-container label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            .form-container input[type="text"],
            .form-container input[type="number"] {
                width: calc(100% - 22px);
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .form-container input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
                color: #fff;
                font-size: 16px;
                cursor: pointer;
            }
            .form-container input[type="submit"]:hover {
                background-color: #0056b3;
            }                               
        </style>
        <div class="form-container" >
            <h1>Metre a jour une planete</h1>
            <form method="post">

            <label for="nom">Nom de la planete</label>
            <input type="text" id="nom" name="nom" value="<?= htmlentities($_POST['nom']?? $planete->getNom() ??'')?>">
            
            <label for="categorie">Nom de la catégorie</label>
            <input type="text" id="categorie" name="categorie" value="<?= htmlentities($_POST['categorie']?? $planete->getCategorie() ??'')?>">
            
            <label for="diametre">Diametre de la planete</label>
            <input type="text" id="diametre" name="diametre" value="<?= htmlentities($_POST['diametre']?? $planete->getDiametre() ??'')?>">

            <label for="gravite">Gravité de la planete</label>
            <input type="text" id="gravite" name="gravite" value="<?= htmlentities($_POST['gravite']?? $planete->getGravite() ??'')?>">
  
            <label for="lienNasa">Lien vers le site de la Nasa</label>
            <input type="text" id="lienNasa" name="lienNasa" value="<?= htmlentities($_POST['lienNasa']?? $planete->getLienNasa() ??'')?>">

            <label for="imgUrl">Photo de la planete (URL)</label>
            <input type="text" id="imgUrl" name="imgUrl" value="<?= htmlentities($_POST['imgUrl']?? $planete->getimgUrl() ??'')?>">

            <input type="submit" value="Ajouter">

            </form>
        <div>
        <?php
    }
    //affichage d'un message d'erreur si la monification n'a pas aboutie
    if (isset($error)) {
        echo "<p style='color:red'>".$error->getMessage()."</p>";
    }


?>

<p><a href="?page=planete&planete_id=<?=$planete->getId()?>">Revenir a la liste des planetes</a></p>