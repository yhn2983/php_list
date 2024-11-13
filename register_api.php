<?php
require __DIR__ . '/parts/db_link.php';
header("Content-Type: application/json");
$output = [
  "success" => false, #有沒有新增成功
  "postData" => $_POST,
  "code" => 0, #追蹤程式執行的編號
];

if (empty($_POST["email"]) or empty($_POST["password"])) { echo "not form Empty"
} else {
  $email = trim($_POST["email"]);
  $password = password_hash(trim($_POST["password"]));
  $sql = "INSERT INTO `members` ( `name`,`email`, `nickname`, `password`) VALUES (?,?,?,?)";
  $stmt = $pdo->prepare($sql);

  try{$stmt->execute([
    $_POST["name"],
    $email,
    $_POST["nickname"],
    $password
  ]);
  $output['success'] = boolval($stmt->rowCount());
}catch(PDOException $e){       $output['error'] = $e->getMessage(); // 捕获 SQL 错误并显示
  }}
  






header("Content-Type: application/json");

echo json_encode($output, JSON_UNESCAPED_UNICODE);