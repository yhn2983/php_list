<?php 

session_start();

if(isset($_SESSION["admin"])){
include __DIR__ ."/eval_list_admin.php";
}else{
	include __DIR__ ."/eval_list_no_admin.php";
}