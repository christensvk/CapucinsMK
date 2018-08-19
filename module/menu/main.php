<?php
Class module_menu extends abstract_moduleembedded{
		
	public function _index(){
		
		$tLink=array(
			'Eleves' => 'eleve::index',
'Entreprises' => 'entreprise::index',
'Professeurs' => 'professeur::index',
'Stages' => 'stage::index',
'Tuteurs' => 'tuteur::index',

		);
		
		$oView=new _view('menu::index');
		$oView->tLink=$tLink;
		
		return $oView;
	}
}
