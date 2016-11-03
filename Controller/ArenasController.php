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
public function home()
{

}

public function adduser()
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
	$fighterid=1;
	$this->loadModel('Events');
	$journal=$this->Events->getDiaryForFighter($fighterid);
	$this->set("journal",$journal);
}
public function help()
{

}
}
