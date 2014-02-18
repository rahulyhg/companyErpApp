<?php
namespace companyERP;

class Model_Master_Billdetail extends Master_Bill
{
   
	function init()
	{
		parent::init();

		$this->addField('name')->mandatory('can not be null');

		$this->add('dynamic_model/Controller_AutoCreator');


	}
}