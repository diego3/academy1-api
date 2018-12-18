<?php 
use Api\Application;

echo json_encode(['msg' => 'I am alive']);
exit;

try {
	
	Application::resolve();
} catch (\Exception $e) {
	http_response_code(500);
	echo 'Application error '.$e->getMessage();
}


