<?php

namespace Server\Exceptions;

use \Exception as BaseException;

class FileNotFoundException extends BaseException{
	public function __construct($filename){
		parent::__construct("Le fichier '$filename' n'a pu être trouvé");
	}
}