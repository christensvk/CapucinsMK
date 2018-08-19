<?php 
$oForm=new plugin_form($this->oEleve);
$oForm->setMessage($this->tMessage);
?>
<form class="form-horizontal" action="" method="POST" >
	
	<div class="form-group">
		<label class="col-sm-2 control-label">nom</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('nom',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">prenom</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('prenom',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">present</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('present',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">classe</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('classe',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">annee_scolaire</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('annee_scolaire',array('class'=>'form-control')) ?></div>
	</div>
		
	
	

<?php echo $oForm->getToken('token',$this->token)?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-success" value="Modifier" /> <a class="btn btn-link" href="<?php echo $this->getLink('eleve::list')?>">Annuler</a>
	</div>
</div>
</form>

