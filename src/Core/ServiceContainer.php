<?php


namespace App\Core;

use App\Controller\HomepageController;
use App\Controller\ContactController;
use App\Controller\AbonnementController;
use App\Service\SessionService;
use App\Repository\ContactRepository;
use App\Repository\AbonnementRepository;


class ServiceContainer
{

  private $services = [];
  public function __construct()
  {
    /*
    * clé est l'identifiant unique du service (class php).
    * valeur est une fonction anonyme qui renvoie le service.
    */
    $this->services = [
    'core.routing' 			      => function(){ return new Routing();},
	  'core.database' 			    => function(){ return new Database();},
	  'service.session' 		    => function(){ return new SessionService();},
	  'repository.contact' 		  => function(){ return new ContactRepository($this->getService('core.database'));},
    'repository.abonnement'   => function(){ return new AbonnementRepository($this->getService('core.database'));},
    'controller.homepage' 	  => function(){ return new HomepageController($this->getService('service.session'));},
	  'controller.contact' 		  => function(){ return new ContactController( $this->getService('repository.abonnement'), $this->getService('repository.contact'),$this->getService('service.session') ); },
    'controller.abonnement'   => function(){ return new AbonnementController( $this->getService('repository.abonnement'),$this->getService('service.session') ); }
    ];
  }

  public function getService(string $idService)
  {

    //Les () servent à appeller la fonction anonyme dans le constructeur.
    return $this->services[$idService]();
  }

}



?>
