<?php

$root = __DIR__ . DIRECTORY_SEPARATOR; // the current file project1 

define('APP_PATH', $root . 'App' . DIRECTORY_SEPARATOR); //C:\xampp\htdocs\Project1\App\
define('FILES_PATH', $root . 'Transaction' . DIRECTORY_SEPARATOR); //C:\xampp\htdocs\Project1\Transaction\
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR); //C:\xampp\htdocs\Project1\views\
require APP_PATH . 'app.php';
$files = getTransactionsFiles(FILES_PATH);
$transactions = [];
foreach ($files as $file) {
    $transactions = array_merge($transactions, getTransaction($file));
}
$total = CalculateTotal($transactions);
require VIEWS_PATH . 'transactions.php';

?>