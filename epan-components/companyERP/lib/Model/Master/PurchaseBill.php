<?php
namespace companyERP;
class Model_Master_PurchaseBill extends Model_Master_Bill{
function init()
	{
		parent::init();
		// $this->addField('name')->mandatory('can not be null');


		$this->addCondition('bill_type','Purchase');





	}
}