<?php
class page_companyERP_page_owner_transaction extends page_companyERP_page_owner_inventory {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$tabs=$this->add('Tabs');
		$tab1=$tabs->addTab('Paymentpaid');
		$tab2=$tabs->addTab('paymentreceived');

		$mer=$this->add('companyERP/Model_Master_Transaction');
		$mer->addCondition('transaction_type','Paid');
		$inward_crud=$tab1->add('CRUD');
		$inward_crud->setModel($mer);

		 $mer1=$this->add('companyERP/Model_Master_Transaction');
		 $mer1->addCondition('transaction_type','Received');
		 $consumed_crud=$tab2->add('CRUD');
		 $consumed_crud->setModel($mer1);




			
	}
		
} 