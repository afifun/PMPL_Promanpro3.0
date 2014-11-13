<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap/');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'PROMANPRO',
	'theme'=>'bootstrap',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
                'bootstrap.helpers.TbHtml',
                'bootstrap.helpers.TbArray',
		'application.models.*',
		'application.components.*',
            //edit here
                'application.extensions.yii-mail.*',
	),
//    
//    'mail' => array(
//                'class' => 'ext.yii-mail.YiiMail',
//                'transportType'=>'smtp',
//                'transportOptions'=>array(
//                        'host'=>'localhost',
//                        'username'=>'root',
//                        'password'=>'',
////                        'port'=>'25',                       
//                ),
//                'viewPath' => 'application.views.site',             
//        ),
//    'import'=>array( 'application.models.', 'application.components.', 'ext.yii-mail.YiiMailMessage', ),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'generatorPaths'=>array(
                'bootstrap.gii',
            ),
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
            //edit here - add mail componen
                'mail' => array(
                    'class' => 'application.extensions.yii-mail.YiiMail',
                            'transportType'=>'smtp', /// case sensitive!
                            'transportOptions'=>array(
                                'host'=>'smtp.gmail.com',
                                'username'=>'promanpro2014@gmail.com',
                            // or email@googleappsdomain.com
                            'password'=>'promanproppl2014',
                            'port'=>'465',
                            'encryption'=>'ssl',
                            ),
                        'viewPath' => 'application.views.mail',
                        'logging' => true,
                        'dryRun' => false
                ),
    
		'bootstrap'=>array(
                    'class'=>'bootstrap.components.Bootstrap',
                    
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
        */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=promanpro',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
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
            //edit here
		'adminEmail'=>'promanpro2014@gmail.com',
	),
);