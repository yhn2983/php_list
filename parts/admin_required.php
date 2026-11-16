<?php
if(!isset($_SESSION)) {
	session_start();
}

# 只有 role 為 admin 的會員才能通過
if(!isset($_SESSION["admin"]) || ($_SESSION["admin"]["role"] ?? "") !== "admin") {
	header("Location: index_.php");
	exit();
}
