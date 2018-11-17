<?php

namespace App\Form;

use App\Entity\Contact;

class ConnexionForm
{

	private $fields = [
			'Pseudo' => [
				'value' => null,
				'error' => "Le pseudo est invalide"
			],
			'password' => [
				'value' => null,
				'error' => "Le password est invalide"
			]
	];
	
	private $message = [];
	private $entity;
	
	

	public function __construct(Contact $entity)
	{
		//remplir le champs de saisie après envoie du formulaire
		
		$this->entity = $entity;
		$this->fill();
		
	}

	public function fill():void
	{
		if(!empty($_POST['Pseudo'])){
			$this->fields['Pseudo']['value'] = $_POST['Pseudo'];
			$this->entity->setPseudo($_POST['Pseudo']);
		}
		
		if(!empty($_POST['password'])){
			$this->fields['password']['value'] = $_POST['password'];
			$this->entity->setPassword($_POST['password']);
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
