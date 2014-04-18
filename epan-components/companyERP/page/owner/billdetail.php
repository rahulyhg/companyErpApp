<?php
class page_companyERP_page_owner_billdetail extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();


		$cr=$this->add('CRUD');
		$cr->setModel('companyERP/Master_BillDetail');
		if($crud->grid)
 {
 		$crud->grid->addMethod('format_Total',function($g,$field){
 		$g->current_row[$field]=$g->current_row['qty']*$g->current_row['rate'];
     });
 	$crud->grid->addColumn('Total','total');
 		 }

			
	}
		//$this->add('CRUD')->setModel('companyERP/Master_Bill');
		
} 