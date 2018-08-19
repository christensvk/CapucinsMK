<table class="table table-striped">
	<tr>
		
		<th>nom</th>
		
		<th>prenom</th>
		
		<th>present</th>
		
		<th></th>
	</tr>
	<?php if($this->tProfesseur):?>
		<?php foreach($this->tProfesseur as $oProfesseur):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php echo $oProfesseur->nom ?></td>
		
		<td><?php echo $oProfesseur->prenom ?></td>
		
		<td><?php echo $oProfesseur->present ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('professeur::edit',array(
										'id'=>$oProfesseur->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-danger" href="<?php echo $this->getLink('professeur::delete',array(
										'id'=>$oProfesseur->getId()
									) 
							)?>">Delete</a>
			| 
<a class="btn btn-default" href="<?php echo $this->getLink('professeur::show',array(
										'id'=>$oProfesseur->getId()
									) 
							)?>">Show</a>
			
				
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="4">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>

<p><a class="btn btn-primary" href="<?php echo $this->getLink('professeur::new') ?>">New</a></p>
			
