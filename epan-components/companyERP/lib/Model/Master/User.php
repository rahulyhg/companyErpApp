<?php
namespace companyERP;
class Model_Master_User extends \Model_Table{
	public $table="companyERP_user";
	function init(){
		parent::init();
	$this->addField('uname');
	$this->addField('password');
	$this->addField('is_admin');
	$this->add('dynamic_model/Controller_AutoCreator');

}
}
