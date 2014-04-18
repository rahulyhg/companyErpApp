<?php
class page_companyERP_page_owner_product extends page_companyERP_page_owner_home {
	function page_index(){
		

		//$this->add('H3')->setHtml('Manage ItemGroup<small><a href="?page=companyERP_page_owner_setup">Stock Section</a></small>');

		$crud=$this->add('CRUD');
		$crud->setModel('companyERP/Master_Product');
		// if($crud->grid)
		// $crud->grid->addColumn('expander','itemProducts');

		// //$drop1=$form->addField('dropdown','item_1')->setEmptytext('-----');	
		// //$drop2=$form->addField('dropdown','item_2')->setEmptytext('-----');	
		//$drop3=$form->addField('dropdown','item_3')->setEmptytext('-----');	

		// $item1=$drop1->add('companyERP/Model_Master_Item');
		// $drop1->setModel($item1);
		// $drop2->setModel($item1);
		// $drop3->setModel($item1);
		// $form->addSubmit('Make Product');

	}

	// function page_itemProducts(){
	// 	$this->api->stickyGET('companyERP_product_id');
	// 	$pro=$this->add('companyERP/Model_Master_ItemProducts');
	// 	$pro->addCondition('product_id',$_GET['companyERP_product_id']);
	// 	$crud=$this->add('CRUD');
	// 	$crud->setModel($pro);
	// }	
} 