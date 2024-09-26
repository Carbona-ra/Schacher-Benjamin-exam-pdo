<?php 

// --------------------------------
// Routeur
// --------------------------------


if( !empty($_GET['page']) ) {

    if($_GET['page'] == 'planete'){
        require_once('controller/PlaneteController.php');
    } else{ 
        require_once('view/404View.php');
    }

} elseif (!empty($_GET['recherche'])){
    require_once('controller/PlaneteController.php');

} else {
    require_once('view/homeView.php');
}

