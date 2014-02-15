<?php
class Model_Master_Staff extends Model_Table
{
	public $table="staff";
	function init()
	{
		parent::init();
		$this->hasOne('Master_Department','department_id');
		$this->addField('name');
		$this->add('dynamic_model/Controller_AutoCreator');
		$this->addHook('beforeSave',$this);
	}
	

	}