<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=creez-un-outil-de-gestion-de-contacts-en-ligne-de-commande;charset=utf8', 'root', '');
    
    echo "✅ Connexion réussie à la base de données !";

} catch (Exception $e) {
    die('❌ Erreur de connexion : ' . $e->getMessage());
}