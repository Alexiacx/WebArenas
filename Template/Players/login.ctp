<?php $this->assign('title', 'Connexion');?>

<h2 class="gros_titre">Combattez vos amis et remportez la victoire !</h2>

<?php echo $this->Form->create();?>

<fieldset id="login">
    <legend>
        <?php echo ('Connecte toi :'); ?>
    </legend>
        <?php 
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->button('Se connecter', ['class' => 'btn validateform']);
            echo $this->Form->end();
        ?>
    <legend>      
        <?php echo ('Oublie de ton mdp ?'); ?>
    </legend>
        <?= $this->Html->link('Reset password', array('controller' => 'Players', 'action'=>'resetpw'), array('class' => 'button')) ?>
</fieldset>

<fieldset id="register">
    <legend>      
        <?php echo ('Pas encore inscrit ?'); ?>
    </legend>
        <?php 
            echo $this->Html->link('S\'inscrire', array('controller' => 'Players', 'action'=>'add'), array('class' => 'button'));
        ?>
</fieldset>

