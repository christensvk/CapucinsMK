<?php 
$oForm=new plugin_form($this->oEntreprise);
$oForm->setMessage($this->tMessage);
?>
<form class="form-horizontal" action="" method="POST" >
	
	<div class="form-group">
		<label class="col-sm-2 control-label">nom</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('nom',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">ville</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('ville',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">codepostal</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('codepostal',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">adresse</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('adresse',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">mail</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('mail',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">tel</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('tel',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">activite</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('activite',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">active</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('active',array('class'=>'form-control')) ?></div>
	</div>
		
	
	

<?php echo $oForm->getToken('token',$this->token)?>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input type="submit" class="btn btn-success" value="Modifier" /> <a class="btn btn-link" href="<?php echo $this->getLink('entreprise::list')?>">Annuler</a>
	</div>
</div>
</form>

