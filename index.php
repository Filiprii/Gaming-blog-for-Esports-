<?php

$_error = [];
$_message = [];
$_page_output = [];
$_action = $_GET['action'] ?? '';
$_id = (int)($_GET ['id'] ?? '');

define('DIR_ROOT', './');
define('DIR_PUBLIC', DIR_ROOT . 'public/');
define('DIR_PUBLIC_JS', DIR_PUBLIC . 'js/');
define('DIR_PUBLIC_CSS', DIR_PUBLIC . 'css/');
define('DIR_PUBLIC_IMAGES', DIR_PUBLIC . 'images/');
define('DIR_PUBLIC_TOURS', DIR_PUBLIC . 'tours/');
define('DIR_MODEL', DIR_ROOT . 'model/');
define('DIR_VIEW', DIR_ROOT . 'view/');
define('FILE_CONFIG', DIR_ROOT . 'config.php');
define('FILE_INDEX', DIR_ROOT . 'index.php');
define('FILE_ERROR_404', FILE_INDEX . '?module=error404');
define('USER_ANONYMOUS', 0);
define('USER_ADMIN', 1);

include_once(DIR_MODEL . 'functions.php');
include_once(DIR_MODEL . 'functions_db.php');

$_db = db_connect();

session_start();

$_module = $_GET['module'] ?? '';


$module_name = ($_module == '') ? 'home' : $_module;
$module_filename = DIR_MODEL . "module-{$module_name}.php";
$module_filename_function = DIR_MODEL . "module-{$module_name}-function.php";


if (!file_exists($module_filename))
	redirect(FILE_ERROR_404);


if (file_exists($module_filename_function))
	include_once($module_filename_function);
include_once($module_filename);

include_once(DIR_VIEW . "page-header.php");
include_once(DIR_VIEW . "page-nav.php");
include_once(DIR_VIEW . "page-body.php");
include_once(DIR_VIEW . "page-footer.php");

db_close($_db);
exit;

?>


	