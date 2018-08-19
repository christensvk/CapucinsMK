<form class="form-horizontal" action="" method="POST">

	
	<div class="form-group">
		<label class="col-sm-2 control-label">nom</label>
		<div class="col-sm-10"><?php echo $this->oEleve->nom ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">prenom</label>
		<div class="col-sm-10"><?php echo $this->oEleve->prenom ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">present</label>
		<div class="col-sm-10"><?php echo $this->oEleve->present ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">classe</label>
		<div class="col-sm-10"><?php echo $this->oEleve->classe ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">annee_scolaire</label>
		<div class="col-sm-10"><?php echo $this->oEleve->annee_scolaire ?></div>
	</div>
		



<input type="hidden" name="token" value="<?php echo $this->token?>" />
<?php if($this->tMessage and isset($this->tMessage['token'])): echo $this->tMessage['token']; endif;?>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<input class="btn btn-danger" type="submit" value="Confirmer la suppression" /> <a class="btn btn-link" href="<?php echo $this->getLink('eleve::list')?>">Annuler</a>
	</div>
</div>

</form>
