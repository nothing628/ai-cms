<?php 

namespace App\Menu\Contracts;

interface IMenuCollection {

	public function add($menu);

	public function remove($menu);
}
