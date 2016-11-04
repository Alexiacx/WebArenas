<?php $this->assign('title', 'Journal');?>
<?php 
foreach($journal as $entree)
{	
	echo '<li>'.('Nom de mon joueur :') .$entree->name.'</li>';
	echo '<li>'.('Cordonnée en x :') .$entree->coordinate_x.'</li>';
	echo '<li>'.('Cordonnée en y :') .$entree->coordinate_y.'</li>';
	echo '<li>'.('Date :') .$entree->date.'</li>';

}
?> 

<h2><?= __('Journal') ?></h2>

<section class="tableau">
	<table class="tableau_vue">
		<tr>
			<td class="tableau_vue2"> Name </td>
			<td class="tableau_vue2"> Position x </td>
			<td class="tableau_vue2"> Position y </td>
			<td class="tableau_vue2"> Date </td>
		</tr>
		<tr>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
		</tr>
	</table>
</section>