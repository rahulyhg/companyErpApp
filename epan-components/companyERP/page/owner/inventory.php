<?php
class page_companyERP_page_owner_inventory
 extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
  		 parent::init();

         $menu=$this->add('companyERP/View_MyMenu');
		 $menu->addMenuItem('companyERP_page_owner_inward','New Inventory');
		 $menu->addMenuItem('companyERP_page_owner_showinventory','Show Inventory');
		 $menu->addMenuItem('companyERP_page_owner_newwarehouse','New Warehouse');
		 $menu->addMenuItem('companyERP_page_owner_showwarehouse','Show Warehouse');
		 $menu->addMenuItem('companyERP_page_owner_product','Products');

	}
}	
		 