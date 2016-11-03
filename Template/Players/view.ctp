<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Player'), ['action' => 'edit', $player->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Player'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fighters'), ['controller' => 'Fighters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fighter'), ['controller' => 'Fighters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="players view large-9 medium-8 columns content">
    <h3><?= h($player->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($player->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($player->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($player->password) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fighters') ?></h4>
        <?php if (!empty($player->fighters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Player Id') ?></th>
                <th scope="col"><?= __('Coordinate X') ?></th>
                <th scope="col"><?= __('Coordinate Y') ?></th>
                <th scope="col"><?= __('Level') ?></th>
                <th scope="col"><?= __('Xp') ?></th>
                <th scope="col"><?= __('Skill Sight') ?></th>
                <th scope="col"><?= __('Skill Strength') ?></th>
                <th scope="col"><?= __('Skill Health') ?></th>
                <th scope="col"><?= __('Current Health') ?></th>
                <th scope="col"><?= __('Next Action Time') ?></th>
                <th scope="col"><?= __('Guild Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($player->fighters as $fighters): ?>
            <tr>
                <td><?= h($fighters->id) ?></td>
                <td><?= h($fighters->name) ?></td>
                <td><?= h($fighters->player_id) ?></td>
                <td><?= h($fighters->coordinate_x) ?></td>
                <td><?= h($fighters->coordinate_y) ?></td>
                <td><?= h($fighters->level) ?></td>
                <td><?= h($fighters->xp) ?></td>
                <td><?= h($fighters->skill_sight) ?></td>
                <td><?= h($fighters->skill_strength) ?></td>
                <td><?= h($fighters->skill_health) ?></td>
                <td><?= h($fighters->current_health) ?></td>
                <td><?= h($fighters->next_action_time) ?></td>
                <td><?= h($fighters->guild_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fighters', 'action' => 'view', $fighters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fighters', 'action' => 'edit', $fighters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fighters', 'action' => 'delete', $fighters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fighters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
