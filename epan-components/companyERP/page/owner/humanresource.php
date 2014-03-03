<?php
class page_companyERP_page_owner_humanresource extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		 $menu=$this->add('companyERP/View_MyMenu');
		 $menu->addMenuItem('companyERP_page_owner_newrecruit','New Recruitment');
		 $menu->addMenuItem('companyERP_page_owner_showrecruit','Show Recruiters');
		 
			
	}
		//$this->add('CRUD')->setModel('companyERP/Master_Bill');
		
} 