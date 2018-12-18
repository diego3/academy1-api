<?php
namespace Api;

use FreeMachine\Router\Router';
use FreeMachine\Auth\Acl.php';
use FreeMachine\Auth\TokenApiAuth.php';

class Application {


	public static function resolve() {
		$app = 'academy1';

		$routes = [
			'/alunos' => [
				'GET'  		=> 'AlunosController->get',
				'POST'		=> 'AlunosController->post',
				'PUT' 		=> 'AlunosController->put',
				'DELETE'	=> 'AlunosController->delete'
			],
			'/professores' => [
				'GET'  => 'ProfessoresController->get',
				'POST' => 'ProfessoresController->post'
			]
		];
		

		$modules = [
			1 => 'Interno',
			2 => 'Cadastros',
			3 => 'Pagamentos'
		];

		$aclModule = [
			//this id can be a user profile/module too
			1 => [
				'/alunos' => [
					'read'  => 'GET', 
					'write' => 'POST|PUT|DELETE'
				] 
			],
			2 => [
				'/alunos' => [
					'read'  => 'GET', 
					'write' => 'POST|PUT'
				] 
			]
		];

		// usuario 57748 ver dados cadastrais dos alunos, não pode alterar nem apagar
		$aclUser = [
			57748 => [
				'rules' => [
					'/alunos' => [
						'POST' => 'r'
					]
				]
			]
		];
		$acls = [
			'/alunos' => [
				'GET'  => true,
				'POST' => false
			]
		];

		$acl = new Acl($acls);

		try {
			Router::resolve($routes, $acl);
		} catch (\Exception $e) {
			http_response_code($e->getCode());
			echo json_encode(['error' => $e->getMessage()]);
		}


		// Application class
		// each module extends from this application class
		// Router class should be reusefull by the other modules
	}

}