<?php

namespace App\Form;

use App\Entity\Contact;

class ContactForm
{

	private $fields = [
			'Pseudo' => [
				'value' => null,
				'error' => "Le Pseudo est invalide"
			],
			'password' => [
				'value' => null,
				'error' => "Le password est invalide"
			],
			'Nom' => [
				'value' => null,
				'error' => "Le Nom est invalide"
			],
			'Prenom' => [
				'value' => null,
				'error' => "Le Prenom est invalide"
			],
			'Date_Naissance' => [
				'value' => null,
				'error' => "La Date_Naissance est invalide"
			],
			'Code_Postale' => [
				'value' => null,
				'error' => "Le Code_Postale est invalide"
			],
			'Ville' => [
				'value' => null,
				'error' => "La Ville est invalide"
			],
			'Adresse' => [
				'value' => null,
				'error' => "Le Adresse est invalide"
			],
			'Telephone' => [
				'value' => null,
				'error' => "Le Telephone est invalide"
			],
			'Email' => [
				'value' => null,
				'error' => "Le Email est invalide"
			]
	];
	
	private $message = [];
	private $entity;
	
	

	public function __construct(Contact $entity)
	{
		//remplir le champs de saisie après envoie du formulaire
		
		$this->entity = $entity;
		
		if(!empty($entity->getPseudo()) && (!isset($_POST['submit'])))
		{
			$this->fillFromEntity();
		}else{
			$this->fill();
		}
	}
	
	private function fillFromEntity():void
	{
		$this->fields['Pseudo']['value'] 			= $this->entity->getPseudo();
		$this->fields['password']['value'] 			= $this->entity->getPassword();
		$this->fields['Nom']['value'] 				= $this->entity->getNom();
		$this->fields['Prenom']['value'] 			= $this->entity->getPrenom();
		$this->fields['Date_Naissance']['value'] 	= $this->entity->getDate_Naissance();
		$this->fields['Code_Postale']['value'] 		= $this->entity->getCode_Postale();
		$this->fields['Ville']['value'] 			= $this->entity->getVille();
		$this->fields['Adresse']['value'] 			= $this->entity->getAdresse();
		$this->fields['Telephone']['value'] 		= $this->entity->getTelephone();
		$this->fields['Email']['value'] 			= $this->entity->getEmail();
		$this->fields['Date_Inscription']['value'] 	= $this->entity->getDate_Inscription();
		$this->fields['Photo']['value'] 			= $this->entity->getPhoto();
	}

	public function fill():void
	{
		if(!empty($_POST['Pseudo'])){
			$this->fields['Pseudo']['value'] = $_POST['Pseudo'];
			$this->entity->setPseudo($_POST['Pseudo']);
		}
		
		if(!empty($_POST['password'])){
			$this->fields['password']['value'] = $_POST['password'];
			$this->entity->setpassword($_POST['password']);
		}
		
		if(!empty($_POST['Nom'])){
			$this->fields['Nom']['value'] = $_POST['Nom'];
			$this->entity->setNom($_POST['Nom']);
		}

		if(!empty($_POST['Prenom'])){
			$this->fields['Prenom']['value'] = $_POST['Prenom'];
			$this->entity->setPrenom($_POST['Prenom']);
		}

		if(!empty($_POST['Date_Naissance'])){
			$this->fields['Date_Naissance']['value'] = $_POST['Date_Naissance'];
			$this->entity->setDate_Naissance($_POST['Date_Naissance']);
		}

		if(!empty($_POST['Code_Postale'])){
			$this->fields['Code_Postale']['value'] = $_POST['Code_Postale'];
			$this->entity->setCode_Postale($_POST['Code_Postale']);
		}

		if(!empty($_POST['Ville'])){
			$this->fields['Ville']['value'] = $_POST['Ville'];
			$this->entity->setVille($_POST['Ville']);
		}

		if(!empty($_POST['Adresse'])){
			$this->fields['Adresse']['value'] = $_POST['Adresse'];
			$this->entity->setAdresse($_POST['Adresse']);
		}

		if(!empty($_POST['Telephone'])){
			$this->fields['Telephone']['value'] = $_POST['Telephone'];
			$this->entity->setTelephone($_POST['Telephone']);
		}

		if(!empty($_POST['Email'])){
			$this->fields['Email']['value'] = $_POST['Email'];
			$this->entity->setEmail($_POST['Email']);
			$this->entity->setDate_Inscription();
		}

	}

	public function getFields():array
	{
		return $this->fields;
	}
	
	public function isValid()
	{
		if(isset($_POST['submit'])){
			//exit('JE FONCTIONNE');
			
			$constraints = [
				'Pseudo' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'password' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Nom' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Prenom' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Date_Naissance' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Code_Postale' => [
					'filter'    => FILTER_VALIDATE_INT,
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Ville' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Adresse' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Telephone' => [
					'flags'  => FILTER_SANITIZE_STRING
				],
				'Email' => [
					'filter' => FILTER_VALIDATE_EMAIL,
					'flags'  => FILTER_SANITIZE_EMAIL
				]
			];
			
			$myinputs = filter_input_array(INPUT_POST, $constraints);
			
			$isValid = true;
			
			foreach($myinputs as $fieldName => $fieldIsValid){
				if(!$fieldIsValid){
					array_push($this->message, $this->fields[$fieldName]['error']);
					$isValid = false;
				}
			}
			return $isValid;
		}
	}
	
	public function getMessage():array
	{
		return $this->message;
	}
	
	public function getEntity():Contact
	{
		return $this->entity;
	}
}

?>
