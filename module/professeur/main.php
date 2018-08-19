<?php 
class module_professeur extends abstract_module{
	
	public function before(){
		$this->oLayout=new _layout('bootstrap');
		
		$this->oLayout->addModule('menu','menu::index');
	}
	
	
	public function _index(){
	    //on considere que la page par defaut est la page de listage
	    $this->_list();
	}
	
	
	public function _list(){
		
		$tProfesseur=model_professeur::getInstance()->findAll();
		
		$oView=new _view('professeur::list');
		$oView->tProfesseur=$tProfesseur;
		
		
		
		$this->oLayout->add('main',$oView);
		 
	}
		
	
	
	public function _new(){
		$tMessage=$this->processSave();
	
		$oProfesseur=new row_professeur;
		
		$oView=new _view('professeur::new');
		$oView->oProfesseur=$oProfesseur;
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
			
	
	
	public function _edit(){
		$tMessage=$this->processSave();
		
		$oProfesseur=model_professeur::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('professeur::edit');
		$oView->oProfesseur=$oProfesseur;
		$oView->tId=model_professeur::getInstance()->getIdTab();
		
		
		
		$oPluginXsrf=new plugin_xsrf();
		$oView->token=$oPluginXsrf->getToken();
		$oView->tMessage=$tMessage;
		
		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _show(){
		$oProfesseur=model_professeur::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('professeur::show');
		$oView->oProfesseur=$oProfesseur;
		
		

		$this->oLayout->add('main',$oView);
	}
		
	
	
	public function _delete(){
		$tMessage=$this->processDelete();

		$oProfesseur=model_professeur::getInstance()->findById( _root::getParam('id') );
		
		$oView=new _view('professeur::delete');
		$oView->oProfesseur=$oProfesseur;
		
		

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
			$oProfesseur=new row_professeur;	
		}else{
			$oProfesseur=model_professeur::getInstance()->findById( _root::getParam('id',null) );
		}
		
		$tColumn=array('nom','prenom','present');
		foreach($tColumn as $sColumn){
			$oProfesseur->$sColumn=_root::getParam($sColumn,null) ;
		}
		
		
		if($oProfesseur->save()){
			//une fois enregistre on redirige (vers la page liste)
			_root::redirect('professeur::list');
		}else{
			return $oProfesseur->getListError();
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
	
		$oProfesseur=model_professeur::getInstance()->findById( _root::getParam('id',null) );
				
		$oProfesseur->delete();
		//une fois enregistre on redirige (vers la page liste)
		_root::redirect('professeur::list');
		
	}
		
	
	public function after(){
		$this->oLayout->show();
	}
	
	
}

