<?php 

namespace App\Menu\Collection;

class AdminMenu extends MenuCollection
{
	public function __construct()
	{
		parent::__construct();

		$this->section = 'Admin';
	}
}
