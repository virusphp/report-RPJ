<?php
/* Website Configuration */
return array(

	// Set default main controller
    'defaultController' => array(
        'project' => 'user'
    ),
    
    // Set default main templalte
    'defaultTemplate' => array(
        'template' => 'theme_user',
    ),
    
    // Load automatically view in index.php 
    'setting' => array(
        'web_title' => 'FRAMEDUZ PHP',
        'web_author' => 'Java Resources',
        'web_description' => 'Frameduz PHP',
        'web_keywords' => 'frameduz php',
        'web_header' => 'Frameduz PHP',
        'web_footer' => 'Copyright 2017',
    ),
    
    /* Config Project */
    'project' => array(
		// Project user
        'user' => array(
            'session' => 'FRAMEDUZUSER',
            'cookie' => 'CKUSER',
            'path' => 'user',
            'controller' => 'main',
            'method' => 'index',
        ),
        // Project admin
        'admin' => array(
            'session' => 'FRAMEDUZADMIN',
            'cookie' => 'CKADMIN',
            'path' => 'admin',
            'controller' => 'main',
            'method' => 'index',
        ),
    ),
    
    /* Config Template */
    'template' => array(
		// Path template user
        'theme_user' => array(
            'basePath' => 'theme_user/',
        ),
        // Path template admin
        'theme_admin' => array(
            'basePath' => 'theme_admin/',
        ),
    ),
    
);
/* ---------------------- */
?>
