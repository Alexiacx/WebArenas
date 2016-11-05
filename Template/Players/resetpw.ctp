<?php $this->assign('title', 'Récupération mdp');?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Veuillez indiquer votre adresse email') ?></legend>
        <?php
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Récupérer')) ?>
    <?= $this->Form->end() ?>

