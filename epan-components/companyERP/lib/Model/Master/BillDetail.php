 <?php
namespace companyERP;

class Model_Master_BillDetail extends \Model_Table{
 	 public $table='companyERP_billdetail';
	function init()
	{
		parent::init();
		$this->hasOne('companyERP/Model_Master_Product','product_id');
		$this->hasOne('companyERP/Model_Master_Party','party_id');
		$this->hasOne('companyERP/Model_Master_Bill','bill_id');
		$this->addField('qty');
		$this->addField('rate');

		$this->addExpression('amount')->set('rate * qty');


		$this->hasMany('companyERP/Model_Stock_ProductTransaction','billdetail_id');
		$this->add('dynamic_model/Controller_AutoCreator');

		// $this->addHook('beforeSave',$this);
		



	}
	// function beforeSave(){
	// 	$billdetail=$this->add('companyERP/Model_Master_BillDetail');

	// 	if($this->loaded())
	// 	{
	// 		$billdetail->addCondition('id','<>',$this->id);
	// 	}
	// 		$billdetail->addCondition('name',$this['name']);
	// 		$billdetail->tryLoadAny();
	// 		if($billdetail->loaded())
	// 		{
	// 			throw $this->exception('its already exist');
	// 		}
		
	// }
}