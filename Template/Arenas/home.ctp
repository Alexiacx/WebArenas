<?php $this->assign('title', 'Connexion');?>

<h2 class="gros_titre">Combattez vos amis et remportez la victoire !</h2>

<fieldset id="login">
    <legend>
        <?php echo ('Connecte toi :'); ?>
    </legend>
        <?php 
            echo $this->Html->link('Se connecter', array('controller' => 'Players', 'action'=>'login'), array('class' => 'button'));
        ?>
</fieldset>

<fieldset id="register">
    <legend>      
        <?php echo ('Pas encore inscrit ?'); ?>
    </legend>
        <?php 
            echo $this->Html->link('S\'inscrire', array('controller' => 'Players', 'action'=>'add'), array('class' => 'button'));
        ?>
</fieldset>