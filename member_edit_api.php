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

unset($output["postData"]["password"]); #回傳資料不包含密碼

if (!empty($_POST) && !empty($_POST["sid"])) {
  if (isset($_POST['password']) && $_POST['password'] !== "") {
    #有填新密碼：用 password_hash() 雜湊後再存
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
      password_hash($_POST['password'], PASSWORD_DEFAULT),
      $_POST['sid']
    ]);
  } else {
    #密碼留空：不更新密碼
    $sql = "UPDATE `members` SET
 `name`=?,
 `email`=?,
 `nickname`=?
 WHERE `id`=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $_POST['name'],
      $_POST['email'],
      $_POST['nickname'],
      $_POST['sid']
    ]);
  }

  $output['code'] = 200;
  $output['success'] = boolval($stmt->rowCount());
}




header("Content-Type: application/json");

echo json_encode($output, JSON_UNESCAPED_UNICODE);
