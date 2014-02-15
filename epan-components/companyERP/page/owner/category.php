<?php
class page_companyErpApp_page_owner_category extends page_companyErpApp_page_owner_main{
	function init()
	{
		parent::init();
	$crud=$this->add('CRUD');
	$crud->setModel('companyErpApp_Master_Category'); 

	}
}