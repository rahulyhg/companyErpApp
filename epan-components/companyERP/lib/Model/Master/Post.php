<?php
namespace companyERP;

class Model_Master_Post extends \Model_Table
{
	public $table="companyERP_post";
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Master_Department','department_id');

		$this->hasMany('companyERP/Master_Staff','staff_id');		
		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
		//$this->addHook('beforeSave',$this);
	}
	
}