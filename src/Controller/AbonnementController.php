<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Cours;
use App\Repository\AbonnementRepository;
use App\Service\SessionService;

class AbonnementController extends Controller
{
	private $abonnementRepository;
	private $sessionService;
	
	public function __construct(AbonnementRepository $abonnementRepository, SessionService $sessionService)
	{
		$this->abonnementRepository = $abonnementRepository;
		$this->sessionService = $sessionService;
	}
	
	public function Add(array $routeVars):void
	{

		$this->abonnementRepository->addCour($routeVars['id']);
		$this->sessionService->set("notice","Vous avez ajouté un abonnement a votre compte.");
		header("Location: /contact/form/".$_SESSION['Pseudo']);
		$this->render('Abonnement/index.php');
	}

	public function index(array $routeVars):void
	{
		$data = $this->abonnementRepository->getAllCours();
		$this->render('Abonnement/index.php', ['result'=>$data]);
	}

	public function delete(array $routeVars):void
	{
		$this->abonnementRepository->deleteAbonnement($routeVars['id']);
		$this->sessionService->set("notice","Vous avez supprimé un abonnement de votre compte.");
		header("Location: /contact/form/".$_SESSION['Pseudo']);
		$this->render("Abonnement/index.php");
	}

}

?>
