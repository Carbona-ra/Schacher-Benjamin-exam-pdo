<?php

// --------------------------------
// Manager des planetes
// --------------------------------

require_once 'Planete.php';
require_once 'connectBD.php';

class PlaneteManager {


    // fonction pour récuperer toute les planetes
    public static function getAll() : array {
               
        return $GLOBALS['db']->query('SELECT * FROM planete')->fetchAll(PDO::FETCH_CLASS, 'Planete');
        
    }

    // fonction pour récuperer une planete en fonction de son id dans la bdd
    public static function getOne(int $planeteID) : Planete {

        $stmt = $GLOBALS['db']->prepare('SELECT * FROM planete WHERE id = ?');
        $stmt->execute([$planeteID]);
        $result = $stmt->fetchObject('Planete');

        if($result == false) {
            throw new Exception("Planete non trouver");
        }
                    
        return $result;

    }

    // fonction pour récuperer toute les planete tellurique de la bdd
    public static function getAllTellurique() : array {

        $stmt = $GLOBALS['db']->prepare('SELECT * FROM planete WHERE categorie = "tellurique"');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Planete');

        if($result == false) {
            throw new Exception("Rien ne correspond a votre recherche");
        }
                    
        return $result;

    }

    // fonction pour récuperer toute les planete gazeuse de la bdd
    public static function getAllGazeuse() : array {

        $stmt = $GLOBALS['db']->prepare('SELECT * FROM planete WHERE categorie = "gazeuse"');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, 'Planete');

        if($result == false) {
            throw new Exception("Rien ne correspond a votre recherche");
        }
                    
        return $result;

    }
    

    // fonction pour recherhcer dans la base de donnée une planète contenant la variable $nom
    public static function reserchName(string $nom) : array{

        global $db; 

        $stmt = $db->prepare('SELECT * FROM planete WHERE nom LIKE :nom');
        $stmt->execute([':nom' => '%'. $nom . '%']);

        $planete = $stmt->fetchAll(PDO::FETCH_CLASS, 'Planete');

        if ($planete == false) { 
            throw new Exception ('Planete non trouver');
        } 

        return $planete;

    }


    // Trois fonction pour crée, metre a jour et supprimer une planete de la base de donnée
    public static function create(Planete $planete) : void {
        $stmt = $GLOBALS['db']->prepare('INSERT INTO planete (nom, imgUrl, categorie, diametre, gravite, lienNasa) VALUES (?,?,?,?,?,?)');
        $stmt->execute([$planete->getNom(), $planete->getImgUrl(), $planete->getCategorie(), $planete->getDiametre(), $planete->getGravite(), $planete->getLienNasa()]);
    }

    public static function update(Planete $planete) : void {
        $stmt = $GLOBALS['db']->prepare('UPDATE planete SET nom = ?, imgUrl = ?, categorie=?, diametre=?, gravite=?, lienNasa=? WHERE id=?');
        $stmt->execute([$_POST['nom'], $_POST['imgUrl'], $_POST['categorie'], $_POST['diametre'], $_POST['gravite'], $_POST['lienNasa'] , $planete->getId()]);
    }

    public static function delete(Planete $planete) : void {
        $stmt = $GLOBALS['db']->prepare('DELETE FROM planete WHERE id=?');
        $stmt->execute([$planete->getId()]);
    }
}