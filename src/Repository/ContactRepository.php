<?php

namespace App\Repository;

use App\Core\Database;
use App\Entity\Contact;

class ContactRepository
{
	private $connection;
	
	public function __construct(Database $database)
	{
		$this->connection = $database->connect();
	}

	public function getAll():array
	{
		$sql ="Select pseudo,password,Nom,Prenom,Date_Naissance,Code_Postale,Ville,Adresse,Telephone,Email,Date_Inscription,Photo From formation.adherent";

		$req = $this->connection->prepare($sql);
		$req->execute();
		$result = $req->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Contact');
		return $result; 
	}
	
	public function getAllById(string $pseudo):Contact
	{

		$sql ="Select Pseudo,password,Nom,Prenom,Date_Naissance,Code_Postale,Ville,Adresse,Telephone,Email,Date_Inscription,Photo From formation.adherent WHERE Pseudo=:pseudo";

		$req = $this->connection->prepare($sql);
		$req->execute(['pseudo'=>$pseudo]);
		return $req->fetchObject('App\Entity\Contact');

	}
	
	public function insert(Contact $entity):void
	{

		$sql ="INSERT INTO adherent (Pseudo,password,Nom,Prenom,Date_Naissance,Code_Postale,Ville,Adresse,Telephone,Email,Date_Inscription) VALUES ( :Pseudo, :password, :Nom, :Prenom, :Date_Naissance, :Code_Postale, :Ville, :Adresse, :Telephone, :Email, :Date_Inscription);";

		$req = $this->connection->prepare($sql);
		$req->execute([
			'Pseudo' 				=> $entity ->getPseudo(),
			'password' 				=> $entity ->getPassword(),
			'Nom' 					=> $entity ->getNom(),
			'Prenom' 				=> $entity ->getPrenom(),
			'Date_Naissance' 		=> $entity ->getDate_Naissance(),
			'Code_Postale' 			=> $entity ->getCode_Postale(),
			'Ville' 				=> $entity ->getVille(),
			'Adresse' 				=> $entity ->getAdresse(),
			'Telephone' 			=> $entity ->getTelephone(),
			'Email' 				=> $entity ->getEmail(),
			'Date_Inscription' 		=> $entity ->getDate_Inscription()
		]);
	}

	public function modify(Contact $entity):void
	{
		var_dump("BAM");
		$sql ="UPDATE `adherent` SET 
				`password` 			= :password,
				`Nom` 				= :Nom,
				`Prenom` 			= :Prenom,
				`Date_Naissance` 	= :Date_Naissance,
				`Code_Postale` 		= :Code_Postale,
				`Ville` 			= :Ville,
				`Adresse` 			= :Adresse,
				`Telephone` 		= :Telephone,
				`Email` 			= :Email
				WHERE `adherent`.`Pseudo` = :Pseudo;";

		$req = $this->connection->prepare($sql);
		$req->execute([
				'Pseudo' 				=> $entity ->getPseudo(),
				'password' 				=> $_POST["password"],
				'Nom' 					=> $_POST["Nom"],
				'Prenom' 				=> $_POST["Prenom"],
				'Date_Naissance' 		=> $_POST["Date_Naissance"],
				'Code_Postale' 			=> $_POST["Code_Postale"],
				'Ville' 				=> $_POST["Ville"],
				'Adresse' 				=> $_POST["Adresse"],
				'Telephone' 			=> $_POST["Telephone"],
				'Email' 				=> $_POST["Email"]
		]);

	}

	public function deleteOne(string $pseudo):void
	{
		$sql ="DELETE FROM `adherent` WHERE Pseudo= :pseudo";

		$req = $this->connection->prepare($sql);
		$result = $req->execute(['pseudo' => $pseudo]);
	}

	public function modifyPhoto(String $photo):void
	{
		$sql ="UPDATE `adherent` SET `Photo` = :Photo WHERE `adherent`.`Pseudo` = :Pseudo;";
		$req = $this->connection->prepare($sql);
		$req->execute(['Pseudo'=> $_SESSION["Pseudo"],'Photo'=> $photo]);
	}
}




?>