<?php

namespace Server\Services\Hydration;

use Server\Security\Utilisateur;

class UtilisateurHydrator implements HydratorInterface {

	public function hydrate($valeurs, $Utilisateur = NULL){
		if($Utilisateur === NULL){
			$Utilisateur = new Utilisateur();
		}

		$Utilisateur->setId($valeurs['id']);
		$Utilisateur->setDateActivation($valeurs['dateActivation']);
		$Utilisateur->setActif($valeurs['actif']);
		$Utilisateur->setClientProvider($valeurs['setClientProvider']);
		$Utilisateur->setClientId($valeurs['idClient']);

		return $Utilisateur;
	}
}