<table class="table table-striped">
	<tr>
		
		<th>nom</th>
		
		<th>ville</th>
		
		<th>codepostal</th>
		
		<th>adresse</th>
		
		<th>mail</th>
		
		<th>tel</th>
		
		<th>activite</th>
		
		<th>active</th>
		
		<th></th>
	</tr>
	<?php if($this->tEntreprise):?>
		<?php foreach($this->tEntreprise as $oEntreprise):?>
		<tr <?php echo plugin_tpl::alternate(array('','class="alt"'))?>>
			
		<td><?php echo $oEntreprise->nom ?></td>
		
		<td><?php echo $oEntreprise->ville ?></td>
		
		<td><?php echo $oEntreprise->codepostal ?></td>
		
		<td><?php echo $oEntreprise->adresse ?></td>
		
		<td><?php echo $oEntreprise->mail ?></td>
		
		<td><?php echo $oEntreprise->tel ?></td>
		
		<td><?php echo $oEntreprise->activite ?></td>
		
		<td><?php echo $oEntreprise->active ?></td>
		
			<td>
				
				
<a class="btn btn-success" href="<?php echo $this->getLink('entreprise::edit',array(
										'id'=>$oEntreprise->getId()
									) 
							)?>">Edit</a>
			| 
<a class="btn btn-danger" href="<?php echo $this->getLink('entreprise::delete',array(
										'id'=>$oEntreprise->getId()
									) 
							)?>">Delete</a>
			| 
<a class="btn btn-default" href="<?php echo $this->getLink('entreprise::show',array(
										'id'=>$oEntreprise->getId()
									) 
							)?>">Show</a>
			
				
				
			</td>
		</tr>	
		<?php endforeach;?>
	<?php else:?>
		<tr>
			<td colspan="9">Aucune ligne</td>
		</tr>
	<?php endif;?>
</table>

<p><a class="btn btn-primary" href="<?php echo $this->getLink('entreprise::new') ?>">New</a></p>
			
