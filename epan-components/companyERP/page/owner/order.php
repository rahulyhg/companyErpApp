<?php
class page_companyERP_page_owner_order extends page_companyERP_page_owner_main{
	function init(){
		parent::init();
	$menu= $this->add('Menu',null);
	$menu->addMenuItem('companyERP_page_owner_purchase','Purchase');
	$menu->addMenuItem('companyERP_page_owner_sales','Sales');	
}	
}