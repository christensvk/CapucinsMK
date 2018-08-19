<form class="form-horizontal" action="" method="POST" >
	
	<div class="form-group">
		<label class="col-sm-2 control-label">nom</label>
		<div class="col-sm-10"><?php echo $this->oProfesseur->nom ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">prenom</label>
		<div class="col-sm-10"><?php echo $this->oProfesseur->prenom ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">present</label>
		<div class="col-sm-10"><?php echo $this->oProfesseur->present ?></div>
	</div>
		
	
	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
			 <a class="btn btn-default" href="<?php echo $this->getLink('professeur::list')?>">Retour</a>
		</div>
	</div>
</form>
