<?php
require_once 'DBConnect.php';
require_once 'Contact.php';

class ContactManager {

  private $db;

  public function __construct(PDO $pdo)
  {
    $this->db = $pdo;
  }

  public function findAll() {
    $query = $this->db->query("SELECT * from contact");
    $datas = $query->fetchAll(PDO::FETCH_ASSOC);

    $contacts = [];

    foreach ($datas as $data) {
        $contact = new Contact();
        $contact->setId($data['id'])
                ->setName($data['name'])
                ->setEmail($data['email'])
                ->setPhoneNumber($data['phone_number']); 
        
        $contacts[] = $contact; 
    }

    return $contacts; 
  }

}