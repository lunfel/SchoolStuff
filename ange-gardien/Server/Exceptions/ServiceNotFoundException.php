<?php

namespace Server\Exceptions;

use \Exception as BaseException;

class ServiceNotFoundException extends BaseException{
	public function __construct($service_name){
		parent::__construct("Le service '".$service_name."' n'a pu être trouvé");
	}
}