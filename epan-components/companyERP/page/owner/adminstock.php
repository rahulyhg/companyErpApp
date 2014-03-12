<?php
class page_companyERP_page_owner_adminstock extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();


		$cr=$this->add('CRUD');
		$cr->setModel('companyERP/Stock_AdminStock');

			
	}
		//$this->add('CRUD')->setModel('companyERP/Master_Bill');
		
} 