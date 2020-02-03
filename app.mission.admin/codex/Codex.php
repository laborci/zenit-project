<?php namespace Application\AdminCodex;

use Application\Constant\Permission\Role;
use Zenit\Bundle\Codex\Component\Codex\AdminRegistry;
use Zenit\Bundle\Codex\Component\Codex\CodexInitializer;
use Zenit\Bundle\Codex\Component\Codex\CodexMenu;
use Zenit\Bundle\Codex\Interfaces\CodexWhoAmIInterface;

class Codex extends CodexInitializer{

	public $title = 'My Admin';
	public $icon = 'fas fa-book';
	public $loginPlaceholder = 'email';
	public $role = Role::AdminAccess;


	protected function menu(CodexMenu $menu){
		$menu->addCodexItem(Form\UserCodex::class);
	}

	public function importForms(AdminRegistry $registry){ $this->autoMap(__NAMESPACE__ . '\Form', $registry); }

}

