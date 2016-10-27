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