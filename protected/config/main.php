<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'srbac' => array(
			'userclass'=>'User', // nama model User Anda
			'userid'=>'id', // nama field untuk user id
			'username'=>'username', // nama field untuk user name
			'debug'=>true, // pilih false saat di production mode
			'pageSize'=>10, // jumlah item per halaman
			'superUser' =>'Authority', // nama role untuk superuser
			'css'=>'srbac.css', // style sheet untuk modul
			'layout'=>'application.views.layouts.main', // layout yang akan digunakan untuk controller srbac
			'notAuthorizedView'=>'application.views.site.unauthorized', // default unauthorized view
			'alwaysAllowed'=>array( // aksi yang selalu diizinkan tanpa autentikasi
				'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
				'SiteError', 'SiteContact'),
			'userActions'=>array('Show','View','List'), // aksi pada user yang diizinkan
			'listBoxNumberOfLines' => 15, // jumlah baris yang ditampilkan di listbox
			'imagesPath' => 'srbac.images', // path untuk icon
			'imagesPack'=>'noia', // icon pack
			'iconText'=>true, // tampilkan teks di bawah icon
			'header'=>'srbac.views.authitem.header', // header view path
			'footer'=>'srbac.views.authitem.footer', // footer view path
			'showHeader'=>true, // tampilkan header
			'showFooter'=>true, // tampilkan footer
			'alwaysAllowedPath'=>'srbac.components', // path untuk alwaysAllowed array
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root', // ganti dengan password yang Anda inginkan
			// Jika Anda menjalankan localhost, Anda dapat menghilangkan 'ipFilters'
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
