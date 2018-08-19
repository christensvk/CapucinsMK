<table class="table table-striped">
	<tr>
		
		<th>date</th>
		
		<th>professeur</th>
		
		<th>tuteur</th>
		
		<th>&Atilde;&copy;l&Atilde;&uml;ve</th>
		
		<th></th>
	</tr>
	<?php if($this->tStage):?>
		<?php foreach($this->tStage as $oStage):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php echo $oStage->date ?></td>
		
		<td><?php echo $oStage->idProfesseur ?></td>
		
		<td><?php echo $oStage->idTuteur ?></td>
		
		<td><?php echo $oStage->idEleve ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('stage::edit',array(
										'id'=>$oStage->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-danger" href="<?php echo $this->getLink('stage::delete',array(
										'id'=>$oStage->getId()
									) 
							)?>">Delete</a>
			| 
<a class="btn btn-default" href="<?php echo $this->getLink('stage::show',array(
										'id'=>$oStage->getId()
									) 
							)?>">Show</a>
			
				
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="5">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>

<p><a class="btn btn-primary" href="<?php echo $this->getLink('stage::new') ?>">New</a></p>
			
