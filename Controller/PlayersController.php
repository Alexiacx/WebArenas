<?php
namespace App\Controller;
use App\Controller\AppController;
/**
* Personal Controller
* User personal interface
*
*/
class PlayersController  extends AppController
{
public function login(){
	$email=$_POST['email'];
	$password=$_POST['password'];
}
public function add(){
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$nationality=$_POST['nationality'];
	$city=$_POST['city'];
	$age=$_POST['age'];
	$sexe=$_POST['sexe'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$passwordconfirme=$_POST['passwordconfirme'];
}
}
