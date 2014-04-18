<?php

class page_companyERP_page_owner_inward extends 
page_companyERP_page_owner_home{
	function init(){

		parent::init();

		$col=$this->add('Columns');
		$col1=$col->addColumn(8);

		$form=$col1->add('Form');
		$form->setModel('companyERP/Stock_Inward');

		$drop1=$form->addField('dropdown','rawmaterial')->setEmptytext('-----');			
		$adminstock=$drop1->add('companyERP/Model_Stock_AdminStock');
		$drop1->setModel($adminstock);
    	$form->addSubmit('Inward');
    	
    	if($form->isSubmitted()){
		
		$inward=$this->add('companyERP/Model_Stock_Inward');
		$inward->makeNewInventory($form->getAllFields());
    	$form->js()->reload()->execute();
    	
    	}

	}

	// function isSubmitted()
	// {
	// }
}
