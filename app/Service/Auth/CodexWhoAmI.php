<?php namespace Application\Service\Auth;

use Application\Ghost\User;
use Zenit\Bundle\Codex\Interfaces\CodexWhoAmIInterface;
use Zenit\Bundle\Zuul\Component\WhoAmI;

class CodexWhoAmI extends WhoAmI implements CodexWhoAmIInterface{
	public function getName(): string{return User::pick($this())->name;}
	public function getAvatar(): string{
		$user = User::pick($this());
		return (User::$model->getAttachmentStorage()->hasCategory('avatar') && $user->avatar->count) ? $user->avatar->first->thumbnail->crop(64, 64)->png : '';
	}
}