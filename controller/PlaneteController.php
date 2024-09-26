<?php

// --------------------------------
// Contrôleur des monuments
// --------------------------------

require_once 'model/PlaneteManager.php';

if (!empty($_GET['action'])) {

    // Renvoi vers un des formulaire en fonction d 'action'
    if ($_GET['action'] == 'create') {

        if (!empty($_POST)) {
            if (!empty($_POST['nom']) && !empty($_POST['imgUrl']) && !empty($_POST['categorie']) && !empty($_POST['diametre']) && $_POST['diametre'] != ''  && !empty($_POST['gravite']) && $_POST['gravite'] != '' && !empty($_POST['lienNasa'])) {
                try {
                    $planete = new Planete;
                    $planete->hydrate($_POST['nom'], $_POST['imgUrl'], $_POST['categorie'], $_POST['diametre'], $_POST['gravite'], $_POST['lienNasa']);
                    PlaneteManager::create($planete);
                    $success = 'Les informations ont bien était reçut.';
                } catch (Exception $error) {}
            } else {
                $error = new Exception ('Champs non valide');
            }
        }
        require_once 'view/form/createPlaneteForm.php';

    } elseif ($_GET['action'] == 'update') {

        if (!empty($_GET['planete_id'])) {      
            $planete = PlaneteManager::getOne($_GET['planete_id']);
            if (!empty($_POST)){
                if (!empty($_POST['nom']) && !empty($_POST['imgUrl']) && !empty($_POST['categorie']) && !empty($_POST['diametre']) && $_POST['diametre'] != ''  && !empty($_POST['gravite']) && $_POST['gravite'] != '' && !empty($_POST['lienNasa'])) {
                    try {
                        PlaneteManager::update($planete);
                        $success = 'Planete mis à jour avec succès.';
                        require_once 'view/form/updatePlaneteForm.php';
                    } catch (Exception $error) {}
                } else {
                    require_once 'view/404View.php';
                }
            }
        require_once 'view/form/updatePlaneteForm.php';
        }

    } elseif ($_GET['action'] == 'delete') {
        
        if (!empty($_GET['planete_id'])) { 
            try {
                $planete = PlaneteManager::getOne($_GET['planete_id']);
                if (!empty($_POST['confirm'])){
                    if ($_POST['confirm'] == 'OUI'){
                        try {
                            PlaneteManager::delete($planete);
                            $success = $planete->getNom().' supprimer.';
                        } catch (Exception $error) {}
                    } else {
                        require_once 'view/PlaneteView.php';
                        header('Location: index.php?page=planete&planete_id='.$_GET['planete_id']);
                        exit;
                    }
                }                
            } catch (Exception $error) {}
            require_once 'view/form/deletePlaneteForm.php';
        } else {
            require_once 'view/404View.php';
        }
        //require_once 'view/form/deletePlaneteForm.php';
    } else {
        require_once 'view/404View.php';
    }

// affichage de la vue détailler d'une planete
} elseif ( !empty($_GET['planete_id'])){
    try {
        $planete = PlaneteManager::getOne( intval($_GET['planete_id']) );
        require_once 'view/PlaneteView.php';
    }catch(Exception $e) {
        require_once 'view/404View.php';
    }

// affichage du résultat d'une recherche
} elseif ( !empty($_GET['recherche'])){

    try {
        $planete = PlaneteManager::reserchName($_GET['recherche']);
        require_once 'view/form/ViewForm.php';
        require_once 'view/PlaneteListView.php';
    }  catch (Exception $e) {
        require_once 'view/404View.php';
    } 

// affichage d'une liste trier en fonction de la catégorie
} else if (!empty($_GET['trie'])) {

    if ($_GET['trie'] == 'gazeuse') {
        try {
            $planete = PlaneteManager::getAllGazeuse();
            require_once 'view/form/ViewForm.php';
            require_once 'view/PlaneteGazeuseListView.php';
        }catch(Exception $e) {
            require_once 'view/404View.php';
        }

    } elseif ($_GET['trie'] == 'tellurique') {
        try {
            $planete = PlaneteManager::getAllTellurique();
            require_once 'view/form/ViewForm.php';
            require_once 'view/PlaneteTelluriquesListView.php';
        }catch(Exception $e) {
            require_once 'view/404View.php';
        }
    }

// affichage de toute les planete
} else { 
    
    $planete = PlaneteManager::getAll();
    
    require_once 'view/form/ViewForm.php';
    require_once 'view/PlaneteListView.php';

}
