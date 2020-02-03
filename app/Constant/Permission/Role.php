<?php namespace Application\Constant\Permission;

use Zenit\Core\Constant\Component\Constant;
/**
 * @prefix false
 * @const active
 * @const admin access
 * @const manage user
 * @const save user
 */
class Role extends Constant
{
    const Active = 'Active';
    const AdminAccess = 'AdminAccess';
    const ManageUser = 'ManageUser';
}
