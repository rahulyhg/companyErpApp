<?php
namespace companyERP;
class Model_Master_Parties extends \Model_Table
{
	public $table="companyERP_parties";
	function init()
	{
		parent::init();
		$this->addField('name');
		$this->has
		$this->add('dynamic_model/Controller_AutoCreator');
		//$this->addHook('beforeSave',$this);
	}
	/*function beforeSave
	{
		$parties=$this->add('Model_Master_parties');
		if($this_loaded())
		{
			$parties->addCondition('id','<>',$this->id);
		}
			$parties->addCondition('name',$this['name']);
			$parties->tryloadAny();
			if($parties->loaded())
			{
				throw $this->exception('its already exist');
			}

	function beforeDelete()//modification remaining
	{
		if($this->ref('Department')->count()->getOne)()>0)
{
	$this->api->js()->univ)()->errorMessage)('plese delete dept contain');
	}
}*/
		
	}
