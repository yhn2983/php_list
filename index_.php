<?php
require __DIR__ . "/parts/db_link.php";
$title = "Home";
$pageName = "home";

?>

<?php include __DIR__ . "/parts/header.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>
<div class="contain">
  <h2>HOME</h2>
  <?php if (isset($_SESSION["admin"])): ?>
  <h1>已經登入</h1>
  <?php else: ?>
  <h1>請先登入</h1>
  <?php endif ?>
</div>
<?php include __DIR__ . "/parts/script.php" ?>
<?php include __DIR__ . "/parts/footer.php" ?>