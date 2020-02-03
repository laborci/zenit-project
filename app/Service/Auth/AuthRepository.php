<?php namespace Application\Service\Auth;

use Application\Constant\Permission\Role;
use Application\Ghost\User;
use Zenit\Bundle\DBAccess\Component\Filter\Filter;
use Zenit\Bundle\Zuul\Interfaces\AuthenticableInterface;
use Zenit\Bundle\Zuul\Interfaces\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface{
	public function authLookup($id): ?AuthenticableInterface{
		return ($user = User::pick($id))->checkRole(Role::Active) ? $user : null;
	}
	public function authLoginLookup($login): ?AuthenticableInterface{
		return ($user = User::search(Filter::where(User::F_email . '=$1', $login))->pick())->checkRole(Role::Active) ? $user : null;
	}
}