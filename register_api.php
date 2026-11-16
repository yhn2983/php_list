<?php
require __DIR__ . '/parts/db_link.php';
header("Content-Type: application/json");
$output = [
  "success" => false, #有沒有新增成功
  "error" => "",
  "code" => 0, #追蹤程式執行的編號
];

$name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
$nickname = isset($_POST["nickname"]) ? trim($_POST["nickname"]) : "";
$email = isset($_POST["email"]) ? trim($_POST["email"]) : "";

if ($name === "" or $nickname === "" or $email === "" or empty($_POST["password"])) {
  $output['code'] = 400;
  $output['error'] = "請填寫所有欄位";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  #email 格式不正確
  $output['code'] = 401;
  $output['error'] = "信箱格式不符";
} else {
  try {
    #檢查 email 是否已經註冊過
    $stmt = $pdo->prepare("SELECT `id` FROM `members` WHERE `email`=?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
      $output['code'] = 402;
      $output['error'] = "此信箱已經註冊過";
    } else {
      $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);
      $sql = "INSERT INTO `members` ( `name`,`email`, `nickname`, `password`) VALUES (?,?,?,?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        $name,
        $email,
        $nickname,
        $password
      ]);
      $output['success'] = boolval($stmt->rowCount());
      $output['code'] = 200;
    }
  } catch (PDOException $e) {
    #SQL 錯誤只寫進伺服器 log，不回傳給前端
    error_log($e->getMessage());
    $output['code'] = 500;
    $output['error'] = "註冊失敗，請稍後再試";
  }
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
