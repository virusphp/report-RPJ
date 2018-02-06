<?php
/* Database Configuration */
return array(
    'dbmain' => array(
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'password' => '',
        'dbname' => 'db_frameduz',
        'charset' => 'utf8',
        'collate' => 'utf8_general_ci',
        'persistent' => false,
        'errorMsg' => 'Maaf, Gagal terhubung dengan Database Main.',
    ),
    'dbdata' => array(
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => 3306,
        'user' => 'root',
        'password' => '',
        'dbname' => 'db_data',
        'charset' => 'utf8',
        'collate' => 'utf8_general_ci',
        'persistent' => false,
        'errorMsg' => 'Maaf, Gagal terhubung dengan Database Data.',
    ),
);
/*----------------------*/
?>
