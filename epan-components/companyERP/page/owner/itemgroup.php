<?php
class page_companyERP_page_owner_itemgroup extends page_companyERP_page_owner_home {
	function init(){
		parent::init();

		$this->add('H3')->setHtml('Manage ItemGroup<small><a href="?page=companyERP_page_owner_setup">Stock Section</a></small>');
		$this->add('CRUD')->setModel('companyERP/Master_ItemGroup');
			
	}
		
} 