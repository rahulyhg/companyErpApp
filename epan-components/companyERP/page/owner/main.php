<?php
class page_companyERP_page_owner_main extends page_componentBase_page_owner_main{
	function init(){
		 parent::init();


		$menu=$this->add('Menu',null);
		$menu->addMenuItem('companyERP_page_owner_branch','Branch');
		$menu->addMenuItem('companyERP_page_owner_department','Department');
		$menu->addMenuItem('companyERP_page_owner_staff','Staff');
		$menu->addMenuItem('companyERP_page_owner_post','Post');
		$menu->addMenuItem('companyERP_page_owner_product','Product');
		$menu->addMenuItem('companyERP_page_owner_category','Category');
		$menu->addMenuItem('companyERP_page_owner_features','Features');
		$menu->addMenuItem('companyERP_page_owner_parties','Parties');
		$menu->addMenuItem('companyERP_page_owner_order','Order');
		$menu->addMenuItem('companyERP_page_owner_transaction','Transaction');
		//$menu->addMenuItem('companyERP_page_owner_sales','Sales');
		//$menu->addMenuItem('companyERP_page_owner_purchase','Purchase');
	
	}
} 