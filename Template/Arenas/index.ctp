<?php $this->assign('title', 'Connexion');?>

<h1>LES COMBATTANTS - E C E</h1>
<h2>Combatter vos amis un enemis grâce à ce jeu!</h2>

<fieldset id="login">
    <legend>Connecte toi :</legend>
    	<form action="sight" method="post">
    		<table>
        		<tr>
            		<td><label for="id">Identifiant</label></td>
           			<td><input name="id" placeholder="Saisir votre identifiant"></td>
           		</tr>
           		<tr>
        			<td><label for="password">Mot de passe</label></td>
            		<td><input name="password" type="password" placeholder="Saisir votre mot de passe"></td>
            	<tr>
					<td></td>
					<td><input  type="submit" value="Se Connecter"></td>
				</tr>
			</table>
      	</form>
    </fieldset>

    <fieldset id="register">
    <legend>Pas encore inscrit ?</legend>
        <form  action="login." method="post" >
        	<input type="submit" value="S'inscrire">
        </form>
    </fieldset>

