<?php namespace Application\Ghost;

use Zenit\Bundle\Ghost\Attachment\Component\AttachmentCategoryManager;
use Zenit\Bundle\DBAccess\Component\Filter\Filter;
use Zenit\Bundle\Ghost\Entity\Component\Field;
use Zenit\Bundle\Ghost\Entity\Component\Ghost;
use Zenit\Bundle\Ghost\Entity\Component\Model;

/**
 * @method static GhostUserFinder search(Filter $filter = null)
 * @property-read $id
 * @property-read AttachmentCategoryManager $avatar
 */
abstract class UserGhost extends Ghost{

	/** @var Model */
	public static $model;
	const Table = "user";
	const ConnectionName = "default";

	const V_groups_visitor = "visitor";
	const V_groups_admin = "admin";

	const F_id = "id";
	const F_name = "name";
	const F_email = "email";
	const F_password = "password";
	const F_groups = "groups";

	const A_avatar = "avatar";

	/** @var int id */
	protected $id;
	/** @var string name */
	public $name;
	/** @var string email */
	public $email;
	/** @var string password */
	public $password;
	/** @var array groups */
	public $groups;



	final static protected function createModel(): Model{
		$model = new Model(get_called_class());
		$model->addField("id", Field::TYPE_ID,NULL);
		$model->addField("name", Field::TYPE_STRING,NULL);
		$model->addField("email", Field::TYPE_STRING,NULL);
		$model->addField("password", Field::TYPE_STRING,NULL);
		$model->addField("groups", Field::TYPE_SET,array (
  0 => 'visitor',
  1 => 'admin',
));
		$model->protectField("id");
		return $model;
	}
}

/**
 * Nobody uses this class, it exists only to help the code completion
 * @method \Application\Ghost\User[] collect($limit = null, $offset = null)
 * @method \Application\Ghost\User[] collectPage($pageSize, $page, &$count = 0)
 * @method \Application\Ghost\User pick()
 */
abstract class GhostUserFinder extends \Zenit\Bundle\DBAccess\Component\Finder\AbstractFinder {}