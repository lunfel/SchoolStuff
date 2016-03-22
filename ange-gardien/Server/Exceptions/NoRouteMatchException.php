<?php

namespace Server\Exceptions;

use \Exception as BaseException;

class NoRouteMatchException extends BaseException{
	public function __construct(){
		parent::__construct("Aucune route n'a plus correspondre à la requête HTTP");
	}
}