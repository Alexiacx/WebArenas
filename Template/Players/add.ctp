<?php $this->assign('title', 'Inscription');?>

<h1>LES COMBATTANTS - E C E</h1>
<h2>Combatter vos amis un enemis grâce à ce jeu!</h2>

<?php echo $this->Form->create();?>

<fieldset id="login">
    <legend>
        <?php echo ('Creer ton compte :'); ?>
    </legend>
        <?php 
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('password_confirm', ['type' => 'password']);
            echo $this->Form->button('S\'inscrire', ['class' => 'btn validateform']);
            echo $this->Form->end();

        ?>
</fieldset>

<fieldset id="register">
    <legend>      
        <?php echo ('Connecte toi'); ?>
    </legend>
        <?php 
            echo $this->Html->link('Se connecter', array('controller' => 'Players', 'action'=>'login'), array('class' => 'button'));
        ?>
</fieldset>


<fieldset id="explication">
      <legend>Explications du site</legend>
        <h2>1) Votre page Vision :</h2>
        <p>Cette page affiche les combattants et les objets du décors en vue classés par distance croissante. vous pouvez : vous déplacer, attaquer (dans une direction).</p>
        <h2>2) Votre page de Combattant :</h2>
        <p>Cette page présente la feuille de votre personnage. Vous pouvez faire les action suivante : passer de niveau, choisir un avatar, ou en cas de mort : recréer un combattant.</p>
        <h2>3) La page Journal :</h2>
        <p>Sur cette page, vous pouvez voir tout les événements à portée de vue de moins de 24h.</p>
</fieldset> 
