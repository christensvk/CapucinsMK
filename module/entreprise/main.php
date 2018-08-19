<?php 
class module_entreprise extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tEntreprise=model_entreprise::getInstance()->findAll();
		
		$oView=new _view('entreprise::list');
		$oView->tEntreprise=$tEntreprise;
		
		
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oEntreprise=new row_entreprise;
		
		$oView=new _view('entreprise::new');
		$oView->oEntreprise=$oEntreprise;
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oEntreprise=model_entreprise::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('entreprise::edit');
		$oView->oEntreprise=$oEntreprise;
		$oView->tId=model_entreprise::getInstance()->getIdTab();
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _show(){
		$oEntreprise=model_entreprise::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('entreprise::show');
		$oView->oEntreprise=$oEntreprise;
		
		

		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oEntreprise=model_entreprise::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('entreprise::delete');
		$oView->oEntreprise=$oEntreprise;
		
		

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
			$oEntreprise=new row_entreprise;	
		}else{
			$oEntreprise=model_entreprise::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('nom','ville','codepostal','adresse','mail','tel','activite','active');
		foreach($tColumn as $sColumn){
			$oEntreprise->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oEntreprise->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('entreprise::list');
		}else{
			return $oEntreprise->getListError();
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
	
		$oEntreprise=model_entreprise::getInstance()->findById( _root::getParam('id',null) );
				
		$oEntreprise->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('entreprise::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

