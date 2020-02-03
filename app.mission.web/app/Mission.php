<?php namespace Application\Mission\Web;

use Zenit\Bundle\Mission\Component\Web\Routing\ApiManager;
use Zenit\Bundle\Mission\Component\Web\WebMission;
use Zenit\Bundle\Mission\Component\Web\Routing\Router;

class Mission extends WebMission{
	public function route(Router $router){
		ApiManager::setup($router, '/api', __NAMESPACE__.'\\Api');
		$router->get('/', Page\Index::class)();
	}
}


