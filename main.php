<?php

require_once 'DBConnect.php';
require_once 'ContactManager.php';

$db = new DBConnect;
$pdo = $db->getPDO();
$contactManager = new ContactManager($pdo);
$contacts = $contactManager->findAll();

echo "Liste des contacts :\n";
foreach ($contacts as $contact) {
    echo $contact . PHP_EOL; 
}

// while (true) {
//     $line = readline("Entrez votre commande : ");
    
//     if ($line == 'list') {
//         echo 'affichage de la liste';
//     } else {
//         echo "Vous avez saisi : $line\n";
//     }
// }