<?php
# 簡單的 CSRF 防護：token 存在 session，表單送出時一併帶上並比對
if (!isset($_SESSION)) {
  session_start();
}

if (empty($_SESSION["csrf_token"])) {
  $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}

# 給刪除、完成訂單這類會改資料的 API 使用：必須是 POST 而且 token 正確
function csrf_check()
{
  $token = isset($_POST["csrf_token"]) ? (string)$_POST["csrf_token"] : "";
  if ($_SERVER["REQUEST_METHOD"] !== "POST" || !hash_equals($_SESSION["csrf_token"], $token)) {
    http_response_code(403);
    exit("請求無效：必須使用 POST 並附上正確的 CSRF token");
  }
}
