<?php $this->assign('title', 'Combattant');?>

<?php if (isset($combattant)) :?>
  <h2><?= __('Combattant') ?></h2>
    <section class="tableau2">
    <table class="tableau_vue"> 
        <thead>
            <tr>
                <td class="tableau_vue2"> Name </td>
                <td class="tableau_vue2"> Position x </td>
                <td class="tableau_vue2"> Position y </td>
                <td class="tableau_vue2"> Level </td>
                <td class="tableau_vue2"> XP total</td>
                <td class="tableau_vue2"> XP pour level up</td>
                <td class="tableau_vue2"> Vue </td>
                <td class="tableau_vue2"> Force </td>
                <td class="tableau_vue2"> PV Max </td>
                <td class="tableau_vue2"> PV Actuel </td>
                <td class="tableau_vue2"> Dernière Action </td>
            </tr>
        </thead>
            <tbody>
                <tr>
                    <td class="tableau_vue2"><?= $combattant['name'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['coordinate_x'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['coordinate_y'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['level'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['xp'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['xp_levelup'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['skill_sight'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['skill_strength'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['skill_health'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['current_health'] ?></td>
                    <td class="tableau_vue2"><?= $combattant['next_action_time'] ?></td>
                </tr>
            </tbody>
            <?php if ($combattant['xp_levelup']>=4) :?>
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
<?php if (!isset($combattant)) :?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Ajout d\'un combattant') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Ajouter')) ?>
    <?= $this->Form->end() ?>
<?php endif ?>