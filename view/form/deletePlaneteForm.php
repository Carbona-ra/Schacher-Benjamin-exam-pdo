<?php
//affichage d'un message de succés si la supprétion a aboutie
if(isset($success)) {
    echo "<p style='color:green'>$success</p>";
    echo "<p><a href=\"?page=planete\">Retour à la liste des planetes</a></p>";
} else {
    //affichage d'un message d'erreur si la supprétion n'a pas aboutie
    if(isset($error)) {
        echo "<p style='color:red'>".$error->getMessage()."</p>";
    }?>
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
                margin: 5px;
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
        <div class="form-container">
            <h1>Etes vous sur de vouloir supprimer <?= htmlentities($planete->getNom())?> ?</h1>
            <form method="post">

            <input type="submit" name="confirm" value="OUI">
            <input type="submit" name="confirm" value="NON">

            </form>
        <div>
    
   
    <?php
}


?>