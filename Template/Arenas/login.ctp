<?php echo $this->Form->create('Arenas', array('action' => 'login'));?>
<fieldset id="login">
    <legend>
        <?php echo ('Connecte toi :'); ?>
    </legend>
        <?php 
            echo $this->Form->input('email', array('label' => 'Identifiant : ', 'placeholder' => 'Saisir ton email'));
            echo $this->Form->input('password', array('label' => 'Mot de passe : ', 'placeholder' =>'Saisir ton mot de passe'));
            echo $this->Form->button('Se connecter', array('type' => 'submit','class' => 'button'));
            echo $this->Form->end();
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