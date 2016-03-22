<?php

namespace Server\Exceptions;

use \Exception as BaseException;

class SQLException extends BaseException{
	public function __construct($SQL){
		parent::__construct("Il y a une erreur dans la requête SQL suivantes : " . $SQL);
	}
}