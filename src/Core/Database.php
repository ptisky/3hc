<?php

namespace App\Core;

class Database
{
  /*
   * Description de la connexion
   * Nom User, mdp
   */

   private $host = 'localhost';
   private $login = 'root';
   private $pwd = '';
   private $dbName = 'formation';
   private $option = [
     \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
   ];
   private $connection;

   public function __construct()
   {
     $this->connection = new \PDO("mysql:host={$this->host};dbname={$this->dbName};charset=utf8",$this->login,$this->pwd,$this->option);

   }

   public function connect():\PDO
   {
     return $this->connection;
   }

}


?>
