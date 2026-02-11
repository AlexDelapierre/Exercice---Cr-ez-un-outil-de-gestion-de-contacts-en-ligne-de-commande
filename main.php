<?php

require_once 'DBConnect.php';
require_once 'ContactManager.php';



while (true) {
    $line = readline("Entrez votre commande : ");
    
    if ($line == 'list') {
        $db = new DBConnect;
        $pdo = $db->getPDO();
        $contactManager = new ContactManager($pdo);
        $contacts = $contactManager->findAll(); 

        echo "Liste des contacts :\n";
        foreach ($contacts as $contact) {
            echo $contact->__toString() . PHP_EOL;
        }
    } else {
        echo "Vous avez saisi : $line\n";
    }
}