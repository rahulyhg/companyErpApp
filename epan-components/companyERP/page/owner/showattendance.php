<?php
class page_companyERP_page_owner_showattendance extends page_companyERP_page_owner_humanresource {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$this->add('Grid')->setModel('companyERP/Master_Attendance');
			
	}
		
} 