<form class="form-horizontal" action="" method="POST">

	
	<div class="form-group">
		<label class="col-sm-2 control-label">nom</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->nom ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">ville</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->ville ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">codepostal</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->codepostal ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">adresse</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->adresse ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">mail</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->mail ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">tel</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->tel ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">activite</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->activite ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">active</label>
		<div class="col-sm-10"><?php echo $this->oEntreprise->active ?></div>
	</div>
		



<input type="hidden" name="token" value="<?php echo $this->token?>" />
<?php if($this->tMessage and isset($this->tMessage['token'])): echo $this->tMessage['token']; endif;?>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input class="btn btn-danger" type="submit" value="Confirmer la suppression" /> <a class="btn btn-link" href="<?php echo $this->getLink('entreprise::list')?>">Annuler</a>
	</div>
</div>

</form>
