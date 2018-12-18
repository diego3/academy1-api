<?php 

$loader = require_once __DIR__.'/../vendor/autoload.php';
//$loader->addPsr4('Api\\', __DIR__.'/../');
//echo '<pre>';
//print_r($loader);
//exit;
use Api\Application;


try {
	
	Application::resolve();
} catch (\Exception $e) {
	http_response_code(500);
	echo 'Application error '.$e->getMessage();
}


