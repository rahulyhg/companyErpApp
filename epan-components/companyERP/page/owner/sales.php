<?php
class page_companyERP_page_owner_sales
 extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
  		 parent::init();

         $menu=$this->add('companyERP/View_MyMenu');

		 $menu->addMenuItem('companyERP_page_owner_newsales','New Sales');
		 $menu->addMenuItem('companyERP_page_owner_showsales','Show Sales');

	}
}	
		 