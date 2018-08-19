<?php 
class module_stage extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tStage=model_stage::getInstance()->findAll();
		
		$oView=new _view('stage::list');
		$oView->tStage=$tStage;
		
		
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oStage=new row_stage;
		
		$oView=new _view('stage::new');
		$oView->oStage=$oStage;
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oStage=model_stage::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('stage::edit');
		$oView->oStage=$oStage;
		$oView->tId=model_stage::getInstance()->getIdTab();
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _show(){
		$oStage=model_stage::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('stage::show');
		$oView->oStage=$oStage;
		
		

		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oStage=model_stage::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('stage::delete');
		$oView->oStage=$oStage;
		
		

		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	

	private function processSave(){
		if(!_root::getRequest()->isPost() ){ //si ce n'est pas une requete POST on ne soumet pas
			return null;
		}
		
		$oPluginXsrf=new plugin_xsrf();
		if(!$oPluginXsrf->checkToken( _root::getParam('token') ) ){ //on verifie que le token est valide
			return array('token'=>$oPluginXsrf->getMessage() );
		}
	
		$iId=_root::getParam('id',null);
		if($iId==null){
			$oStage=new row_stage;	
		}else{
			$oStage=model_stage::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('date','idProfesseur','idTuteur','idEleve');
		foreach($tColumn as $sColumn){
			$oStage->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oStage->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('stage::list');
		}else{
			return $oStage->getListError();
		}
		
	}
	
	
	public function processDelete(){
		if(!_root::getRequest()->isPost() ){ //si ce n'est pas une requete POST on ne soumet pas
			return null;
		}
		
		$oPluginXsrf=new plugin_xsrf();
		if(!$oPluginXsrf->checkToken( _root::getParam('token') ) ){ //on verifie que le token est valide
			return array('token'=>$oPluginXsrf->getMessage() );
		}
	
		$oStage=model_stage::getInstance()->findById( _root::getParam('id',null) );
				
		$oStage->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('stage::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

