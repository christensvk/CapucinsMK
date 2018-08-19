<form class="form-horizontal" action="" method="POST" >
	
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
		
	
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
			 <a class="btn btn-default" href="<?php echo $this->getLink('stage::list')?>">Retour</a>
		</div>
	</div>
</form>
