<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

require_once '../../vendor/autoload.php';

// Загрузка конфигурации
require_once '../config/main_config.php';

// подкючение роутинга
include  '../routes/web.php';
require_once '../App/Router.php';
