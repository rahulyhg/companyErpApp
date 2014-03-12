<?php
class page_companyERP_page_owner_consumed extends page_companyERP_page_owner_home{
	function init(){
		parent::init();
	$form=$this->add('Form');
	$form->setModel('companyERP/Stock_Consumed');
	$form->addSubmit('Consume');


	}
}
