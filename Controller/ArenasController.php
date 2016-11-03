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
	$this->loadModel('Events');
	$journal=$this->Events->getDiary();
	$this->set("journal",$journal);
}
public function help()
{

}
}
