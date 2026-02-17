<?php

require_once 'DBConnect.php';
require_once 'ContactManager.php';

Class Command {

  private function getManager() {
      $db = new DBConnect();
      $pdo = $db->getPDO();
      return new ContactManager($pdo);
  }

  public function help(): void {
      echo "help : affiche cette aide" . PHP_EOL;
      echo "list : liste les contacts" . PHP_EOL;
      echo "detail [id] : affiche un contact" . PHP_EOL;
      echo "create [name], [email], [phone number] : crée un contact" . PHP_EOL;
      echo "modify [id], [name], [email], [phone number] : crée un contact" . PHP_EOL;
      echo "delete [id] : supprime un contact" . PHP_EOL;
      echo "quit : quitte le programme" . PHP_EOL;
  }

  public function list() {
    try {
        $contactManager = $this->getManager();
        $contacts = $contactManager->findAll();

        if (empty($contacts)) {
            echo "Aucun contact enregistré pour le moment.\n";
            return;
        }

        echo "Liste des contacts :\n";
        foreach ($contacts as $contact) {
            echo $contact->__toString() . PHP_EOL;
        }
    } catch (Exception $e) {
        echo "Erreur lors de la récupération de la liste : " . $e->getMessage() . PHP_EOL;
    }
  }

  public function detail(int $id) {
    try {
        $contactManager = $this->getManager();
        $contact = $contactManager->findById($id);

        if ($contact) {
            echo $contact->__toString() . PHP_EOL;
        } else {
            echo "Erreur : Aucun contact trouvé avec l'ID $id." . PHP_EOL;
        }
    } catch (Exception $e) {
        echo "Erreur lors de la recherche du contact : " . $e->getMessage() . PHP_EOL;
    }
  }

  public function create(string $name, string $email, string $phoneNumber) {
    try {
        $contactManager = $this->getManager();
        $result = $contactManager->new($name, $email, $phoneNumber);
        
        if ($result) {
            echo "Succès : Le contact '$name' a été créé.\n";
        } else {
            echo "Erreur : Impossible de créer le contact.\n";
        }
    } catch (Exception $e) {
        echo "Erreur système lors de la création : " . $e->getMessage() . PHP_EOL;
    }
  }

  public function update(int $id, string $name, string $email, string $phoneNumber) {
    try {
        $contactManager = $this->getManager();
        $result = $contactManager->update($id, $name, $email, $phoneNumber);
        
        if ($result) {
            echo "Succès : Le contact ID $id a été mis à jour.\n";
        } else {
            echo "Erreur : Le contact ID $id n'existe pas ou aucune modification n'a été faite.\n";
        }
    } catch (Exception $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage() . PHP_EOL;
    }
  }

  public function delete(int $id) {
    try {
        $contactManager = $this->getManager();
        $result = $contactManager->delete($id);
        
        if ($result) {
            echo "Succès : Le contact ID $id a été supprimé.\n";
        } else {
            echo "Erreur : Impossible de supprimer. L'ID $id est peut-être inexistant.\n";
        }
    } catch (Exception $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage() . PHP_EOL;
    }
  }

}