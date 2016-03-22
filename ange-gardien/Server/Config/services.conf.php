<?php

return array(
	'facade' => 'Server\FacadeService',
	'utilisateur.hydrator' => 'Server\Services\Hydration\UtilisateurHydrator',
	'minuteur.hydrator' => 'Server\Services\Hydration\MinuteurHydrator',
	'contact_texto.hydrator' => 'Server\Services\Hydration\ContactTextoHydrator',
	'note_text.hydrator' => 'Server\Services\Hydration\NoteTextHydrator',
	'utilisateur.repository' => 'Server\Persistance\UtilisateurRepository',
	'minuteur.repository' => 'Server\Persistance\MinuteurRepository',
	'contact_texto.repository' => 'Server\Persistance\ContactTextoRepository',
	'note_text.repository' => 'Server\Persistance\NoteTextRepository',
	'minuteur.report' => 'Server\Services\MinuteurReport'
);