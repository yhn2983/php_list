<?php

session_start();

if (isset($_SESSION["admin"])) {
  include __DIR__ . "/member_admin.php";
} else {
  include __DIR__ . "/member_no_admin.php";
}
