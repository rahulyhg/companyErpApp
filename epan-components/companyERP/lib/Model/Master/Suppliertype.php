<?php
namespace companyERP;
class Model_Master_Suppliertype extends \Model_Table{
	public $table="companyERP_suppliertype";
	function init(){
		parent::init();
		$this->addField('name');
        $this->hasMany('companyERP/Master_Supplier','suppliertype_id');                                                                                              
		$this->add('dynamic_model/Controller_AutoCreator');
		
		//$this->addHook('beforeSave',$this);
		//$this->addHook('beforeDelete',$this);
	}
}