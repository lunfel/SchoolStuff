<?php

namespace Server\Persistance;

use Server\Services\ServiceManager;
use Server\Core\Alarms\Minuteur;
use Server\Exceptions\SQLException;

class MinuteurRepository extends Repository {
	public function listByIdUtilisateur($idUtilisateur){
		$SQL = "SELECT * FROM minuteurs WHERE idUtilisateur = $idUtilisateur AND actif = 1";

		$sm = ServiceManager::getManager();
		$mh = $sm->get('minuteur.hydrator');

		$ctrep = $sm->get('contact_texto.repository');
		$ntrep = $sm->get('note_text.repository');

		$mysqli = $this->getMysqli();

		$resultset = $mysqli->query($SQL);

		if($resultset === false){
			throw new SQLException($SQL);
		}

		$results = array();
		while($row = $resultset->fetch_assoc()){
			$Minuteur = $mh->hydrate($row);

			// On attache les contacts texto au minuteur
			$ct = $ctrep->listByIdMinuteur($Minuteur->getId());
			$Minuteur->setContactsTexto($ct);

			// On attache les notes de texte au minuteur
			$nt = $ntrep->listByIdMinuteur($Minuteur->getId());
			$Minuteur->setNotesText($nt);

			$results[] = $Minuteur;
		}

		$mysqli->close();

		return $results;
	}

	public function get($id){
		$SQL = "SELECT * FROM minuteurs WHERE id = $id";

		$sm = ServiceManager::getManager();
		$uh = $sm->get('minuteur.hydrator');

		$mysqli = $this->getMysqli();

		$resultset = $mysqli->query($SQL);

		if($resultset === false){
			throw new SQLException($SQL);
		}

		if($resultset->num_rows != 1){
			return NULL;
		} 

		$Minuteur = $uh->hydrate($resultset->fetch_assoc());
		$mysqli->close();

		$ctrep = $sm->get('contact_texto.repository');
		$ntrep = $sm->get('note_text.repository');

		// On attache les contacts texto au minuteur
		$ct = $ctrep->listByIdMinuteur($Minuteur->getId());
		$Minuteur->setContactsTexto($ct);

		// On attache les notes de texte au minuteur
		$nt = $ntrep->listByIdMinuteur($Minuteur->getId());
		$Minuteur->setNotesText($nt);

		return $Minuteur;
	}

	public function ajouter($idUtilisateur, Minuteur $Minuteur){
		$SQL = "
		INSERT INTO minuteurs (idUtilisateur, dateDebut, motDePasseMd5, motDePasseAlerteMd5, message)
		VALUES (
		'".$idUtilisateur."',
		'".$Minuteur->getDateDebut()."',
		'".$Minuteur->getMotDePasseMd5()."',
		'".$Minuteur->getMotDePasseAlerteMd5()."',
		'".$Minuteur->getMessage()."')";

		$mysqli = $this->getMysqli();

		if($mysqli->query($SQL)){
			$return = $mysqli->insert_id;
		} else {
			throw new SQLException($SQL);
			$return = false;
		}
		$mysqli->close();

		return $return;
	}

	/**
	 * Pour le prototype, on ne fait que désactiver. On ne vérifie pas si c'est le
	 * mot de passe pour l'alerte
	 */
	public function desactiver($idMinuteur, $motDePasseMd5){
		$SQL = "UPDATE minuteurs SET actif = 0 WHERE motDePasseMd5 = '$motDePasseMd5' AND id = '$idMinuteur'";

		$mysqli = $this->getMysqli();

		$return = $mysqli->query($SQL);
		if($return === false){
			throw new SQLException($SQL);
		}
		$mysqli->close();

		return $return;
	}
}