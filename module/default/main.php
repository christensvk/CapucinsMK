<?php 
class module_default extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		$this->oLayout->addModule('menu','menu::index');

	}
	
	public function _index(){
	    $oView=new _view('default::index');
		
		$this->oLayout->add('main',$oView);
	}
	
	public function after(){
		$this->oLayout->show();
	}
}
