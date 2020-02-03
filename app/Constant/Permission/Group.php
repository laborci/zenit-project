<?php namespace Application\Constant\Permission;

class Group{
	const visitor = [Role::Active];
	const admin = [Group::visitor, Role::ManageUser, Role::AdminAccess];
}

const not = '-';