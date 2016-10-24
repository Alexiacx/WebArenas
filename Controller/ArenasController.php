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
	//$this->set('myname', "Alexia Chassigneux");

	$this->loadModel('Fighters');
	$figterlist=$this->Fighters->find('all');
	pr($figterlist->toArray());
}
public function login()
{

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
}
