<?php $this->assign('title', 'Aide');?>

<br/>
<fieldset>
    <legend> Les regles du jeu :</legend>
		<h3>Les règles suivantes seront implémentées : </h3>
			<ul>
				<li>Un combattant se trouve dans une arène en damier à une position X,Y. Cette position ne peut pas se trouver hors des dimension de l'arène. Un seul combattant par case. Une arène par site.</li>
				<li>Un combattant commence avec les caractéristiques suivantes : vue= 0, force=1, point de vie=3. Il apparaît à une position aléatoire libre. </li>
				<li>Constantes paramétrées et valeurs de livraison : largeur (x) de l'arène (15), longueur (y) de l'arène (10).</li>
				<li>La caractéristique de vue détermine à quelle distance (de Manhattan = x+y) un combattant peut voir. Ainsi seuls les combattants et les éléments du décor à portée sont affichés sur la page concernée. 0 correspond à la case courante.</li>
				<li>La caractéristique de force détermine combien de point de vie perd son adversaire quand le combattant réussit son action d'attaque.</li>
				<li>Lorsque le combattant voit ses points de vie atteindre 0, il est retiré du jeu. Un joueur dont le combattant a été retiré du jeu est invité à en recréer un nouveau.</li>
				<li>Une action d'attaque réussit si une valeur aléatoire entre 1 et 20 (d20) est supérieur à un seuil calculé comme suit : 10 + niveau de l'attaqué - niveau de l'attaquant.</li>
				<li>Progression : à chaque attaque réussie le combattant gagne 1 point d'expérience. Si l'attaque tue l'adversaire, le combattant gagne en plus autant de points d'expériences que le niveau de l'adversaire vaincu. Tous les 4 points d'expériences, le combattant change de niveau et peut choisir d'augmenter une de ses caractéristiques : vue +1 ou force+1 ou point de vie+3.</li>
				<li>Chaque action provoque la création d'un événement avec une description claire. Par exemple : « jonh attaque bill et le touche ».</li>
    
    	<h4>Ce site web est réalisé dans le cadre d'un projet web au cours d'une formation d'ingénieur en apprentissage à l'ECE Paris.</h4>
</fieldset> 
