<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class EventsTable extends Table
{
	function getDiaryForFighter($fid)
	{
		$journal= $this->find('all');
		return $journal->toArray();
	}

}