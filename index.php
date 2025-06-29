<?php
require_once __DIR__ . '/config/config.php';

$page = $_GET['page'] ?? 'login';
$path = __DIR__ . "/pages/$page.php";

if (file_exists($path)) {
  require_once $path;
} else {
  echo "404 Page Not Found";
}
