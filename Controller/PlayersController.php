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
}