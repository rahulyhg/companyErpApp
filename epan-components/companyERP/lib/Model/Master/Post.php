<?php
class Model_Master_Post extends Model_Table
{
	public $table="post";
	function init()
	{
		parent::init();
		$this->hasOne('Master_Department','department_id');

		$this->hasOne('Master_Staff','staff_id');		
		$this->addField('name');

		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
	}
	
}