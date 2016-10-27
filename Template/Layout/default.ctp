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

$cakeDescription = 'CakePHP: the rapid development php framework';
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

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('login.css') ?>
    <?= $this->Html->css('index.css') ?>
    <?= $this->Html->css('fighter.css') ?>
    <?= $this->Html->css('sight.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <title> 
      Combattant-ECE
    </title>
</head>
<body>
    <header>
        <a href="index.ctp">Deconnexion</a>
        <a href="help.ctp">Les règles</a>
        <a href="diary.ctp">Le journal</a>
        <a href="fighter.ctp">Mon combattant</a>
    </header>
    <form action ="recherche.html" method="post" >               
            <input name ="search" type="text" placeholder="Rechercher un utilisateur"/>
            <input  name="submit" type="submit" value="Rechercher">    
        </form>

    <?= $this->Flash->render() ?>

    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
        
    <footer>
        © Gr2-09-CG - Alexia CHASSIGNEUX, Romain TICHADOU, Perpetua NESARAJAH, Matthieu Hannequin - Novembre 2016
    </footer>
</body>
</html>
