<?php
defined('DS') ?  null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'xampp'.DS.'htdocs'.DS.'intern_api');
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');
defined('LIBS_PATH') ? null : define('LIBS_PATH', SITE_ROOT.DS.'libs');

//loads DB_config.php
require_once(INC_PATH.DS.'DB_config.php');
require_once(INC_PATH.DS.'JWT_config.php');

//loads core classes
spl_autoload_register(function ($class_name) {
    require_once(CORE_PATH.DS.$class_name.'.php');
});

include_once (LIBS_PATH.DS.'php-jwt-master/src/BeforeValidException.php');
include_once (LIBS_PATH.DS.'php-jwt-master/src/ExpiredException.php');
include_once (LIBS_PATH.DS.'php-jwt-master/src/SignatureInvalidException.php');
include_once (LIBS_PATH.DS.'php-jwt-master/src/JWT.php');
use \Firebase\JWT\JWT;