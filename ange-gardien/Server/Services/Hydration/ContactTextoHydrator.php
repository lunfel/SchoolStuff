<?php

namespace Server\Services\Hydration;

use Server\Core\Messaging\ContactTexto;

class ContactTextoHydrator extends ContactHydrator {
	public function hydrate($valeurs, $ContactTexto = NULL){
		if($ContactTexto === NULL){
			$ContactTexto = new ContactTexto();
		}

		$ContactTexto = parent::hydrate($valeurs, $ContactTexto);

		$ContactTexto->setContact($valeurs['contact']);

		return $ContactTexto;
	}
}