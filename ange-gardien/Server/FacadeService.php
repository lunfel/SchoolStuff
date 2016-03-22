<?php

namespace Server;

use Server\Security\Utilisateur;
use Server\Core\Messaging\Note;
use Server\Services\ServiceManager;
use Server\Core\Alarms\Minuteur;

class FacadeService {

	/**
	 * Permet de récupérer toutes les alarmes (actives et inactives) qui sont
	 * associées à l'utilisateur passé en paramètre.
	 * @param $idUtilisateur - Id de l'utilisateur
	 * @return {Minuteur[]} - Une liste de minuteurs associée à l'utilisateur
	 */
	function recupererAlarmes($idUtilisateur){
		$sm = ServiceManager::getManager();
		$mrep = $sm->get('minuteur.repository');

		$minuteurs = $mrep->listByIdUtilisateur($idUtilisateur);

		foreach ($minuteurs as $index => $m) {
			$minuteurs[$index] = $m->toArray();
		}

		return $minuteurs;
	}

	/**
	 * Permet d'ajouter une alarme
	 * @param $idUtilisateur {int} - Id de l'utilisateur
	 * @param $Minuteur {Business\Minuteur} - Un objet de type minuterie
	 * @return {string} - TODO: ???
	 */
	function ajouterAlarme($idUtilisateur,Minuteur $Minuteur){
		$sm = ServiceManager::getManager();
		$mrep = $sm->get('minuteur.repository');
		$result = $mrep->ajouter($idUtilisateur, $Minuteur);

		return $result;
	}

	/**
	 * Permet d'ajouter une note à une alerte donnée
	 * @param $idAlerte {string} - Id de l'alerte
	 * @param $Note {Server\Core\Messaging\iNote} - Un objet de type note.
	 * @return {boolean} - Succes/Echec
	 */
	function ajouterNote($idAlerte,NoteInterface $Note){

		return false;
	}

	/**
	 * Permet de désactiver une alarme ou de moquer une désactivation
	 * @param $idAlerte {string} - Id de l'alerte
	 * @param $motDePasseMd5 {string} - Mot de passe pour désactiver une alerte
	 * @return {boolean} - Succes/Echec
	 */
	function desactiverAlarme($idAlerte,$motDePasseMd5){
		$sm = ServiceManager::getManager();
		$mrep = $sm->get('minuteur.repository');

		return $mrep->desactiver($idAlerte, $motDePasseMd5);
	}

	/**
	 * Permet de désactiver le compte d'un utilisateur
	 * @param $idUtilisateur {integer} id de l'utilisateur associé au compte
	 * @return {boolean} - Succes/Echec
	 */
	function desactiverCompte($idUtilisateur){
		$sm = ServiceManager::getManager();
		$ur = $sm->get('utilisateur.repository');
		return $ur->desactiver($idUtilisateur);
	}

	/**
	 * Permet de réactiver le compte inactif d'un utilisateur
	 * @param $idUtilisateur {integer} id de l'utilisateur associé au compte
	 * @return {boolean} - Succes/Echec
	 */
	function reactiverCompte($idUtilisateur){
		$sm = ServiceManager::getManager();
		$ur = $sm->get('utilisateur.repository');
		return $ur->reactiver($idUtilisateur);
	}

	/**
	 * Élabore un rapport complet concernant le déclenchement d'une alerte
	 * @param $idAlerte {string} - Id de l'alerte
	 * @return {string} - Contenu du rapport au format HTML
	 */
	function getRapportHtml($idAlerte){
		$sm = ServiceManager::getManager();
		$mrep = $sm->get('minuteur.repository');
		$Minuteur = $mrep->get($idAlerte);
		$mreport = $sm->get('minuteur.report');
		$mreport->bind($Minuteur);

		return $mreport;
	}
}