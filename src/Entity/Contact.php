<?php
 namespace App\Entity;

 class Contact
 {

    private $Pseudo;
    private $password;
    private $Nom;
    private $Prenom;
    private $Date_Naissance;
    private $Code_Postale;
    private $Ville;
    private $Adresse;
    private $Telephone;
    private $Email;
    private $Date_Inscription;
    private $Photo;


    public function getPseudo():?string 
    {
      return $this->Pseudo;
    }

    public function setPseudo(string $Pseudo):void
    {
      $this->Pseudo = $Pseudo;
    }

    public function getPassword():string
    {
      return $this->password;
    }

    public function setPassword(string $password):void
    {
      $this->password = $password;
    }

    public function getNom():string
    {
      return $this->Nom;
    }

    public function setNom(string $Nom):void
    {
      $this->Nom = $Nom;
    }

    public function getPrenom():string
    {
      return $this->Prenom;
    }

    public function setPrenom(string $Prenom):void
    {
      $this->Prenom = $Prenom;
    }

    public function getDate_Naissance():string
    {
      return $this->Date_Naissance;
    }

    public function setDate_Naissance(string $Date_Naissance):void
    {
      $this->Date_Naissance = $Date_Naissance;
    }

    public function getCode_Postale():int
    {
      return $this->Code_Postale;
    }

    public function setCode_Postale(int $Code_Postale):void
    {
      $this->Code_Postale = $Code_Postale;
    }

    public function getVille():string
    {
      return $this->Ville;
    }

    public function setVille(string $Ville):void
    {
      $this->Ville = $Ville;
    }

    public function getAdresse():string
    {
      return $this->Adresse;
    }

    public function setAdresse(string $Adresse):void
    {
      $this->Adresse = $Adresse;
    }

    public function getTelephone():string
    {
      return $this->Telephone;
    }

    public function setTelephone(string $Telephone):void
    {
      $this->Telephone = $Telephone;
    }

    public function getEmail():string
    {
      return $this->Email;
    }

    public function setEmail(string $Email):void
    {
      $this->Email = $Email;
    }

    public function getDate_Inscription():string
    {
      return $this->Date_Inscription;
    }

    public function setDate_Inscription():void
    {
      $this->Date_Inscription = date('y-m-d');
    }

    public function getPhoto():string
    {
      return $this->Photo;
    }

    public function setPhoto(string $Photo):void
    {
      $this->Photo = $Photo;
    }
 }
 ?>
