<?php

namespace companyERP;

class Plugins_AuthenticationCheck extends \componentBase\Plugin{
	public $namespace = 'companyERP';

	function init(){
		parent::init();
		
		$this->addHook('website-page-loaded',array($this,'AuthenticatePage'));
	}

	function AuthenticatePage($obj,&$page){

		$subpage = $_GET['subpage'];
		// throw new \Exception($_GET['cairo_ps_surface_dsc_begin_page_setup(surface)e'], 1);
		

		// ONLY WORKS FOR PAGES CONTAINS "xsocial-" IN PAGE
		// DO NOT CHECK FOR xsocial-login PAGE

		$allowed_page=array('xcompanyerp-stocklogin','xcompanyerp-hrlogin','xcompanyerp-payrolllogin');

		if(strpos($subpage,	'xcompanyerp-') === 0 AND !in_array($subpage, $allowed_page)){
			$allowed_page = array(
					'stock'=>array(),
					'hr'=>array(),
					'payroll'=>array()
				);

			$login_page=array(
					'stock'=>'xcompanyerp-xcompanyerp-stocklogin',
					'hr'=>'xcompanyerp-xcompanyerp-hrlogin',
					'payroll'=>'xcompanyerp-xcompanyerp-payrolllogin'
				);

			$model=array(
					'stock'=>'StockManager',
					'hr'=>'HRManager',
					'payroll'=>'PayrollManager',
				);
			
			// IF session has logged_in_user value meanse user is there
			// load auth in api->xsocialauth and login this user
			$logged_in_user = $this->api->recall('logged_in_user',false);
			$type_of_user = $this->api->recall('type_of_user',false);
			
			if(!$logged_in_user){
				if(in_array($subpage, $allowed_page['branch'])){
					$this->api->redirect($this->api->url(null,array('subpage'=>$login_page['branch'])));
				}
				
				$this->api->redirect($this->api->url(null,array('subpage'=>'home')));
			}
			
			// if(!in_array($subpage, $allowed_page[$type_of_user])){				
			// 	$this->api->redirect($this->api->url(null,array('subpage'=>$login_page[$type_of_user])));
			// }

			$xcompanyerpauth =$this->add('BasicAuth',array('is_default_auth'=>false));
			$xcompanyerpauth->setModel('companyERP/'.$model['stock'],'email','password');
			$this->api->xcompanyerpauth = $xcompanyerpauth;
				
			// TODO :: Set cu_id = null when logout

			$xcompanyerpauth->login($logged_in_user);

		}
	}

	function getDefaultParams($new_epan){}
}