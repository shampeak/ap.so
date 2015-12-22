<?php
/*
 * 获得两个参数
 * $menu        //用来构建后台菜单   			可以加其他元素 例如tips
 * $mca      	//用来获取当前页面的mca信息
 * //--------------------------------------------------------------
 * geter('menu.menu')			//菜单信息数组
 * //--------------------------------------------------------------
 * url 通过计算获得
 */

return [
//	[
//		'mca'		=> 'admin.home.inde123312x',
//		'title'		=> '仪表盘',
//		'subtitle'	=> '对用户的增删改',
//		'icon'		=> 'fa fa-dashboard',
//		'ismenu'    => false,                    //是否显示到菜单上
//		'child'	=> [
//			[
//				'mca'		=> 'admin.home.in123123dex',
//				'title'		=> '用户管理2',
//				'subtitle'	=> '对用户的增删改',
//				'icon'		=> 'icon primary',
//				'ismenu'    => false,
//			],
//			[
//				'mca'		=> 'su.admio.us123123er3',
//				'title'		=> '用户管理',
//				'subtitle'	=> '对用户的增删改',
//				'icon'		=> 'icon primary1',
//				'ismenu'    => false,
//			],
//		],
//	],



	[
		'mca'		=> 'admin.main.index',
		'title'		=> '仪表盘',
		'subtitle'	=> '显示各项系统数据',
		'icon'		=> 'fa fa-dashboard',
		'ismenu'    => true,                    //是否显示到菜单上

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
		'mca'		=> 'admin.test.index',
		'title'		=> '测试',
		'subtitle'	=> '不成熟的控制器测试',
		'icon'		=> 'glyphicon glyphicon-th',
		'ismenu'    => true,                    //是否显示到菜单上
	],
];

