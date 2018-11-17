<?php
 namespace App\Entity;

 class Abonnement
 {

    private $id;
    private $pseudoAdherent;
    private $idCours;


    public function getId():?int 
    {
      return $this->id;
    }

    public function setId(int $id):void
    {
      $this->id = $id;
    }

    public function getPseudoAdherent():string
    {
      return $this->pseudoAdherent;
    }

    public function setPseudoAdherent(string $pseudoAdherent):void
    {
      $this->pseudoAdherent = $pseudoAdherent;
    }

    public function getIdCours():int
    {
      return $this->idCours;
    }

    public function setIdCours(int $idCours):void
    {
      $this->idCours = $idCours;
    }
 }
 ?>
