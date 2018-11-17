<?php

namespace App\Controller;

use App\Service\SessionService;

class HomepageController extends Controller
{
	private $sessionService;
	
	public function __construct(SessionService $sessionService)
	{
		$this->sessionService = $sessionService;
	}
		
		
	public function index(array $routeVars):void
	{
		$notice = isset($_SESSION['notice']) ? $this->sessionService->get('notice') : null;
		
		$this->sessionService->Delete('notice');

		$this->render('homepage/index.php', ['notice' => $notice]);
	}
}
