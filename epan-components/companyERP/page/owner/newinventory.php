<?php
class page_companyERP_page_owner_newinventory extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$this->add('CRUD')->setModel('companyERP/Inventory_Iteminward_Stockentry');

			
	}
		
} 