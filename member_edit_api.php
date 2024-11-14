<?php
require __DIR__ . "/parts/admin_required.php";
require __DIR__ . "/parts/db_link.php";
$output = [
  "success" => false,
  "postData" => $_POST,
  "error" => " ",
  "code" => 0,
];
//echo json_encode($output, JSON_UNESCAPED_UNICODE);
//TODO:檢查個欄位的資料

if (!empty($_POST) && !empty($_POST["sid"])) {
  $sql = "UPDATE `members` SET
 `name`=?,
 `email`=?,
 `nickname`=?,
 `password`=?
 WHERE `id`=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['nickname'],
    $_POST['password'],
    $_POST['sid']
  ]);

  $output['code'] = 200;
  $output['success'] = boolval($stmt->rowCount());
}




header("Content-Type: application/json");

echo json_encode($output, JSON_UNESCAPED_UNICODE);
