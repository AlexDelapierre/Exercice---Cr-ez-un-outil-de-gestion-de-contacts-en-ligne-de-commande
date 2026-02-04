<?php

while (true) {
    $line = readline("Entrez votre commande : ");
    
    if ($line == 'list') {
        echo 'affichage de la liste';
    } else {
        echo "Vous avez saisi : $line\n";
    }
    
}