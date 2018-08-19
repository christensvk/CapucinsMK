<table class="table table-striped">
	<tr>
		
		<th>nom</th>
		
		<th>prenom</th>
		
		<th>mail</th>
		
		<th>tel</th>
		
		<th>entreprise</th>
		
		<th></th>
	</tr>
	<?php if($this->tTuteur):?>
		<?php foreach($this->tTuteur as $oTuteur):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php echo $oTuteur->nom ?></td>
		
		<td><?php echo $oTuteur->prenom ?></td>
		
		<td><?php echo $oTuteur->mail ?></td>
		
		<td><?php echo $oTuteur->tel ?></td>
		
		<td><?php echo $oTuteur->idEntreprise ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('tuteur::edit',array(
										'id'=>$oTuteur->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-danger" href="<?php echo $this->getLink('tuteur::delete',array(
										'id'=>$oTuteur->getId()
									) 
							)?>">Delete</a>
			| 
<a class="btn btn-default" href="<?php echo $this->getLink('tuteur::show',array(
										'id'=>$oTuteur->getId()
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

<p><a class="btn btn-primary" href="<?php echo $this->getLink('tuteur::new') ?>">New</a></p>
			
