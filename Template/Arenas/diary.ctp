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
