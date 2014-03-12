<?php
class page_companyERP_page_owner_bill extends page_companyERP_page_owner_main {
	function init()
	{
		parent::init();

		$menu= $this->add('Menu',null);
	    $menu->addMenuItem('companyERP_page_owner_salesbill','Sales Bill');
	    $menu->addMenuItem('companyERP_page_owner_purchasebill','Purchase Bill');	
	}
		//$this->add('CRUD')->setModel('companyERP/Master_Bill');
		
} 