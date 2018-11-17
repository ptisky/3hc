<?php

namespace App\Controller;

use App\Form\ContactForm;
use App\Form\ConnexionForm;
use App\Entity\Contact;
use App\Entity\Abonnement;
use App\Entity\Cours;
use App\Repository\ContactRepository;
use App\Repository\AbonnementRepository;
use App\Service\SessionService;

class ContactController extends Controller
{
	private $contactRepository;
	private $sessionService;
	
	public function __construct(AbonnementRepository $abonnementRepository, ContactRepository $contactRepository, SessionService $sessionService)
	{
		$this->abonnementRepository = $abonnementRepository;
		$this->contactRepository = $contactRepository;
		$this->sessionService = $sessionService;
	}
	
	public function index(array $routeVars):void
	{
		$data = $this->contactRepository->getAll();
		$this->render('contact/index.php', ['result'=>$data,'notice'=>$notice]);
	}

	public function disconect(array $routeVars):void
	{
		$_SESSION['Pseudo'] = null;
		$this->sessionService->set("notice",'Vous avez bien été déconnecté.');
		header("Location: /");
	}

	public function connexion(array $routeVars):void
	{
		$notice = isset($_SESSION['notice']) ? $this->sessionService->get('notice') : null;
		$this->sessionService->Delete('notice');
		$entity = isset($_POST['Pseudo'])? $this->contactRepository->getAllById($_POST['Pseudo']) : new Contact();
		$form = new ConnexionForm($entity);
		
		if($form->isValid()){
			$entity = $form->getEntity();
			$getEntry = $this->contactRepository->getAllById($_POST['Pseudo']);
			if($entity->getPassword() == $getEntry->getPassword()){
				$_SESSION['Pseudo'] = $_POST['Pseudo'];
				$this->sessionService->set("notice",'Vous avez bien été connecté <a href="/contact/form/'.$_SESSION['Pseudo'].'">Mon Compte</a>');
				header("Location: /");	
			}else{
				$this->sessionService->set("notice",'Il y a eu une erreur lors de votre saisis Pseudo/Mot de passe');
			}
		}
		$this->render('connexion/index.php',['notice'=>$notice]);
		
	}


	// public function delete(array $routeVars):void
	// {
	// 	$this->contactRepository->deleteOne($routeVars['pseudo']);
	// 	$this->sessionService->set("notice","Vous avez bien supprimé");
	// 	header("Location: /contact");
	// }
	
	public function form(array $routeVars):void
	{

		$notice = isset($_SESSION['notice']) ? $this->sessionService->get('notice') : null;
		$this->sessionService->Delete('notice');

		$abonnements = $this->abonnementRepository->getAbonnement();

		$entity = isset($routeVars['pseudo'])? $this->contactRepository->getAllById($routeVars['pseudo']) : new Contact();
		$form = new ContactForm($entity);

		// if($routeVars['0'] =="/contact/form/".$entity->getPseudo()){
		// 	// if($form->getFields()['Pseudo']['value'] != $_SESSION['Pseudo']){
		// 	    // $this->sessionService->set("notice","Hop Hop Hop n'essayez pas de casser le site.");
		// 	    header("Location: /");
		// 	// }
		// }

		//FAIRE DEUX CLASSE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		if($form->isValid()){
			$entity = $form->getEntity();
			if($routeVars['0'] =="/contact/form"){
				$this->contactRepository->insert($entity);
				$this->sessionService->set("notice","Vous avez bien été inscrit.");
				$this->sessionService->set("login",$_POST['Pseudo']);
				$_SESSION['Pseudo'] = $_POST['Pseudo'];
				header("Location: /");

			}else if($routeVars['0'] =="/contact/form/".$entity->getPseudo()){
				var_dump("BAM");
				$this->contactRepository->modify($entity);
				$this->sessionService->set("notice","La modification s'est effectué sans problème.");
				header("Location: /contact/form/".$_SESSION['Pseudo']);
			}
		}
		$this->render('contact/form.php', [
		  'form' => $form,'abonnements' => $abonnements,'notice' => $notice
		]);
	}

	public function update(array $routeVars):void
	{
		$entity = isset($routeVars['pseudo'])? $this->contactRepository->getAllById($routeVars['pseudo']) : new Contact();
		$this->contactRepository->modify($entity);
		$this->sessionService->set("notice","La modification s'est effectué sans problème.");
		header("Location: /contact/form/".$_SESSION['Pseudo']);
		
		$this->render('contact/form.php', [$abonnements,'notice' => $notice]);
	}

	public function uploadPhoto(array $routeVars):void
	{
		$target_dir = __DIR__ . "/../../public_html/PhotoA/";;
		$target_file = $target_dir . basename($_FILES["Photo"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["Photo"]["tmp_name"]);
		    if($check !== false) {
		    	$this->sessionService->set("notice","Le fichier est une image - " . $check["mime"] . ".");
		        $uploadOk = 1;
		    } else {
		        $this->sessionService->set("notice","Le fichier n'est pas une image.");
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    $this->sessionService->set("notice","Désolé, Le fichier existe déjà.");
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["Photo"]["size"] > 500000) {
			$this->sessionService->set("notice","Désolé, l'image est bien trop grande.");
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$this->sessionService->set("notice","Désolé, nous acceptons seulement les images en JPG, JPEG, PNG & GIF.");
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$this->sessionService->set("notice","Désolé, Le fichier ne semble pas avoir été envoyé au serveur.");
		// if everything is ok, try to upload file
		} else {
			$Maphoto = move_uploaded_file($_FILES["Photo"]["tmp_name"], $target_dir.$_SESSION['Pseudo'].'.'.$imageFileType);
		    if ($Maphoto) {
		        $this->sessionService->set("notice","Le fichier ".$_FILES["Photo"]["name"]." à été envoyé.");
		        $this->contactRepository->modifyPhoto($_SESSION['Pseudo'].'.'.$imageFileType);
		        header("Location: /contact/form/".$_SESSION["Pseudo"]);
		    } else {
		        $this->sessionService->set("notice","Désolé, il y a eu une erreur lors de l'envoie du fichier.");

		    }
		}
		$this->render('contact/form.php');
	}
}

?>
