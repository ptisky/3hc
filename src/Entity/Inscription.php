<?php
 namespace App\Entity;

 class Inscription
 {
   //Les colonnes de la table deviennent des propriétéshorray
   //Créer des getter et setters

   private $id;
   private $pseudo;
   private $mdp;

   /**** GETTER ****/
   public function getId():?int{
     return $this->id;
   }

   public function getPseudo():string{
     return $this->pseudo;
   }

   public function getMdp():string{
     return $this->mdp;
   }

   /**** SETTER ****/
   public function setId(int $value):void
   {
     $this->id = $value;
   }

   public function setPseudo(string $value):void
   {
     $this->pseudo = $value;
   }

   public function setMdp(string $value):void
   {
     $this->mdp = $value;
   }

 }
 ?>
