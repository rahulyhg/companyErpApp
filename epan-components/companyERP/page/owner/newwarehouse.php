<?php
class page_companyERP_page_owner_newwarehouse extends page_companyERP_page_owner_home{
	function init(){
		parent::init();

		$cr=$this->add('CRUD');
		$cr->setModel('companyERP/Master_Warehouse');

	}
}
