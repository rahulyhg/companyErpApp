<?php
class page_companyERP_page_owner_main extends page_componentBase_page_owner_main{
	function init(){
		 parent::init();
		 $this->h1->add('H1')->setElement('a')
		 ->setAttr('href','?page=companyERP_page_owner_main')
		 ->set($this->component_namespace);
		 
		 $menu=$this->add('companyERP/View_MyMenu');
		 //$menu->addMenuItem('companyERP_page_owner_company','Company');
		 $menu->addMenuItem('companyERP_page_owner_humanresource','HR');
		 $menu->addMenuItem('setup','Finance');
		 $menu->addMenuItem('setup','Purchase');
		 $menu->addMenuItem('companyERP_page_owner_sales','Sales');
		 $menu->addMenuItem('companyERP_page_owner_inventory','Inventory');
		 $menu->addMenuItem('setup','Reports');
		 $menu->addMenuItem('companyERP_page_owner_setup','Setup');
	}
} 