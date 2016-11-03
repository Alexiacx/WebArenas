<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fighter'), ['action' => 'edit', $fighter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fighter'), ['action' => 'delete', $fighter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fighter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fighters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fighter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Guilds'), ['controller' => 'Guilds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Guild'), ['controller' => 'Guilds', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tools'), ['controller' => 'Tools', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tool'), ['controller' => 'Tools', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fighters view large-9 medium-8 columns content">
    <h3><?= h($fighter->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fighter->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player') ?></th>
            <td><?= $fighter->has('player') ? $this->Html->link($fighter->player->id, ['controller' => 'Players', 'action' => 'view', $fighter->player->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guild') ?></th>
            <td><?= $fighter->has('guild') ? $this->Html->link($fighter->guild->name, ['controller' => 'Guilds', 'action' => 'view', $fighter->guild->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fighter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coordinate X') ?></th>
            <td><?= $this->Number->format($fighter->coordinate_x) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coordinate Y') ?></th>
            <td><?= $this->Number->format($fighter->coordinate_y) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= $this->Number->format($fighter->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Xp') ?></th>
            <td><?= $this->Number->format($fighter->xp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Sight') ?></th>
            <td><?= $this->Number->format($fighter->skill_sight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Strength') ?></th>
            <td><?= $this->Number->format($fighter->skill_strength) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Skill Health') ?></th>
            <td><?= $this->Number->format($fighter->skill_health) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Current Health') ?></th>
            <td><?= $this->Number->format($fighter->current_health) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Next Action Time') ?></th>
            <td><?= h($fighter->next_action_time) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Messages') ?></h4>
        <?php if (!empty($fighter->messages)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Fighter Id From') ?></th>
                <th scope="col"><?= __('Fighter Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fighter->messages as $messages): ?>
            <tr>
                <td><?= h($messages->id) ?></td>
                <td><?= h($messages->date) ?></td>
                <td><?= h($messages->title) ?></td>
                <td><?= h($messages->message) ?></td>
                <td><?= h($messages->fighter_id_from) ?></td>
                <td><?= h($messages->fighter_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Messages', 'action' => 'view', $messages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Messages', 'action' => 'edit', $messages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Messages', 'action' => 'delete', $messages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $messages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tools') ?></h4>
        <?php if (!empty($fighter->tools)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Bonus') ?></th>
                <th scope="col"><?= __('Coordinate X') ?></th>
                <th scope="col"><?= __('Coordinate Y') ?></th>
                <th scope="col"><?= __('Fighter Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fighter->tools as $tools): ?>
            <tr>
                <td><?= h($tools->id) ?></td>
                <td><?= h($tools->type) ?></td>
                <td><?= h($tools->bonus) ?></td>
                <td><?= h($tools->coordinate_x) ?></td>
                <td><?= h($tools->coordinate_y) ?></td>
                <td><?= h($tools->fighter_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tools', 'action' => 'view', $tools->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tools', 'action' => 'edit', $tools->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tools', 'action' => 'delete', $tools->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tools->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
