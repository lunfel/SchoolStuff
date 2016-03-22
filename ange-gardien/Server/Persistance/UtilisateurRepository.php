<?php

namespace Server\Persistance;

use Server\Services\ServiceManager;

class UtilisateurRepository extends Repository {
	public function get($id){
		$SQL = "SELECT * FROM utilisateurs WHERE id = $id";

		$sm = ServiceManager::getManager();
		$uh = $sm->get('utilisateur.hydrator');

		$mysqli = $this->getMysqli();

		$resultset = $mysqli->query($SQL);

		if($resultset === false){
			throw new SQLException($SQL);
		}

		if($resultset->num_rows != 1){
			return NULL;
		} 

		$Utilisateur = $uh->hydrate($resultset->fetch_assoc());
		$mysqli->close();

		// On attache les minuteurs à l'utilisateur
		$mrep = $sm->get('minuteur.repository');
		$Utilisateur->setMinuteurs($mrep->listByIdUtilisateur($id));

		return $Utilisateur;
	}

	public function desactiver($id){
		$SQL = "UPDATE utilisateurs SET actif = 0 WHERE id=$id";

		$mysqli = $this->getMysqli();

		$return = $mysqli->query($SQL);
		if($return === false){
			throw new SQLException($SQL);
		}
		$mysqli->close();

		return $return;
	}

	public function reactiver($id){
		$SQL = "UPDATE utilisateurs SET actif = 1 WHERE id=$id";

		$mysqli = $this->getMysqli();

		$return = $mysqli->query($SQL);
		if($return === false){
			throw new SQLException($SQL);
		}
		$mysqli->close();

		return $return;
	}
}