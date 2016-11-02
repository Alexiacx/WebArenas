<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Combattant-ECE';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('webarenas.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
    <header>
        <ul> 
            <li> <?php echo $this->Html->link('Les règles', '/Arenas/help');?> </li> 
            <li> <?php echo $this->Html->link('Le journal', '/Arenas/diary');?> </li> 
            <li> <?php echo $this->Html->link('Vision', '/Arenas/sight');?> </li> 
            <li> <?php echo $this->Html->link('Mon combattant', '/Arenas/fighter'); ?> </li> 
            <li> <?php echo $this->Form->input('', array('placeholder' => 'Rechercher un utilisateur'));?> </li> 
            <?php echo $this->Form->button('Rechercher', array('type' => 'submit'));?> </li> 
            <?php echo $this->Form->end();?>
            <li> <?php echo $this->Html->link('Deconnexion', '/Arenas/home');?> </li> 
           
        </ul>
    </header>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
        
    <footer>
        © Gr2-09-CG - Alexia Chassigneux, Romain Tichadou, Perpetua Nesarajah, Matthieu Hannequin - Novembre 2016
    </footer>
</body>
</html>