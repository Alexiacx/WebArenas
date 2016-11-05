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
            <li> <?php echo $this->Html->link('Accueil', '/Arenas/accueil');?> </li> 
            <li> <?php echo $this->Html->link('Le journal', '/Arenas/diary');?> </li> 
            <li> <?php echo $this->Html->link('Vision', '/Arenas/sight');?> </li> 
            <li> <?php echo $this->Html->link('Mon combattant', '/Arenas/fighter'); ?> </li> 
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li> <?php echo $this->Html->link('Deconnection', '/Players/logout');?> </li> 
           
        </ul>
    </header>

    <h1>LES COMBATTANTS - E C E</h1>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
        
    <footer>
        <?php echo $this->Html->link('Git Log', array('controller' => 'Players', 'action'=>'gitlog'), array('class'=>'enligne'));?>
        © Gr2-09-CG - A. Chassigneux, R. Tichadou, P. Nesarajah, M. Hannequin - Novembre 2016 - 
        <?php echo $this->Html->link('Le site en ligne', 'http://jeutropstyleduprojetwebecegroupe209.fr/webarena/', array('target'=>'_blank', 'class'=>'enligne'));?>
    </footer>
</body>
</html>