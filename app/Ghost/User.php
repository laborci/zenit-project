<?php
namespace Application\Ghost;
include 'User.ghost.php';

use Zenit\Bundle\Zuul\Component\RoleManager\Component\RoleManager;
use Zenit\Bundle\Ghost\Entity\Component\Decorator;
use Zenit\Bundle\Zuul\Interfaces\AuthenticableInterface;

class User extends UserGhost implements AuthenticableInterface{

	use Authenticable;

}

User::init(function (Decorator $decorator){
	$decorator->hasAttachment('avatar')->maxFileCount(1)->acceptExtensions('png', 'jpg')->maxFileSize(500*1024);
	$decorator->hasAttachment('fotó');
});

trait Authenticable{
	public function getId(): int{ return $this->id; }
	public function checkPassword($password): bool{ return password_verify($password, $this->password); }
	public function checkRole($role = null): bool{ return (is_null($role) || array_key_exists($role, RoleManager::Service()->resolveGroups($this->groups))); }
}