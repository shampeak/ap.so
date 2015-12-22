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
	[
		'mca'		=> 'admin.home.inde123312x',
		'title'		=> '仪表盘',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'fa fa-dashboard',
		'ismenu'    => false,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'admin.home.in123123dex',
				'title'		=> '用户管理2',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => false,
			],
			[
				'mca'		=> 'su.admio.us123123er3',
				'title'		=> '用户管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary1',
				'ismenu'    => false,
			],
		],
	],



	[
		'mca'		=> 'admin.main.index',
		'title'		=> '仪表盘',
		'subtitle'	=> '显示各项系统数据',
		'icon'		=> 'fa fa-dashboard',
		'ismenu'    => true,                    //是否显示到菜单上

	],

	[
		'mca'		=> 'admin.user.user4',
		'title'		=> '用户管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'icon primary',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'su.admio.user5',
				'title'		=> '用户管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'su.admio.user6',
				'title'		=> '用户管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],
	[
		'mca'		=> 'admin.user.user4',
		'title'		=> '用户管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'icon primary',
		'ismenu'    => true,                    //是否显示到菜单上
		'child'	=> [
			[
				'mca'		=> 'su.admio.user5',
				'title'		=> '用户管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
			[
				'mca'		=> 'su.admio.user6',
				'title'		=> '用户管理',
				'subtitle'	=> '对用户的增删改',
				'icon'		=> 'icon primary',
				'ismenu'    => true,
			],
		],
	],


	[
		'mca'		=> 'su.admio.user7',
		'title'		=> '用户管理',
		'subtitle'	=> '对用户的增删改',
		'icon'		=> 'icon primary',
		'ismenu'    => true,                    //是否显示到菜单上
	],

];

