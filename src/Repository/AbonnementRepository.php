<?php

namespace App\Repository;

use App\Core\Database;
use App\Entity\Abonnement;
use App\Entity\Cours;

class AbonnementRepository
{
	private $connection;
	
	public function __construct(Database $database)
	{
		$this->connection = $database->connect();
	}

	public function getAllCours():array
	{
		$sql ="Select * From formation.cours";

		$req = $this->connection->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Cours');
		return $result; 
	}

	public function addCour($idCours):void
	{
		$sql = "INSERT INTO formation.abonnement (pseudoAdherent, idCours) VALUES (:pseudoAdherent, :idCours);";
		$req = $this->connection->prepare($sql);
		$req->execute(['pseudoAdherent'=> $_SESSION["Pseudo"],'idCours' => $idCours]);
	}

	public function getAbonnement():array
	{
		$sql = "SELECT * FROM abonnement AS ABO, cours AS COURS WHERE ABO.idCours = COURS.Id AND pseudoAdherent= :pseudoAdherent";
		$req = $this->connection->prepare($sql);
		$req->execute(['pseudoAdherent'=> $_SESSION["Pseudo"]]);
		$result = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Abonnement');
		return $result; 
	}

	public function deleteAbonnement($id):void
	{
		$sql = "DELETE FROM abonnement WHERE id = :id";
		$req = $this->connection->prepare($sql);
		$req->execute(['id'=> $id]);
	}

}




?>