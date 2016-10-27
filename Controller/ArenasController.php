<?php
namespace App\Controller;
use App\Controller\AppController;
/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function index()
{
	/*<?php
 $dbname     = "photo";
	$db_login   = "root";
	$db_pass    = "root";
	$identifiant = $_POST['id'];
	echo $identifiant;
	echo "<br>";
	
	$pwd=$_POST['password'];
	echo $pwd;
	
	
 
// on teste la déclaration de nos variables

	$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
				$sql = "SELECT `login` , `mdp`,`ID_Utilisateur`,`admin` FROM `utilisateurs` WHERE `login`='$identifiant';";
				echo $sql;
				$results = $bdd->query($sql);
			
				
				if($utilisateur = $results->fetch()) 
				{
						echo $utilisateur["login"];
						echo $utilisateur["mdp"];

					if (($utilisateur["login"]==$identifiant)&&($utilisateur["mdp"]==$pwd))
					{
						echo "test";
						$_SESSION['ID_Utilisateur']=$utilisateur["ID_Utilisateur"];
						$_SESSION['admin']=$utilisateur["admin"];
						
						//echo $_SESSION['ID_Utilisateur'];
						header('Location: actu.php');      
					}
					else
					{
						echo $sql;
						header('Location: accueil.php');
					}
		
				}

?> */
}
public function login()
{
	/*<?php
	session_start();
	$dbname     = "photo";
	$db_login   = "root";
	$db_pass    = "root";
	$id = $_POST['login'];
	$pwd=$_POST['password'];
	$pwd2=$_POST['password2'];
	$name=$_POST['name'];
	$prenom=$_POST['surname'];
	$nationalite=$_POST['nationalitie'];
	$city=$_POST['city'];
	$sexe=$_POST['sexe'];
	$age=$_POST['age'];
	
	

	if( isset($_POST['submit']) ) // si formulaire soumis
	{
		$file_dest = $_FILES["image"]["name"];
    	$content_dir = 'upload/'.$file_dest; // dossier où sera déplacé le fichier
		$tmp_file = $_FILES['image']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['image']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'png') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif')&& !strstr($type_file, 'jpeg') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['image']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir ) )
    {
        exit("Impossible de copier le fichier $tmp_file dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
	}

				$bdd = new PDO("mysql:host=localhost;dbname=$dbname;charset=UTF8", $db_login, $db_pass);
				$sql = "SELECT `login` , `mdp`,`ID_Utilisateur` FROM `utilisateurs` WHERE `login`='$id';";
				$results = $bdd->query($sql);
				while($utilisateur = $results->fetch()) {
					if (($utilisateur["login"]==$id)&&($utilisateur["mdp"]==$pwd))
					{
						$_SESSION['ID_Utilisateur']=$utilisateur["ID_Utilisateur"];
						echo $_SESSION['ID_Utilisateur'];
					}
				}

	if(strcmp ($pwd,$pwd2)==0)
	{
		
		try {
	
	$sql = "INSERT INTO utilisateurs (ID_Utilisateur, mdp, login, chemin_profile_pic, nom, prenom , sexe, age, nationalite, ville, admin) VALUES(";
	$sql .= "'0','$pwd','$id','$content_dir','$name','$prenom','$sexe' , '$age' , '$nationalite' , '$city', '0');";
	//$sql = "INSERT INTO utilisateurs (ID_Utilisateur, mdp, login) VALUES(";
	//$sql .= ",'$pwd','$id')";	
	//echo $sql;
	
	$bdd->query($sql);
	header('Location: actu.php');      

	}
	
catch(Exception $e) {
	echo $e->getMessage();
	return;	
}
	
	
	?>*/
}
public function fighter()
{

}
public function sight()
{

}
public function diary()
{

}
public function help()
{

}
}
