<?php $this->assign('title', 'Vision');?>

<br/><br/>

<section class="tableau">

	<?php if((time()-$combattant['next_action_time']->toUnixString())/$PA['tpsRecupPA'] >5) :?>
		<label>PA : <?= $PA['maxPA'] ?></label>
	<?php else :?>
		<label>PA : <?= (time()-$combattant['next_action_time']->toUnixString())/$PA['tpsRecupPA']%60 ?></label>
	<?php endif ?>

	<table class="tableau_vue">
		<tr>
			<td class="tableau_vue2"> </td>
			<td class="tableau_vue2"> Name </td>
			<td class="tableau_vue2"> Position x </td>
			<td class="tableau_vue2"> Position y </td>
			<td class="tableau_vue2"> PV </td>
			<td class="tableau_vue2"> Distance </td>
		</tr>
		<tr>
			<td class="tableau_vue2"> Combattant </td>
			<td class="tableau_vue2"><?= $combattant->name ?></td>
			<td class="tableau_vue2"><?= $combattant->coordinate_x ?></td>
			<td class="tableau_vue2"><?= $combattant->coordinate_y ?></td>
			<td class="tableau_vue2"><?= $combattant->current_health.'/'.$combattant['skill_health'] ?></td>
			<td class="tableau_vue2">0</td>
		</tr>
		<?php foreach ($ennemies as $ennemy) :?>
			<tr>
				<td class="tableau_vue2"> Ennemi </td>
				<td class="tableau_vue2"><?= $ennemy->name ?></td>
				<td class="tableau_vue2"><?= $ennemy->coordinate_x ?></td>
				<td class="tableau_vue2"><?= $ennemy->coordinate_y ?></td>
				<td class="tableau_vue2"><?= $ennemy->current_health.'/'.$ennemy->skill_health ?></td>
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
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('move', ['type' => 'hidden', 'value' => 'up']) ?>
                <?= $this->Form->button(__('Haut')) ?>
                <?= $this->Form->end() ?>
            </td>
		    <td></td>
		</tr>
		<tr>
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('move', ['type' => 'hidden', 'value' => 'left']) ?>
                <?= $this->Form->button(__('Gauche')) ?>
                <?= $this->Form->end() ?>
            </td>
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('move', ['type' => 'hidden', 'value' => 'down']) ?>
                <?= $this->Form->button(__('Bas')) ?>
                <?= $this->Form->end() ?>
            </td>
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('move', ['type' => 'hidden', 'value' => 'right']) ?>
                <?= $this->Form->button(__('Droite')) ?>
                <?= $this->Form->end() ?>
            </td>
		</tr>
	</table>
</section>

<section id="bouton_attaque">
	<h2>Boutons  d' attaque</h2>
	<table id="bouton_attaque2">
		<tr>
			<td></td>
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('attack', ['type' => 'hidden', 'value' => 'up']) ?>
                <?= $this->Form->button(__('Haut')) ?>
                <?= $this->Form->end() ?>
            </td>
		    <td></td>
		</tr>
		<tr>
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('attack', ['type' => 'hidden', 'value' => 'left']) ?>
                <?= $this->Form->button(__('Gauche')) ?>
                <?= $this->Form->end() ?>
            </td>
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('attack', ['type' => 'hidden', 'value' => 'down']) ?>
                <?= $this->Form->button(__('Bas')) ?>
                <?= $this->Form->end() ?>
            </td>
			<td><?= $this->Form->create() ?>
                <?= $this->Form->input('attack', ['type' => 'hidden', 'value' => 'right']) ?>
                <?= $this->Form->button(__('Droite')) ?>
                <?= $this->Form->end() ?>
            </td>
		</tr>
	</table>
</section>