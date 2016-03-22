<?php

return array(
	'recupererAlarmes' => array(
		'pattern' => '/^alarmes\/([0-9]+)$/',
		'params' => array(
			'uid' => 1
		),
		'route_callback' => function(Server\Services\ServiceManager $sm, array $params){
			$facade = $sm->get('facade');
			return $facade->recupererAlarmes($params['uid']);
		}
	),
	'ajouterAlarme' => array(
		'pattern' => '/^alarmes\/ajouter\/([0-9]+)$/',
		'params' => array(
			'uid' => 1
		),
		'route_callback' => function(Server\Services\ServiceManager $sm, array $params, array $values){
			$facade = $sm->get('facade');
			$mh = $sm->get('minuteur.hydrator');
			$Minuteur = $mh->hydrate($values);

			if(count($values) == 0){
				return file_get_contents('Web/AjouterAlarme.html');
			}
			else {
				return $facade->ajouterAlarme($params['uid'], $Minuteur);
			}
		}
	),
	'ajouterNote' => array(
		'pattern' => '/^notes\/ajouter\/([0-9]+)$/',
		'params' => array(
			'idAlarme' => 1
		),
		'route_callback' => function(Server\Services\ServiceManager $sm, array $params, array $values){
			$facade = $sm->get('facade');
		}
	),
	'desactiverAlarme' => array(
		'pattern' => '/^alarmes\/desactiver\/([0-9]+)$/',
		'params' => array(
			'idAlarme' => 1
		),
		'route_callback' => function(Server\Services\ServiceManager $sm, array $params, array $values){
			$facade = $sm->get('facade');

			if(!isset($values['motDePasseMd5'])){
				return file_get_contents('Web/DesactiverAlarme.html');
			} else {
				return $facade->desactiverAlarme($params['idAlarme'], $values['motDePasseMd5']);
			}		
		}
	),
	'desactiverCompte' => array(
		'pattern' => '/^comptes\/desactiver\/([0-9]+)$/',
		'params' => array(
			'uid' => 1
		),
		'route_callback' => function(Server\Services\ServiceManager $sm, array $params){
			$facade = $sm->get('facade');
			return $facade->desactiverCompte($params['uid']);
		}
	),
	'ReactiverCompte' => array(
		'pattern' => '/^comptes\/reactiver\/([0-9]+)$/',
		'params' => array(
			'uid' => 1
		),
		'route_callback' => function(Server\Services\ServiceManager $sm, array $params){
			$facade = $sm->get('facade');
			return $facade->reactiverCompte($params['uid']);
		}
	),
	'getRapportHtml' => array(
		'pattern' => '/^rapports\/([0-9]+)$/',
		'params' => array(
			'idAlarme' => 1
		),
		'route_callback' => function(Server\Services\ServiceManager $sm, array $params){
			$facade = $sm->get('facade');
			return $facade->getRapportHtml($params['idAlarme']);
		}
	)
);