<?php

namespace Server\Services\Hydration;

use Server\Core\Messaging\NoteText;

class NoteTextHydrator extends NoteHydrator {
	public function hydrate($valeurs, $NoteText = NULL){
		if($NoteText === NULL){
			$NoteText = new NoteText();
		}

		$NoteText = parent::hydrate($valeurs, $NoteText);

		$NoteText->setNote($valeurs['note']);

		return $NoteText;
	}
}