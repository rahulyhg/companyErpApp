<?php
namespace companyERP;

class Model_Master_Attendance extends \Model_Table
{
	public $table="companyERP_attendance";
	function init()
	{
		parent::init();


		$this->hasOne('companyERP/Master_Staff','staff_id');

		$this->addField('date')->type('date');
		$this->addField('is_present')->type('boolean')->defaultValue(true);


		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function swap_attendance($attn){

		$old_att=$this->add('companyERP/Model_Master_Attendance');
		$old_att->load($attn);
		$old_att['is_present']=!$old_att['is_present'];
		$old_att->save();
	}
}
