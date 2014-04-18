<?php
class page_companyERP_page_owner_party extends page_companyERP_page_owner_inventory {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$this->add('CRUD')->setModel('companyERP/Master_Party');
			
	}
		
} 