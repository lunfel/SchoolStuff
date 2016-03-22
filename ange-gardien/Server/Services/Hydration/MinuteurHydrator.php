<?php

namespace Server\Services\Hydration;

use Server\Core\Alarms\Minuteur;

class MinuteurHydrator implements HydratorInterface {

	public function hydrate($valeurs, $Minuteur = NULL){
		if($Minuteur === NULL){
			$Minuteur = new Minuteur();
		}

		$Minuteur->setId($valeurs['id']);
		$Minuteur->setAlerteTimestamp($valeurs['alerteTimestamp']);
		$Minuteur->setAlerteNb($valeurs['alertNb']);
		$Minuteur->setDateDebut($valeurs['dateDebut']);
		$Minuteur->setDateDeclenchement($valeurs['dateDeclenchement']);
		$Minuteur->setMotDePasseMd5($valeurs['motDePasseMd5']);
		$Minuteur->setMotDePasseAlerteMd5($valeurs['motDePasseAlerteMd5']);
		$Minuteur->setNbEssais($valeurs['nbEssais']);
		$Minuteur->setDeclencher($valeurs['declencher']);
		$Minuteur->setActif($valeurs['actif']);
		$Minuteur->setMessage($valeurs['message']);

		return $Minuteur;
	}
}