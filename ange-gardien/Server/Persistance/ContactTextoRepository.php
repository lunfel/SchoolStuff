<?php

namespace Server\Persistance;

use Server\Services\ServiceManager;
use Server\Exceptions\SQLException;

class ContactTextoRepository extends Repository {
	public function listByIdMinuteur($idMinuteur){
		$SQL = "SELECT * FROM contacts_texto WHERE idMinuteur = $idMinuteur";

		$sm = ServiceManager::getManager();
		$cth = $sm->get('contact_texto.hydrator');

		$mysqli = $this->getMysqli();

		$resultset = $mysqli->query($SQL);

		if($resultset === false){
			throw new SQLException($SQL);
		}

		$results = array();
		while($row = $resultset->fetch_assoc()){
			$results[] = $cth->hydrate($row);
		}

		$mysqli->close();

		return $results;
	}
}