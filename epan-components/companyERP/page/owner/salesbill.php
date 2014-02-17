<?php
class page_companyERP_page_owner_salesbill extends page_componentBase_page_owner_main {
	function init()
	{
		parent::init();

		$this->add('CRUD')->setModel('companyERP/Master_salesbill');
	}
} 