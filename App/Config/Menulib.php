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
		'mca'		=> 'admin.patient.index',
		'title'		=> '患者管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'glyphicon glyphicon-user',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.patient.list',
				'title'		=> '患者列表',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.patient.mea',
				'title'		=> '测试数据',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],


	[
		'mca'		=> 'admin.msg.index',
		'title'		=> '消息管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'glyphicon glyphicon-user',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.msg.send',
				'title'		=> '发消息',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.msg.receive',
				'title'		=> '发件箱',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.msg.list',
				'title'		=> '消息管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],


	[
		'mca'		=> 'admin.article.index',
		'title'		=> '文章管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'glyphicon glyphicon-user',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.article.index',
				'title'		=> '文章管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'admin.article.category',
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

