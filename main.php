<?php

require_once 'DBConnect.php';
require_once 'Contact.php';
require_once 'ContactManager.php';
require_once 'Command.php';

$command = new Command();

while (true) {
    $line = readline("Entrez votre commande (help, list, detail, create, update, delete, quit) : ");
    
    if ($line == 'help') {
        $command->help();
    } elseif ($line == 'list') {
        $command->list();  
    } elseif (preg_match('/^detail (\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $command->detail($id);
    } elseif (preg_match('/^create\s+([^,]+),\s*([^,]+),\s*(.+)$/i', $line, $matches)) {
        $name = trim($matches[1]);
        $email = trim($matches[2]);
        $phoneNumber = trim($matches[3]);

        $command->create($name, $email, $phoneNumber);
    } elseif (preg_match('/^modify\s+(\d+),\s*([^,]+),\s*([^,]+),\s*(.+)$/i', $line, $matches)) {
        $id    = (int)$matches[1];
        $name  = trim($matches[2]);
        $email = trim($matches[3]);
        $phone = trim($matches[4]);
        
        $command->update($id, $name, $email, $phone);

    } elseif (preg_match('/^delete (\d+)$/', $line, $matches)) {
        $id = (int)$matches[1];
        $command->delete($id);
    } elseif ($line == 'quit') {
        echo "Au revoir !" . PHP_EOL;
        break; 
    } else {
        echo "Vous avez saisi : $line\n";
    }
}