<?php
class page_companyERP_page_owner_attendance extends page_companyERP_page_owner_humanresource {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

		$form=$this->add('Form');
		$form->addField('DatePicker','date');
		$form->addSubmit('Get List');

		$grid=$this->add('Grid');
		$attendance=$this->add('companyERP/Model_Master_Attendance');

		if($_GET['date']){
			$attendance->addCondition('date',$_GET['date']);
			$new_att=$this->add('companyERP/Model_Master_Attendance');
			$staff=$this->add('companyERP/Model_Master_Staff');

			foreach ($staff as $junk) {
				$new_att=$staff->ref('companyERP/Master_Attendance');		
			if($staff->ref('companyERP/Master_Attendance')->count()->getOne()<=0){
				$new_att['staff_id']=$staff->id;
				$new_att['date']=$_GET['date'];
				$new_att->save();
				}

			$new_att->addCondition('date',$_GET['date']);
			$new_att->tryLoadAny();
			if(!$new_att->loaded()){

				$new_att->save();
			}


			}

		}
		$grid->setModel($attendance);

		if($_GET['swap_attendance']){
			$attn=$this->add('companyERP/Model_Master_Attendance');
			$attn->swap_attendance($_GET['swap_attendance']);
			$grid->js()->reload()->execute();
		}

		$grid->addColumn('button','swap_attendance');

		if($form->isSubmitted()){


			$grid->js()->reload(array('date'=>$form['date']))->execute();
		}

	}
}

