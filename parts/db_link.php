<?php
$db_host="localhost";
$db_user="root";
$db_pass="E124801602";
$db_name="fake_data_base";

$dsn="mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";

$pdo_option=[
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE=>
    PDO::ERRMODE_EXCEPTION
];

$pdo=new PDO($dsn,$db_user,$db_pass,$pdo_option);


if(!isset($_SESSION)){
    session_start();
}
