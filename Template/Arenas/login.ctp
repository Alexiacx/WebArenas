<?php $this->assign('title', 'login');?>

    <a href="accueil.html"> <img id="img_prev" src="boutons/retour.png"/></a> 
    
    <h1>LES COMBATTANTS - E C E</h1>
    
    <fieldset id="information">
    <legend>Informations  personnelles</legend>

    <form action="vision.html" method="post">
    <table>
        <tr>
            <td><label for="">Nom</label></td>
            <td><input type="text"name="name"></td>
            <td><label for="">Prénom</label></td>
            <td><input type="text" name="surname"></td>
            <td><label for="">Nationalité</label></td>
            <td><input type="text" name="nationalitie"></td>
        </tr>
        <tr>
            <td><label for="">Ville</label></td>
            <td><input type="text"name="city"></td>
            <td><label for="">Age</label></td>
            <td><input type="number" name="age"></td>
            <td><label for="">Sexe</label> </td>
            <td><SELECT name="sexe" size="1"><OPTION>Femme<OPTION>Homme</td>
        </tr>
        <tr>
            <td><label for="">Identifiant</label></td>
            <td><input type="text" name="login"></td>
            <td><label for="">Mot de passe</label></td>
            <td><input type="password"name="password"></td>
            <td><label for="">Confirmer le MDP</label></td>
            <td><input type="password"name="password2"></td>
        </tr>
        <tr>
            <td></td>
            <td><label for="">Photo de profil : </label></td>
            <td><input name="image" type="file"></td>
            <td><input  name="submit" type="submit" value="S'inscrire"></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    </form>
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