<?php
class page_companyERP_page_owner_company extends page_companyERP_page_owner_main {
	function init(){
		parent::init();

		$this->add('CRUD')->setModel('companyERP/Master_Company');
	}
} 