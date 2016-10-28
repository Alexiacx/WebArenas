<?php $this->assign('title', 'Connexion');?>

<h1>LES COMBATTANTS - E C E</h1>
<h2>Combatter vos amis un enemis grâce à ce jeu!</h2>

<?php echo $this->Form->create('players', array('action' => 'login'));?>

<fieldset id="login">
    <legend>
        <?php echo ('Connecte toi :'); ?>
    </legend>
        <?php 
            echo $this->Form->input('email', array('label' => 'Email : ', 'placeholder' => 'Saisir ton identifiant'));
            echo $this->Form->input('password', array('label' => 'Mot de passe : ', 'placeholder' =>'Saisir ton mot de passe'));
            echo $this->Form->button('Se connecter', array('type' => 'submit'));
        ?>
</fieldset>

<?php echo $this->Form->create('Adduser'); ?>

<fieldset id="register">
    <legend>
        <?php echo ('Pas encore inscrit ?'); ?>
        </legend>
        <?php 
            echo $this->Form->button('S\'inscrire', array('type' => 'submit'));
            echo $this->Form->end();
        ?>
</fieldset>