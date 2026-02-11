<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';
require_once 'Command.php';

while (true) {
    $line = readline("Entrez votre commande : ");
    
    if ($line == 'list') {
        $command = new Command;
        $command->list();  
    } else {
        echo "Vous avez saisi : $line\n";
    }
}