<?php
 namespace App\Entity;

 class Cours
 {

    private $id;
    private $nom;
    private $discipline;
    private $age;
    private $date;
    private $jour;
    private $heure;
    private $salle;
    private $professeur;
    private $prix;
    private $photo;


    public function getId():?int 
    {
      return $this->id;
    }

    public function setId(int $id):void
    {
      $this->id = $id;
    }

    public function getNom():string
    {
      return $this->nom;
    }

    public function setNom(string $nom):void
    {
      $this->nom = $nom;
    }

    public function getDiscipline():string
    {
      return $this->discipline;
    }

    public function setDiscipline(string $discipline):void
    {
      $this->discipline = $discipline;
    }

    public function getAge():int
    {
      return $this->age;
    }

    public function setAge(int $age):void
    {
      $this->age = $age;
    }

    public function getDate():string
    {
      return $this->date;
    }

    public function setDate(string $date):void
    {
      $this->date = $date;
    }

    public function getJour():string
    {
      return $this->jour;
    }

    public function setJour(string $jour):void
    {
      $this->jour = $jour;
    }

    public function getHeure():string
    {
      return $this->heure;
    }

    public function setHeure(string $heure):void
    {
      $this->heure = $heure;
    }

    public function getSalle():string
    {
      return $this->salle;
    }

    public function setSalle(string $salle):void
    {
      $this->salle = $salle;
    }

    public function getProfesseur():string
    {
      return $this->professeur;
    }

    public function setProfesseur(string $professeur):void
    {
      $this->professeur = $professeur;
    }
    
    public function getPrix():string
    {
      return $this->prix;
    }

    public function setPrix(string $prix):void
    {
      $this->prix = $prix;
    }

    public function getPhoto():string
    {
      return $this->photo;
    }

    public function setPhoto(string $photo):void
    {
      $this->photo = $photo;
    }

 }
 ?>
