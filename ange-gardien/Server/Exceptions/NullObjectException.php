<?php

namespace Server\Exceptions;

use \Exception as BaseException;

class NullObjectException extends BaseException{
	public function __construct(){
		parent::__construct("Un objet vaut NULL où il ne l'est pas permi");s
	}
}