	<?php
class page_companyERP_page_owner_staff extends page_companyERP_page_owner_home {
     //main page extend problm.....tab redundancy 
	function init()
	{
		parent::init();

	// $c=$this->add('companyERP/Model_Master_Department');
	// //$s=$this->add('companyERP/Model_Master_Department');
 //    $col=$this->add('H3')->setAttr('align','center')->set('Staff Detail');
 //    $col=$this->add('Columns');
 //    $co1=$col->addColumn(6);
    
	// 	$form=$co1->add('Form');

	// 	$department_field=$field_class=$form->addField('dropdown','department')->setEmptyText('----');
		
	// 	$field_class->setModel($c);


	// 	$v=$form->add('H5','after_field');
	// 	$v->set('');
	// 	if($_GET['dept_id']){
	// 		$c->load($_GET['dept_id']);

	// 		$v->set("Department No :".$c['dept_no']);
	// 	}

	// 	$department_field->js('change',$v->js()->reload(array('dept_id'=>$department_field->js()->val())));
		$crud=$this->add('CRUD');
		 $crud->setModel('companyERP/Master_Staff');
		//$form->addSubmit('GetList');



		// $grid=$this->add('Grid');


		// if($_GET['filter']){
		// 	if($_GET['department'])$s->addCondition('department_id',$_GET['department']);
		// 	if($_GET['department1'])$s->addCondition('id',$_GET['department1']);
		// }else{
		// 	// $s->addCondition('department1_id',-1);
		// }
		// $grid->setModel($s);// $grid->addColumn('Expander','deposit','Fee Deposit');
		// // $grid->addFormatter('father_name','hindi');

		// if($form->isSubmitted()){
		// 	$grid->js()->reload(array("department"=>$form->get('department'),
		// 								"department1"=>$form->get('department1'),
		// 								"filter"=>1))->execute();

		// }



   
    }
	}

		