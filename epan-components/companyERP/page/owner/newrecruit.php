<?php
class page_companyERP_page_owner_newrecruit extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$this->add('CRUD')->setModel('companyERP/Master_Staff');

			
	}
		
} 