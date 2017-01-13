<?php 

function routePath($name) {
	$route = app('router')->getRoutes()->getByName($name);

	if ($route) {
		return $route->getPath();
	}

	return null;
}

function isRoute($name) {
	$request_path = request()->path();

	if (is_array($name)) {
		foreach ($name as $nam) {
			$route_path = routePath($nam);

			if ($route_path == $request_path) {
				return true;
			}
		}

		return false;
	} else {
		$route_path = routePath($name);

		return $route_path == $request_path;
	}
}
