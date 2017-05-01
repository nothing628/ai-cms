<?php 

return [
	'Admin' => [
		'Dashboard' => [
			'href'	=> 'admin.home',
			'html'	=> '<i class="si si-speedometer"></i> Dashboard',
		],
		'Manga' => [
			'html'	=> '<i class="si si-docs"></i> Manga',
			'submenus'	=> [
				'All Manga'		=> 'admin.manga.index',
				'Staff Pick'	=> 'admin.manga.staff',
				'Crawl'			=> 'admin.manga.crawl',
			]
		],
		'Tag Management' => [
			'html'	=> '<i class="si si-tag"></i> Tag Management',
			'submenus'	=> [
				'Tags'			=> 'admin.tags',
				'Category'		=> 'admin.category',
			]
		],
		'Report'	=> [
			'html'	=> '<i class="si si-bar-chart"></i> Report',
			'submenus' => [
				'Page Views'	=> 'admin.report.page',
				'Manga Views'	=> 'admin.report.manga',
				'Upload History'	=> 'admin.report.upload',
				'Top Search'	=> 'admin.report.search',
			]
		],
		'Notifications'	=> [
			'html'	=> '<i class="si si-bubble"></i> Notifications',
			'submenus'	=> [
				'All Notification'	=> '#',
				'Discuss'	=> '#',
				'Comments'	=> '#',
				'Important'	=> '#',
				'Inner'	=> [
					'submenus' => [
						'In Manga'	=> '#'
					]
				]
			]
		],
		'Settings'	=> [
			'html'	=> '<i class="si si-settings"></i> Settings',
			'submenus'	=> [
				'Users'			=> 'admin.setting.user',
				'Page Setting'	=> 'admin.setting.page',
				'Widgets'		=> 'admin.setting.widget',
			]
		],
	],
	'Web' => [
		'Home' => [
			'href'		=> 'home',
			'html'		=> '<i class="si si-home"></i><span class="sidebar-mini-hide">Home</span>',
		],
		'Advanced Search' => [
			'href'		=> 'search',
			'html'		=> '<i class="si si-magnifier"></i><span class="sidebar-mini-hide">Advanced Search</span>',
		],
		'Browse' => [
			'href'		=> 'manga.browse',
			'html'		=> '<i class="si si-grid"></i><span class="sidebar-mini-hide">Browse</span>',
		],
		'Tag Directory'	=> [
			'href'		=> 'tag.directory',
			'html'		=> '<i class="si si-tag"></i><span class="sidebar-mini-hide">Tag Directory</span>',
		],
		'FAQs'			=> [
			'href'		=> 'faq',
			'html'		=> '<i class="si si-question"></i><span class="sidebar-mini-hide">FAQs</span>',
		],
		'Contact Us'	=> [
			'href'		=> 'contact.us',
			'html'		=> '<i class="si si-bubble"></i><span class="sidebar-mini-hide">Contact Us</span>',
		],
	],
];
