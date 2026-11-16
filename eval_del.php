<?php
require __DIR__ ."/parts/admin_required.php";
require __DIR__ ."/parts/db_link.php";
require __DIR__ . "/parts/csrf.php";

csrf_check(); #只接受 POST，並檢查 CSRF token

$sid=isset($_POST["sid"]) ? intval($_POST["sid"]) : 0;


if(!empty($sid)){
  $sql="DELETE FROM `comment_fake` WHERE id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$sid]);
}
  $backTo="eval_list.php";
  if(!empty($_SERVER['HTTP_REFERER'])){
    $backTo=$_SERVER['HTTP_REFERER'];
  }


header("Location: ". $backTo);