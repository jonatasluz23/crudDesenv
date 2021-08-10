<?php

define("ROOT", "http://localhost/cRUD");
define('ENVIRONMENT', 'Development');

if(ENVIRONMENT == "Development"){
    define('HOST', 'localhost');
    define('DATABASE', 'desenv_crud');
    define('DBUSER', 'root');
    define('DBPASS', '');
}else{
    define('HOST', '');
    define('DATABASE', '');
    define('DBUSER', '');
    define('DBPASS', '');
}