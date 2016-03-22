<?php

namespace Server\Services\Hydration;

use Server\Exception\NullObjectException;

abstract class ContactHydrator implements HydratorInterface {
	public function hydrate($valeurs, $Contact){
		if(!$Contact){
			throw new NullObjectException();
		}

		$Contact->setId($valeurs['id']);
		$Contact->setDateEnvoi($valeurs['dateEnvoi']);
		$Contact->setStatusEnvoi($valeurs['statusEnvoi']);

		return $Contact;
	}
}