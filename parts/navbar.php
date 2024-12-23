<?php
if (!isset($pageName)) {
  $pageName = '';
}
?>

<style>
.navbar-nav .nav-link {
  padding-left: 5px;
}

.navbar-nav .nav-link.active {
  background-color: lightskyblue;
  color: darkblue;
  border-radius: 5px;
  font-weight: 800;
  padding-left: 5px;
}
</style>

<div class="px-0 mx-0 shadow">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index_.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php if ($pageName !== "member"):  ?>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'list' ? 'active' : '' ?>" href="list.php">列表</a>
          </li>

          <li class="nav-item">
            <?php if ($pageName == "product" || $pageName == "product_add"): ?>
            <a class="nav-link <?= $pageName == 'product_add' ? 'active' : '' ?>" href="product_add.php">新增</a>
            <?php else: ?>
            <a class="nav-link <?= $pageName == 'add' ? 'active' : '' ?>" href="add.php">新增</a>
            <?php endif ?>
          </li>

          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'eval_list' ? 'active' : '' ?>" href="eval_list.php">評論</a>
          </li> <?php endif; ?>
        </ul>

        <ul class="navbar-nav mb-2 mb-lg-0">
          <?php if (isset($_SESSION['admin'])) : ?>
          <li class="nav-item">
            <a class="nav-link "><?= $_SESSION['admin']['nickname'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">登出</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'login' ? 'active' : '' ?>" href="login.php">登入</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= $pageName == 'regist' ? 'active' : '' ?>" href="register.php">註冊</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</div>