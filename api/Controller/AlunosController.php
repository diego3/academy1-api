<?php 
namespace Api\Controller;


class AlunosController {


	public function get($params){
		echo __METHOD__.PHP_EOL;
		var_dump($params);

		//order by, limit , offset 
	}

	public function post($params){
		echo __METHOD__.PHP_EOL;
		var_dump($params);

		// todo , return a link to a new resource
	}

	public function put($params){
		echo __METHOD__.PHP_EOL;
		var_dump($params);


		// todo , return a link to a updated resource
	}

	public function delete($params){
		echo __METHOD__.PHP_EOL;
		var_dump($params);

	}

	public function exampleAcl($params) {

	}
}


class InvalidAlunoException extends \Exception { }