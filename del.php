<?php
require __DIR__ ."/parts/admin_required.php";
require __DIR__ ."/parts/db_link.php";

$sid=isset($_GET["sid"])? intval($_GET["sid"]):0;


if(!empty($sid)){
  $sql="DELETE  FROM `order_fake` WHERE id=$sid";
  $pdo->query($sql);
}
  $backTo="list.php";
  if(!empty($_SERVER['HTTP_REFERER'])){
    $backTo=$_SERVER['HTTP_REFERER'];
  }


header("Location: ". $backTo);