<?php $this->assign('title', 'Inscription');?>

<h1>LES COMBATTANTS - E C E</h1>

<?php echo $this->Form->create('Arenas', array('action' => 'diary'));?>

<fieldset id="information">
    <legend>
        <?php echo ('Informations  personnelles '); ?>
    </legend>
        <?php 
            echo $this->Form->input('name', array('label' => 'Nom :'));
            echo $this->Form->input('surname', array('label' => 'Prénom :'));
            echo $this->Form->input('nationality', array('label' => 'Nationalité :'));
            echo $this->Form->input('city', array('label' => 'Ville :'));
            echo $this->Form->input('age', array('label' => 'Age :'));
            echo $this->Form->input('sexe', array('label' => 'Sexe :'));
            echo $this->Form->input('email', array('label' => 'Identifiant : ', 'placeholder' => 'Saisir ton email'));
            echo $this->Form->input('password', array('label' => 'Mot de passe : ', 'placeholder' =>'Saisir ton mot de passe'));
            echo $this->Form->input('passwordconfirme', array('label' => 'Confirmer ton mot de passe : ', 'placeholder' =>'Saisir ton mot de passe'));
            echo $this->Form->button('S\'inscrire', array('type' => 'submit'));
            echo $this->Form->end();
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