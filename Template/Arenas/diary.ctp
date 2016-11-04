<?php $this->assign('title', 'Journal');?>

<h2><?= __('Journal') ?></h2>

<section class="tableau">
	<table class="tableau_vue">
		<thead>
			<tr>
				<td class="tableau_vue2"> Name </td>
				<td class="tableau_vue2"> Position x </td>
				<td class="tableau_vue2"> Position y </td>
				<td class="tableau_vue2"> Date </td>
			</tr>
		</thead>
		<tbody>
			<?php foreach($journal as $entree) :?>
				<tr>
					<td class="tableau_vue2"> <?= $entree->name ?> </td>
					<td class="tableau_vue2"> <?= $entree->coordinate_x ?> </td>
					<td class="tableau_vue2"> <?= $entree->coordinate_y ?> </td>
					<td class="tableau_vue2"> <?= $entree->date ?> </td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</section>