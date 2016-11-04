<?php $this->assign('title', 'Vision');?>

<br/><br/>

<section class="tableau">
	<table class="tableau_vue">
		<tr>
			<td class="tableau_vue2"> </td>
			<td class="tableau_vue2"> Name </td>
			<td class="tableau_vue2"> Position x </td>
			<td class="tableau_vue2"> Position y </td>
			<td class="tableau_vue2"> Distance </td>
		</tr>
		<tr>
			<td class="tableau_vue2"> Combattant </td>
			<td class="tableau_vue2"><?= $combattant->name ?></td>
			<td class="tableau_vue2"><?= $combattant->coordinate_x ?></td>
			<td class="tableau_vue2"><?= $combattant->coordinate_y ?></td>
			<td class="tableau_vue2">0</td>
		</tr>
		<?php foreach ($ennemies as $ennemy) :?>
			<tr>
				<td class="tableau_vue2"> Ennemi </td>
				<td class="tableau_vue2"><?= $ennemy->name ?></td>
				<td class="tableau_vue2"><?= $ennemy->coordinate_x ?></td>
				<td class="tableau_vue2"><?= $ennemy->coordinate_y ?></td>
				<td class="tableau_vue2"><?= abs(($ennemy->coordinate_x - $combattant->coordinate_x))+abs(($ennemy->coordinate_y-$combattant->coordinate_y)) ?></td>
			</tr>
		<?php endforeach ?>
	</table>
</section>

<section id="bouton_deplacement">
	<h2>Boutons  de  deplacement</h2>
	<table id="bouton_deplacement2">
		<tr>
			<td></td>
			<td><input type="submit" value="Haut" class="bouton"></td>
		    <td></td>
		</tr>
		<tr>
			<td><input type="submit" value="Gauche" class="bouton"></td>
			<td><input type="submit" value="Bas" class="bouton"></td>
			<td><input type="submit" value="Droite" class="bouton"></td>
		</tr>
	</table>
</section>

<section id="bouton_attaque">
	<h2>Boutons  d' attaque</h2>
	<table id="bouton_attaque2">
		<tr>
			<td></td>
			<td><input type="submit" value="Haut" class="bouton"></td>
		    <td></td>
		</tr>
		<tr>
			<td><input type="submit" value="Gauche" class="bouton"></td>
			<td><input type="submit" value="Bas" class="bouton"></td>
			<td><input type="submit" value="Droite" class="bouton"></td>
		</tr>
	</table>
</section>