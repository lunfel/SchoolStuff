<?php

namespace Server\Services\Hydration;

use Server\Exception\NullObjectException;

abstract class NoteHydrator implements HydratorInterface {
	public function hydrate($valeurs, $Note){
		if(!$Note){
			throw new NullObjectException();
		}

		$Note->setId($valeurs['id']);
		$Note->setLatitude($valeurs['latitude']);
		$Note->setLongitude($valeurs['longitude']);

		return $Note;
	}
}