<?php 

return [
	'Dashboard' => [
		'icon'	=> 'si si-speedometer',
		'href'	=> 'admin.home'
	],
	'Main Setting' => [
		'heading' => true
	],
	'Manga' => [
		'icon'	=> 'si si-docs',
		'submenu'	=> [
			'All Manga'		=> 'admin.manga.index',
			'Staff Pick'	=> 'admin.manga.staff',
			'Crawl'			=> 'admin.manga.crawl',
		]
	],
	'Tag Management' => [
		'icon'	=> 'si si-tag',
		'submenu'	=> [
			'Tags'			=> 'admin.tags',
			'Category'		=> 'admin.category',
		]
	],
	'Report'	=> [
		'icon'	=> 'si si-bar-chart',
		'submenu' => [
			'Page Views'	=> 'admin.report.page',
			'Manga Views'	=> 'admin.report.manga',
			'Upload History'	=> 'admin.report.upload',
			'Top Search'	=> 'admin.report.search',
		]
	],
	'Notifications'	=> [
		'icon'	=> 'si si-bubble',
		'submenu'	=> [
			'All Notification'	=> '#',
			'Discuss'	=> '#',
			'Comments'	=> '#',
			'Important'	=> '#',
			'Inner'	=> [
				'submenu' => [
					'In Manga'	=> '#'
				]
			]
		]
	],
	'Settings'	=> [
		'icon'	=> 'si si-settings',
		'submenu'	=> [
			'Users'			=> 'admin.setting.page',
			'Page Setting'	=> 'admin.setting.user',
			'Widgets'		=> 'admin.setting.widget',
		]
	]
];
