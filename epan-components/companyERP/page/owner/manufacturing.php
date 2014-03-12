<?php
class page_companyERP_page_owner_manufacturing extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$form=$this->add('Form');
		$manu=$this->setModel('companyERP/Master_Manufacturing');

		$grid=$this->add('CRUD');
		$grid->setModel($manu);
		

			
	}
		
} 