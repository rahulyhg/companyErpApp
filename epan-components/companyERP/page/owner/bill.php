<?php
class page_companyERP_page_owner_bill extends page_companyERP_page_owner_inventory{
	function page_index(){

		//$menu= $this->add('Menu',null);
	  //  $menu->addMenuItem('companyERP_page_owner_salesbill','Sales Bill');
	 //   $menu->addMenuItem('companyERP_page_owner_purchasebill','Purchase Bill');	
	
	$crud=$this->add('CRUD');
	$crud->setModel('companyERP/Master_Bill');
	if($crud->grid){
			$crud->grid->addColumn('expander','Received');
	
		}
		if($crud->grid){
			$crud->grid->addColumn('expander','Billdetail');
	
		}
 		



 		 if($crud->grid){
 		$crud->grid->addMethod('format_tamount',function($g,$field){
 		$g->current_row[$field]=($g->current_row['gross_total']*$g->current_row['taxpercentage'])/100;
     });
 	$crud->grid->addColumn('tamount','taxamount');
 		 }

		 if($crud->grid){
 		$crud->grid->addMethod('format_Total',function($g,$field){
 		$g->current_row[$field]=($g->current_row['gross_total']+$g->current_row['taxamount'])-$g->current_row['discountamount'];
     });
 	$crud->grid->addColumn('Total','Netamount');
 		 }
		

	}
	function page_Received()
	{
		$this->api->stickyGET('companyERP_bill_id');
    	$bill=$this->add('companyERP/Model_Master_Transaction');
		$bill->addCondition('bill_id',$_GET['companyERP_bill_id']);
		$crud=$this->add('CRUD');
		$crud->setModel($bill);	
	}
function page_Billdetail()
	{
		$this->api->stickyGET('companyERP_bill_id');
    	$bill=$this->add('companyERP/Model_Master_BillDetail');
		$bill->addCondition('bill_id',$_GET['companyERP_bill_id']);
		$crud=$this->add('CRUD');
		$crud->setModel($bill);	
	}
		
} 