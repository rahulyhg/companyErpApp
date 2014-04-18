<?php
class page_companyERP_page_owner_inventory
 extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
  		 parent::init();

         $menu=$this->add('Menu');
		 $menu->addMenuItem('companyERP_page_owner_category','Category');
		 $menu->addMenuItem('companyERP_page_owner_party','Party');
		 $menu->addMenuItem('companyERP_page_owner_bill','Sales Bill');
		 $menu->addMenuItem('companyERP_page_owner_bill','Purchase Bill');
		 $menu->addMenuItem('companyERP_page_owner_producttransaction','Product Transaction');
		 $menu->addMenuItem('companyERP_page_owner_transaction','General Accounting');

	}
}	
		 