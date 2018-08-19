<?php 
class module_tuteur extends abstract_module{

    public function before(){
        $this->oLayout=new _layout('bootstrap');

        $this->oLayout->addModule('menu','menu::index');
    }


    public function _index(){
        //on considere que la page par defaut est la page de listage
        $this->_list();
    }


    public function _list(){

        $tTuteur=model_tuteur::getInstance()->findAll();
        
        foreach($tTuteur as $oTuteur){
            $oTuteur -> idEntreprise = $oTuteur->findEntreprise()->nom;
        }

        $oView=new _view('tuteur::list');
        $oView->tTuteur=$tTuteur;



        $this->oLayout->add('main',$oView);

    }



    public function _new(){
        $tMessage=$this->processSave();

        $oTuteur=new row_tuteur;

        $oView=new _view('tuteur::new');
        $oView->oTuteur=$oTuteur;



        $oPluginXsrf=new plugin_xsrf();
        $oView->token=$oPluginXsrf->getToken();
        $oView->tMessage=$tMessage;

        $this->oLayout->add('main',$oView);
    }



    public function _edit(){
        $tMessage=$this->processSave();

        $oTuteur=model_tuteur::getInstance()->findById( _root::getParam('id') );

        $oView=new _view('tuteur::edit');
        $oView->oTuteur=$oTuteur;
        $oView->tId=model_tuteur::getInstance()->getIdTab();



        $oPluginXsrf=new plugin_xsrf();
        $oView->token=$oPluginXsrf->getToken();
        $oView->tMessage=$tMessage;

        $this->oLayout->add('main',$oView);
    }



    public function _show(){
        $oTuteur=model_tuteur::getInstance()->findById( _root::getParam('id') );

        $entreprise = array(
            "nom" => $oTuteur->findEntreprise()->nom,
            "ville" => $oTuteur->findEntreprise()->ville
        );

        $oTuteur->idEntreprise=$entreprise;

        $oView=new _view('tuteur::show');
        $oView->oTuteur=$oTuteur;



        $this->oLayout->add('main',$oView);
    }



    public function _delete(){
        $tMessage=$this->processDelete();

        $oTuteur=model_tuteur::getInstance()->findById( _root::getParam('id') );

        $oView=new _view('tuteur::delete');
        $oView->oTuteur=$oTuteur;



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
            $oTuteur=new row_tuteur;	
        }else{
            $oTuteur=model_tuteur::getInstance()->findById( _root::getParam('id',null) );
        }

        $tColumn=array('nom','prenom','mail','tel','idEntreprise');
        foreach($tColumn as $sColumn){
            $oTuteur->$sColumn=_root::getParam($sColumn,null) ;
        }


        if($oTuteur->save()){
            //une fois enregistre on redirige (vers la page liste)
            _root::redirect('tuteur::list');
        }else{
            return $oTuteur->getListError();
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

        $oTuteur=model_tuteur::getInstance()->findById( _root::getParam('id',null) );

        $oTuteur->delete();
        //une fois enregistre on redirige (vers la page liste)
        _root::redirect('tuteur::list');

    }


    public function after(){
        $this->oLayout->show();
    }


}

