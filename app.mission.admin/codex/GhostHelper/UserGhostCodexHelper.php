<?php namespace Application\AdminCodex\GhostHelper;

/**
 * @label-field id: 
 * @label-field name: név
 * @label-field email: e-mail
 * @label-field password: jelszó
 * @label-field groups: Csoportok
 * @label-field groups.visitor: Látogató
 * @label-field groups.admin: Adminisztrátor
 * @label-attachment avatar: Avatár
 * @label-attachment fotó: 
 */
abstract class UserGhostCodexHelper extends \Zenit\Bundle\Codex\Component\Codex\AdminDescriptor{


	/** @var \Zenit\Bundle\Codex\Component\Codex\Field */ protected $id;
	/** @var \Zenit\Bundle\Codex\Component\Codex\Field */ protected $name;
	/** @var \Zenit\Bundle\Codex\Component\Codex\Field */ protected $email;
	/** @var \Zenit\Bundle\Codex\Component\Codex\Field */ protected $password;
	/** @var \Zenit\Bundle\Codex\Component\Codex\Field */ protected $groups;
	/** @var \Zenit\Bundle\Codex\Component\Codex\Field */ protected $avatar;
	/** @var \Zenit\Bundle\Codex\Component\Codex\Field */ protected $fotó;

	public function __construct(){
		$this->id = new \Zenit\Bundle\Codex\Component\Codex\Field('id', 'id' );
		$this->name = new \Zenit\Bundle\Codex\Component\Codex\Field('name', 'név' );
		$this->email = new \Zenit\Bundle\Codex\Component\Codex\Field('email', 'e-mail' );
		$this->password = new \Zenit\Bundle\Codex\Component\Codex\Field('password', 'jelszó' );
		$this->groups = new \Zenit\Bundle\Codex\Component\Codex\Field('groups', 'Csoportok' ,['visitor'=>'Látogató', 'admin'=>'Adminisztrátor']);
		$this->avatar = new \Zenit\Bundle\Codex\Component\Codex\Field('avatar', 'Avatár' );
		$this->fotó = new \Zenit\Bundle\Codex\Component\Codex\Field('fotó', 'fotó' );
	}

	protected function createDataProvider(): \Zenit\Bundle\Codex\Interfaces\DataProviderInterface{
		return new \Zenit\Bundle\Codex\Component\Codex\DataProvider\GhostDataProvider(\Application\Ghost\User::class);
	}

}
