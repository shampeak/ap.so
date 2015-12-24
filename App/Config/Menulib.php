<?php


return [


	[
		'mca'		=> 'admin.main.index',
		'title'		=> '仪表盘',
		'subtitle'	=> '显示各项系统数据',
		'icon'		=> 'fa fa-dashboard',
		'ismenu'    => true,                    //是否显示到菜单上

	],

	/*
	|--------------------------------------------------------------
	|
	|--------------------------------------------------------------
	*/



	[
		'mca'		=> 'admin.user.index12',
		'title'		=> '患者管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'glyphicon glyphicon-user',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.user.index1',
				'title'		=> '患者列表',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.user.index1',
				'title'		=> '测试数据',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],


	[
		'mca'		=> 'admin.user.index12',
		'title'		=> '消息管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'glyphicon glyphicon-user',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.user.index1',
				'title'		=> '发消息',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.user.group2',
				'title'		=> '发件箱',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.user.group2',
				'title'		=> '消息管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],


	[
		'mca'		=> 'admin.user.index12',
		'title'		=> '文章管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'glyphicon glyphicon-user',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.user.index1',
				'title'		=> '文章管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.user.group2',
				'title'		=> '分类管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],


	[
		'mca'		=> 'admin.user.index',
		'title'		=> '用户管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'glyphicon glyphicon-user',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.user.index',
				'title'		=> '用户管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.user.group',
				'title'		=> '用户组管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],

	[
		'mca'		=> 'admin.set.index',
		'title'		=> 'Ground',
		'subtitle'	=> '更底层数据管理',
		'icon'		=> 'glyphicon glyphicon-th',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.set.geter',
				'title'		=> '静态化数据',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.set.mcae',
				'title'		=> '控制器标识',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.set.widget',
				'title'		=> '页面部件',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.set.middleware',
				'title'		=> '中间件',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.set.menu',
				'title'		=> '菜单',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],
	[
		'mca'		=> 'N.test.index',
		'title'		=> '测试',
		'subtitle'	=> '不成熟的控制器测试',
		'icon'		=> 'glyphicon glyphicon-th',
		'ismenu'    => true,                    //是否显示到菜单上
	],
];

