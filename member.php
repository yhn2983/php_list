<?php

session_start();

# 只有管理員（role = admin）才看得到管理用的列表
if (isset($_SESSION["admin"]) && ($_SESSION["admin"]["role"] ?? "") === "admin") {
  include __DIR__ . "/member_admin.php";
} else {
  include __DIR__ . "/member_no_admin.php";
}
