<table class="table table-striped">
	<tr>
		
		<th>nom</th>
		
		<th>prenom</th>
		
		<th>present</th>
		
		<th>classe</th>
		
		<th>annee_scolaire</th>
		
		<th></th>
	</tr>
	<?php if($this->tEleve):?>
		<?php foreach($this->tEleve as $oEleve):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php echo $oEleve->nom ?></td>
		
		<td><?php echo $oEleve->prenom ?></td>
		
		<td><?php echo $oEleve->present ?></td>
		
		<td><?php echo $oEleve->classe ?></td>
		
		<td><?php echo $oEleve->annee_scolaire ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('eleve::edit',array(
										'id'=>$oEleve->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-danger" href="<?php echo $this->getLink('eleve::delete',array(
										'id'=>$oEleve->getId()
									) 
							)?>">Delete</a>
			| 
<a class="btn btn-default" href="<?php echo $this->getLink('eleve::show',array(
										'id'=>$oEleve->getId()
									) 
							)?>">Show</a>
			
				
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="6">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>

<p><a class="btn btn-primary" href="<?php echo $this->getLink('eleve::new') ?>">New</a></p>
			
