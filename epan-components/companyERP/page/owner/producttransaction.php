<?php
class page_companyERP_page_owner_producttransaction extends page_companyERP_page_owner_inventory {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$tabs=$this->add('Tabs');
		$tab1=$tabs->addTab('Inward');
		$tab2=$tabs->addTab('Consumed');

		$mer=$this->add('companyERP/Model_Stock_ProductTransaction');
		$mer->addCondition('type','Inward');
		$inward_crud=$tab1->add('CRUD');
		$inward_crud->setModel($mer);

		 $mer1=$this->add('companyERP/Model_Stock_ProductTransaction');
		 $mer1->addCondition('type','Consumed');
		 $consumed_crud=$tab2->add('CRUD');
		 $consumed_crud->setModel($mer1);




			
	}
		
} 