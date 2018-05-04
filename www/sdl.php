<?php
error_reporting(E_ERROR | E_PARSE);
require_once "../vendor/autoload.php";

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../include');
$dotenv->load();

$smarty = new \Slack\GoSDL\Libraries\Smarty();

/**
 * SDL endpoint
 */

$smarty->getSmarty()->display('page_sdl.html');
exit;
