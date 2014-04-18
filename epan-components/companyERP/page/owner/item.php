<?php
class page_companyERP_page_owner_item extends page_companyERP_page_owner_home {
	function init(){
		parent::init();

		$this->add('H3')->setHtml('Manage ItemGroup<small><a href="?page=companyERP_page_owner_setup">Stock Section</a></small>');
		$crud=$this->add('CRUD');
		$crud->setModel('companyERP/Master_Item');
			
			if($crud->grid){
				$crud->grid->addMethod('format_currentstock',function($g,$f){
					$g->current_row[$f]=$g->current_row['total_inward']-$g->current_row['total_consume'];
				});
			}
			$crud->grid->addColumn('currentstock','current_stock');

	}
		
} 