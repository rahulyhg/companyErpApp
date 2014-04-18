<?php
namespace companyERP;
class Model_Master_Transaction extends \Model_Table{
	public $table="companyERP_transaction";
	function init(){
		parent::init();
		
		$this->hasOne('companyERP/Master_Bill','bill_id');
		$this->hasOne('companyERP/Master_Party','party_id');
		$this->addField('name');
		$this->addField('transaction_type')->enum(array('Paid','Recieived'));
		$this->addField('date')->type('date');
		$this->addField('mode_of_transaction');
		$this->addField('amount');
		$this->addField('moderemark');

		$this->add('dynamic_model/Controller_AutoCreator');

		$this->addHook('beforeSave',$this);
	}
	function beforeSave(){
		$transaction=$this->add('companyERP/Model_Master_Transaction');
		if($this->loaded()){
		$transaction->addCondition('id','<>',$this->id);
		}

		$transaction->addCondition('name',$this['name']);
		$transaction->tryLoadAny();

		if($transaction->loaded()){
		throw $this->exception('its already exist');
			}
		
	}

}