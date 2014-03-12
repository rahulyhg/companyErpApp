<?php
namespace companyERP;
class Model_Master_Manufacturing extends \Model_Table
{
	public $table="companyERP_manufacturing";
	function init()
	{
		parent::init();

		$this->hasOne('companyERP/Model_Master_Product','product_id');

		$this->addField('name')->mandatory('can not be null');

		$this->addField('qty');
		$this->addField('date')->type('date');




		$this->addHook('beforeSave',$this);

		$this->add('dynamic_model/Controller_AutoCreator');

	}
	
	function beforeSave()
    {
		   $man=$this->add('companyERP/Model_Master_Manufacturing');

	       if($this->loaded()) 
		    {
			  $man->addCondition('id','<>',$this->id);
		   
		     }

			$man->addCondition('name',$this['name']);
			$man->tryLoadAny();
			
			if($man->loaded())
			{
				throw $this->exception('its already exist');
			}
		
	 }
     
 }    