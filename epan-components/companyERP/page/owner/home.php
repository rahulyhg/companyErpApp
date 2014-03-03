<?php
class page_companyERP_page_owner_home extends page_componentBase_page_owner_main{
	function init(){
		 parent::init();
		 $this->h1->add('H1')->setElement('a')
		 ->setAttr('href','?page=companyERP_page_owner_main')
		 ->set($this->component_namespace);
  	// $btn=$this->add('Button')->set('Go Back');
  	// $btn->js('click')->goback();
		}


	}