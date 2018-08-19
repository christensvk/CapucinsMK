<?php 
$oForm=new plugin_form($this->oStage);
$oForm->setMessage($this->tMessage);
?>
<form class="form-horizontal" action="" method="POST" >
	
	<div class="form-group">
		<label class="col-sm-2 control-label">date</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('date',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">professeur</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('idProfesseur',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">tuteur</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('idTuteur',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">&Atilde;&copy;l&Atilde;&uml;ve</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('idEleve',array('class'=>'form-control')) ?></div>
	</div>
		
	
	

<?php echo $oForm->getToken('token',$this->token)?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-success" value="Modifier" /> <a class="btn btn-link" href="<?php echo $this->getLink('stage::list')?>">Annuler</a>
	</div>
</div>
</form>

