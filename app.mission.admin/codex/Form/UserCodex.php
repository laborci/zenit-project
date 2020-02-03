<?php namespace Application\AdminCodex\Form;

use Application\AdminCodex\GhostHelper\UserGhostCodexHelper;
use Application\Constant\Permission\Role;
use Zenit\Bundle\Codex\Component\Codex\Dictionary\Dictionary;
use Zenit\Bundle\Codex\Component\Codex\Field;
use Zenit\Bundle\Codex\Component\Codex\FormDecorator;
use Zenit\Bundle\Codex\Component\Codex\FormHandler\FormHandler;
use Zenit\Bundle\Codex\Component\Codex\ListHandler\ListHandler;
use Zenit\Bundle\Codex\Interfaces\ItemDataImporterInterface;

class UserCodex extends UserGhostCodexHelper{

	protected function decorator(FormDecorator $decorator){
		$decorator->setIcons('fal fa-user');
		$decorator->setTitle('Felhasználók');
		$decorator->setRole(Role::ManageUser);
	}

	protected function listHandler(ListHandler $list){
		$list->addJSPlugin('ListButtonAddNew');
		$list->add($this->id)->visible(false);
		$list->add($this->email);
		$list->add($this->groups)->dictionary(new Dictionary($this->groups->options));
	}

	protected function formHandler(FormHandler $form){
		$form->setLabelField($this->name);
		$form->addJSPlugin('FormButtonSave');
		$form->addJSPlugin('FormButtonDelete', 'FormButtonReload', 'FormButtonFiles');
		$form->setItemDataImporter(new class implements ItemDataImporterInterface{
			public function importItemData($item, $data){
				/** @var \Application\Ghost\User $item */
				$item->import($data);
				if ($data['newpassword']) $item->password = $data['newpassword'];
				return $item;
			}
		});

		$form->addAttachmentCategory($this->avatar);
		$form->addAttachmentCategory($this->fotó);

		$main = $form->section('Adatok');
		$main->input('string', $this->name);
		$main->input('string', $this->email);
		$main->input('string', new Field('newpassword'), 'új jelszó');
		$main->input('checkboxes', $this->groups)
		('options', $this->groups->options);
	}


}
