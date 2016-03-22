<?php

namespace Server;

use Server\Exceptions\NoRouteMatchException;
use Server\Services\ServiceManager;

ini_set('display_errors',1);

require_once('autoload.php');

class Router {
	private $routes;

	function __construct(){
		$this->routes = require('Config/routes.conf.php');
	}

	function submit(){
		$sm = Services\ServiceManager::getManager();

		$uri = $_GET['uri'];
		if(!isset($uri)){
			throw new NoRouteMatchException();
		}

		foreach ($this->routes as $routename => $route) {
			if(preg_match($route['pattern'], $uri, $matches)){
				// On enleve le masque complet
				array_shift($matches);

				// On map le nom des params aux matches
				foreach ($route['params'] as $param_name => $match_nb) {
					$matches[$param_name] = $matches[$match_nb-1];
				}

				// On appelle la fonction fermeture avec la liste des paramètres (GET) et
				// la liste de valeurs (POST)
				return call_user_func($route['route_callback'], $sm, $matches, $_POST);
			}
		}
	}
}

$r = new Router();
$page = $r->submit();

if(is_array($page)){
	print json_encode($page);
} else {
	print $page;
}