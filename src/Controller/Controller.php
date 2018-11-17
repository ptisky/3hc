<?php

namespace App\Controller;

class Controller
{

  public function render(string $path, array $routeVars=null):void
	{

    // Extract : crée une variable à partir des clés d'un tableau associatif.
    !is_null($routeVars) ? extract($routeVars) : null;

		require_once __DIR__ . "/../../template/$path";
	}

}

?>
