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
        <?php foreach($combattant as $com) :?>
            <tbody>
                <tr>
                    <td><?= $com->name ?></td>
                    <td><?= $com->coordinate_x ?></td>
                    <td><?= $com->coordinate_y ?></td>
                    <td><?= $com->level ?></td>
                    <td><?= $com->xp ?></td>
                    <td><?= $com->skill_sight ?></td>
                    <td><?= $com->skill_strength ?></td>
                    <td><?= $com->skill_health ?></td>
                    <td><?= $com->current_health ?></td>
                    <td><?= $com->next_action_time ?></td>
                </tr>
            </tbody>
            <?php if ((($com->xp/4)-$com->level)>=0) :?>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('level', ['type' => 'hidden', 'value' => 1]) ?>
                <?= $this->Form->button(__('LevelUp')) ?>
                <?= $this->Form->end() ?>
            <?php endif ?>
        <?php endforeach ?>
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