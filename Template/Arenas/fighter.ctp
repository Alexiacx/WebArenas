<?php $this->assign('title', 'Combattant');?>

<?php if ($combattant) :?>
  <h3><?= __('Fighters') ?></h3>
    <section id="tableau">
    <table class="tableau_vue"> 
        <thead>
            <tr>
                <td class="tableau_vue2"> Name </td>
                <td class="tableau_vue2"> Position x </td>
                <td class="tableau_vue2"> Position y </td>
                <td class="tableau_vue2"> Level </td>
                <td class="tableau_vue2"> XP </td>
                <td class="tableau_vue2"> Vue </td>
                <td class="tableau_vue2"> Force </td>
                <td class="tableau_vue2"> PV Max </td>
                <td class="tableau_vue2"> PV Actuel </td>
                <td class="tableau_vue2"> Dernière Action </td>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <td class="tableau_vue2"><?= $combattant['0']['name'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['coordinate_x'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['coordinate_y'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['level'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['xp'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['skill_sight'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['skill_strength'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['skill_health'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['current_health'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['0']['next_action_time'] ?></td>
                </tr>
            </tbody>
            <?php if ((($combattant['0']['xp']/4)-$combattant['0']['level'])>=0) :?>
            <h3><?= __('Level Up') ?></h3>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('skill_sight', ['type' => 'hidden', 'value' => 1]) ?>
                <?= $this->Form->button(__('+1 Vue')) ?>
                <?= $this->Form->end() ?>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('skill_strength', ['type' => 'hidden', 'value' => 1]) ?>
                <?= $this->Form->button(__('+1 Force')) ?>
                <?= $this->Form->end() ?>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('skill_health', ['type' => 'hidden', 'value' => 3]) ?>
                <?= $this->Form->button(__('+3 PV')) ?>
                <?= $this->Form->end() ?>
            <?php endif ?>
    </table>
</section>
<?php endif ?>
<?php if (!$combattant) :?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ajout d\'un combattant') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
<?php endif ?>