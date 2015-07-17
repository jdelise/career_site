<?php
return array(

    /*
	|--------------------------------------------------------------------------
	| Default FTP Connection Name
	|--------------------------------------------------------------------------
	|
	| Here you may specify which of the FTP connections below you wish
	| to use as your default connection for all ftp work.
	|
	*/

    'default' => 'connection1',

    /*
    |--------------------------------------------------------------------------
    | FTP Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the FTP connections setup for your application.
    |
    */

    'connections' => array(

        'connection1' => array(
            'host'   => 'ftp.announcemymove.com',
            'port'  => 21,
            'username' => 'c21scheetzftp',
            'password'   => 'c21*data!21',
            'passive'   => true,
        ),
    ),
);