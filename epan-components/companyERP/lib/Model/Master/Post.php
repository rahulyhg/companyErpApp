<?php
namespace companyERP;
class Model_Master_Post extends \Model_Table
{
	public $table="companyERP_post";
	function init()
	{
		parent::init();
		

		$this->addField('name');
		$this->hasMany('companyERP/Master_Staff','post_id');		

		$this->add('dynamic_model/Controller_AutoCreator');
	    $this->addHook('beforeSave',$this);
	}
	function beforeSave()
	{
		$post=$this->add('companyERP/Model_Master_Post');
		if($this->loaded())
		 {
			$post->addCondition('id','<>',$this->id);
		 }
			$post->addCondition('name',$this['name']);
			$post->tryloadAny();

		if($post->loaded())
		 {
				throw $this->exception('its already exist');
		 }
		
	}
	
}