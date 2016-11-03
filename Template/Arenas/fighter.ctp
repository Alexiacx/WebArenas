<?php $this->assign('title', 'Combattant');?>

      <section id="choisir">
    <h1> Choisir son personnage</h1>

    <?= $this->Html->image('comb_1.png', ['class' => 'img_choisir'], ['alt' => 'comb_1']); ?>
    <?= $this->Html->image('comb_2.png', ['class' => 'img_choisir'], ['alt' => 'comb_2']); ?>
    <?= $this->Html->image('comb_3.png', ['class' => 'img_choisir'], ['alt' => 'comb_3']); ?>
    <?= $this->Html->image('comb_4.png', ['class' => 'img_choisir'], ['alt' => 'comb_4']); ?>
    <?= $this->Html->image('comb_5.png', ['class' => 'img_choisir'], ['alt' => 'comb_5']); ?>

  </section>
  <section id="perso_1">
    <h1> Mon premier combattant </h1>
      <?= $this->Html->image('comb_1.png', ['class' => 'img_comb'], ['alt' => 'comb_1']); ?>
    <table>
        <tr>
            <td>Vue =</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Force =</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Point de vie =</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Point d'expérience =</td>
            <td>0</td>
        </tr>
    </table>

  </section>
  <section id="perso_2">
    <h1> Mon deuxième combattant </h1>
    <?= $this->Html->image('comb_2.png', ['class' => 'img_comb'], ['alt' => 'comb_2']); ?>
      
        <table>
        <tr>
            <td>Vue =</td>
            <td>0</td>
        </tr>
        <tr>
            <td>Force =</td>
            <td>1</td>
        </tr>
        <tr>
            <td>Point de vie =</td>
            <td>3</td>
        </tr>
        <tr>
            <td>Point d'expérience =</td>
            <td>0</td>
        </tr>
    </table>
  </section>


  <h3><?= __('Fighters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coordinate_x') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coordinate_y') ?></th>
                <th scope="col"><?= $this->Paginator->sort('level') ?></th>
                <th scope="col"><?= $this->Paginator->sort('xp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skill_sight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skill_strength') ?></th>
                <th scope="col"><?= $this->Paginator->sort('skill_health') ?></th>
                <th scope="col"><?= $this->Paginator->sort('current_health') ?></th>
                <th scope="col"><?= $this->Paginator->sort('next_action_time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fighters as $fighter): ?>
            <tr>
                <td><?= h($fighter->name) ?></td>
                <td><?= $this->Number->format($fighter->coordinate_x) ?></td>
                <td><?= $this->Number->format($fighter->coordinate_y) ?></td>
                <td><?= $this->Number->format($fighter->level) ?></td>
                <td><?= $this->Number->format($fighter->xp) ?></td>
                <td><?= $this->Number->format($fighter->skill_sight) ?></td>
                <td><?= $this->Number->format($fighter->skill_strength) ?></td>
                <td><?= $this->Number->format($fighter->skill_health) ?></td>
                <td><?= $this->Number->format($fighter->current_health) ?></td>
                <td><?= h($fighter->next_action_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fighter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fighter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fighter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fighter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>