<?php
class page_companyERP_page_owner_consumed extends page_companyERP_page_owner_home{
	function init(){
		parent::init();
	$form=$this->add('Form');
	$form->setModel('companyERP/Stock_Consumed');
	$form->addSubmit('Consume');

	if($form->isSubmitted()){
		
		$inward=$this->add('companyERP/Model_Stock_Consumed');
		$inward->makeNewConsumed($form->getAllFields());
    	$form->js()->reload()->execute();
    	
    	}


	}
}
