<?php
class page_companyERP_page_owner_category extends page_companyERP_page_owner_inventory{
	function page_index(){
	$crud=$this->add('CRUD');
	$crud->setModel('companyERP/Master_Category');
		if($crud->grid)
		{
			$crud->grid->addColumn('expander','product');
	
		}
	}
		function page_product()
	{
		$this->api->stickyGET('companyERP_category_id');
    	$cat=$this->add('companyERP/Model_Master_Product');
		$cat->addCondition('category_id',$_GET['companyERP_category_id']);
		$crud=$this->add('CRUD');
		$crud->setModel($cat);	
	}



	
}
