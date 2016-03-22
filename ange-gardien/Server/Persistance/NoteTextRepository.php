<?php

namespace Server\Persistance;

use Server\Services\ServiceManager;

class NoteTextRepository extends Repository {
	public function listByIdMinuteur($idMinuteur){
		$SQL = "SELECT * FROM notes_text WHERE idMinuteur = $idMinuteur";

		$sm = ServiceManager::getManager();
		$cth = $sm->get('note_text.hydrator');

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