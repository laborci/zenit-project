<?php namespace Application\Mission\Web\Page;

use Zenit\Bundle\SmartPageResponder\Component\Responder\SmartPageResponder;

/**
 * @template index.twig
 * @title "Gamer365"
 * @bodyclass "gamer"
 * @js "/~web/app.js"
 * @css "/~web/app.css"
 */
class Index extends SmartPageResponder{

	protected function prepare(){
		$this->set('name', 'elvis presley');
	}

}