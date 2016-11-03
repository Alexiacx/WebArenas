<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fighter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fighter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fighters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Guilds'), ['controller' => 'Guilds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Guild'), ['controller' => 'Guilds', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tools'), ['controller' => 'Tools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tool'), ['controller' => 'Tools', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fighters form large-9 medium-8 columns content">
    <?= $this->Form->create($fighter) ?>
    <fieldset>
        <legend><?= __('Edit Fighter') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('player_id', ['options' => $players]);
            echo $this->Form->input('coordinate_x');
            echo $this->Form->input('coordinate_y');
            echo $this->Form->input('level');
            echo $this->Form->input('xp');
            echo $this->Form->input('skill_sight');
            echo $this->Form->input('skill_strength');
            echo $this->Form->input('skill_health');
            echo $this->Form->input('current_health');
            echo $this->Form->input('next_action_time', ['empty' => true]);
            echo $this->Form->input('guild_id', ['options' => $guilds, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
