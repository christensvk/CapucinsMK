<?php 
class module_eleve extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tEleve=model_eleve::getInstance()->findAll();
		
		$oView=new _view('eleve::list');
		$oView->tEleve=$tEleve;
		
		
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oEleve=new row_eleve;
		
		$oView=new _view('eleve::new');
		$oView->oEleve=$oEleve;
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oEleve=model_eleve::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('eleve::edit');
		$oView->oEleve=$oEleve;
		$oView->tId=model_eleve::getInstance()->getIdTab();
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _show(){
		$oEleve=model_eleve::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('eleve::show');
		$oView->oEleve=$oEleve;
		
		

		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oEleve=model_eleve::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('eleve::delete');
		$oView->oEleve=$oEleve;
		
		

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
			$oEleve=new row_eleve;	
		}else{
			$oEleve=model_eleve::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('nom','prenom','present','classe','annee_scolaire');
		foreach($tColumn as $sColumn){
			$oEleve->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oEleve->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('eleve::list');
		}else{
			return $oEleve->getListError();
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
	
		$oEleve=model_eleve::getInstance()->findById( _root::getParam('id',null) );
				
		$oEleve->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('eleve::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

