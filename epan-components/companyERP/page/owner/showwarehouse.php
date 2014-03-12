<?php
class page_companyERP_page_owner_showwarehouse extends page_companyERP_page_owner_home{
	function init(){
		parent::init();

		$cr=$this->add('Grid');
		$cr->setModel('companyERP/Master_Warehouse');

	}
}
