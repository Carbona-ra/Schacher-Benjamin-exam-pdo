<?php

// connection a la BDD
try {
    $db = new PDO('mysql:host=localhost;chartset=utf8;dbname=exam_pdo', 'php', 'PHPcestSuper!');
} catch (PDOException  $e) {
    die("Erreur : ".$e->getMessage());
}