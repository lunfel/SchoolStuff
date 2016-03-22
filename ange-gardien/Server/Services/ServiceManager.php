<?php 

namespace Server\Services;

use Server\Exceptions\ServiceNotFoundException;

CONST SERVICES_CONFIG = 'Config/services.conf.php';

class ServiceManager {

	private static $instance;

	private $services;

	private function __construct(){
		// Load config
		$this->services = require(SERVICES_CONFIG);
	}

	static public function getManager(){
		if(self::$instance === NULL){
			self::$instance = new ServiceManager();
		}
		return self::$instance;
	}

	/**
	 * Retourne un service préconfiguré par son nom
	 */
	public function get($name){
		foreach ($this->services as $servicename => $service) {
			if($servicename === $name){
				return new $service();
			}
		}

		throw new ServiceNotFoundException($name);
		return NULL;
	}
}