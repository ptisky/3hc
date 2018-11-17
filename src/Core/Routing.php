<?php

// namespace
namespace App\Core;

class Routing
{
	/*
	 * public : accessible dans la classe et en dehors
	 * private : accessible uniquement la classe
	 * protected: accessible dans la classe et les sous-classes
	 * */

	// propriétés
	private $route;
	private $routeVars;

	// liste des routes : lien entre la route et le contrôleur
	// clé représente la route sous forme d'expression régulière
	private $routes = [
		'#^/$#' => [
			'controller' => 'controller.homepage',
			'method' => 'index'
		],
		'#^/contact$#' => [
			'controller' => 'controller.contact',
			'method' => 'index'
		],
		'#^/contact/form/?(?<pseudo>[0-97A-Za-z.-]+)?$#' => [
			'controller' => 'controller.contact',
			'method' => 'form'
		],
		'#^/contact/form/update/?(?<pseudo>[0-97A-Za-z.-]+)?$#' => [
			'controller' => 'controller.contact',
			'method' => 'update'
		],
		'#^/contact/Supprimer/?(?<pseudo>[0-97A-Za-z.-]+)?$#' => [
			'controller' => 'controller.contact',
			'method' => 'delete'
		],
		'#^/connexion$#' => [
			'controller' => 'controller.contact',
			'method' => 'connexion'
		],
		'#^/deconnection$#' => [
			'controller' => 'controller.contact',
			'method' => 'disconect'
		],
		'#^/uploadPhoto/?(?<pseudo>[0-97A-Za-z.-]+)?$#' => [
			'controller' => 'controller.contact',
			'method' => 'uploadPhoto'
		],
		'#^/inscription$#' => [
			'controller' => 'controller.inscription',
			'method' => 'inscription'
		],
		'#^/abonnement$#' => [
			'controller' => 'controller.abonnement',
			'method' => 'index'
		],
		'#^/abonnement/add/?(?<id>\d+)?$#' => [
			'controller' => 'controller.abonnement',
			'method' => 'Add'
		],
		'#^/abonnement/delete/?(?<id>\d+)?$#' => [
			'controller' => 'controller.abonnement',
			'method' => 'delete'
		]

	];

	// constructeur
	public function __construct()
	{
		// récupérer la route (url)
		$this->route = $_SERVER['REQUEST_URI'];

		// recherche de la route
		foreach($this->routes as $key => $value){
			// preg_match : concordance d'expression rationnelle
			if(preg_match($key, $this->route, $this->routeVars)){
				$this->route = $value;
				break;
			}
		}
		//var_dump($this->routeVars);
	}

	// méthodes
	public function getRoute():array
	{
		return $this->route;
	}

	public function getRouteVar():array
	{
		return $this->routeVars;
	}

}
