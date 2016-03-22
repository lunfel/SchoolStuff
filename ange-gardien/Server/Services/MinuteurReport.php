<?php

namespace Server\Services;

use Server\Core\Alarms\Minuteur;

class MinuteurReport {

	private $subject;

	function bind(Minuteur $Minuterie){
		$this->subject = $Minuterie;
	}

	function __toString(){
		if($this->subject->getDateDeclenchement() === NULL){
			$dateDeclenchement = "Encore Active";
		} else {
			$dateDeclenchement = $this->subject->getDateDeclenchement();
		}
		
		$HTML = "<table>".
			"<tr>".
				"<th>Id</th>".
				"<th>Message</th>".
				"<th>Date de déclenchement</th>".
			"</tr>".
			"<tr>".
				"<td>".
					$this->subject->getId().
				"</td>".
				"<td>".
					$this->subject->getMessage().
				"</td>".
				"<td>".
					$dateDeclenchement .
				"</td>".
			"</tr>".
		"</table>";

		return $HTML;
	}
}