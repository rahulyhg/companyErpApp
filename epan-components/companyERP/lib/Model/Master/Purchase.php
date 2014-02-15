<?php
namespace companyERP;

class Model_Master_Purchase extends \Model_Table
{
	public $table="companyERP_purchase";

	function init()
	{
        parent::init();

        $this->addField('po_no');
        $this->addField('vendor_no');
        $this->addField('po_date');
        $this->addField('po_type');
        $this->addField('ship_to_location');
        $this->addField('bill_to_location');
        $this->addField('ship_via');
        $this->addField('description');

        $this->add('dynamic_model/Controller_AutoCreator');

        $this->addHook('beforeSave',$this);
	}

	function beforeSave()
	{
		
	}
}
