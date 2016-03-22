<?php

require('Exceptions/FileNotFoundException.php');

function __autoload($class_name){
	$parts = explode('\\', $class_name);
	array_shift($parts);

	$filename = implode(DIRECTORY_SEPARATOR, $parts) . ".php";

	if(!file_exists($filename)){
		print $filename;
		throw new FileNotFoundException($filename);
	}
	else {
		require $filename;
	}
}