<?php

class DBConnect
{
    private $pdo;
    private $host = 'localhost';
    private $dbname = 'creez-un-outil-de-gestion-de-contacts-en-ligne-de-commande';
    private $user = 'root';
    private $password = '';

    public function __construct()
    {
        try {
            // Construction du DSN (Data Source Name)
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            
            // Options pour activer les erreurs PDO et le mode de récupération par défaut
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];

            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
            
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données.");
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}