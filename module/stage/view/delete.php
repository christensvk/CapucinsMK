<form class="form-horizontal" action="" method="POST">

	
	<div class="form-group">
		<label class="col-sm-2 control-label">date</label>
		<div class="col-sm-10"><?php echo $this->oStage->date ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">professeur</label>
		<div class="col-sm-10"><?php echo $this->oStage->idProfesseur ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">tuteur</label>
		<div class="col-sm-10"><?php echo $this->oStage->idTuteur ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">&Atilde;&copy;l&Atilde;&uml;ve</label>
		<div class="col-sm-10"><?php echo $this->oStage->idEleve ?></div>
	</div>
		



<input type="hidden" name="token" value="<?php echo $this->token?>" />
<?php if($this->tMessage and isset($this->tMessage['token'])): echo $this->tMessage['token']; endif;?>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input class="btn btn-danger" type="submit" value="Confirmer la suppression" /> <a class="btn btn-link" href="<?php echo $this->getLink('stage::list')?>">Annuler</a>
	</div>
</div>

</form>
