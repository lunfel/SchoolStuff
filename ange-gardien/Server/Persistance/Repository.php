<?php

namespace Server\Persistance;

abstract class Repository {
	private $database_infos;

	public function __construct(){
		$this->database_infos = require('Config/bd.conf.php');
	}

	protected function getMysqli(){
		return new \mysqli($this->database_infos['database_host'],$this->database_infos['database_user'],$this->database_infos['database_password'],$this->database_infos['database_name']);
	}
}