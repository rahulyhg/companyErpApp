<?php
class page_companyERP_page_owner_humanresource extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		 $menu=$this->add('Menu');
		 $menu->addMenuItem('companyERP_page_owner_newrecruit','Add Staff');
		 $menu->addMenuItem('companyERP_page_owner_showrecruit','Show Staff');
		 $menu->addMenuItem('companyERP_page_owner_attendance','Add Attendance');
		 $menu->addMenuItem('companyERP_page_owner_showattendance','Show Attendance');
		 
			
	}
		//$this->add('CRUD')->setModel('companyERP/Master_Bill');
		
} 