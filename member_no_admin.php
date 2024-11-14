<?php require __DIR__ . "/parts/db_link.php";
$title = '會員列表';
$pageName = 'member';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1; #用戶選擇進去第幾頁
if ($page < 1) {
  header("Location: ?page=1");
  exit();
}

$perPage = 10; #每一頁筆數
$total_sql = "SELECT COUNT(1) FROM members";
$total_rows = $pdo->query($total_sql)->fetch(PDO::FETCH_NUM)[0]; #總筆數
$total_pages = ceil($total_rows / $perPage); #總頁數
# echo json_encode([$total_rows,$total_pages]);

if ($page > $total_pages) {
  header("Location: ?page=" . $total_pages);
  exit();
}
if (session_status() == PHP_SESSION_NONE) {
  // 如果會話未啟動，啟動會話
  session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sortType = $_POST["sortType"];

  $_SESSION["sortType"] = $sortType;
}
if (isset($_SESSION["sortType"])) {
  $sortType = $_SESSION["sortType"];
} else {
  $sortType = "idSmall";
}

$sql = sprintf("SELECT * FROM members LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__ . "/parts/header.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<div class="contain">
  <h2><?= $title ?></h2>

  <div class="contain">
    <div class="row">
      <div class="col-3">
        <?php include __DIR__ . "/parts/sidebar.php" ?>
      </div>
      <div class="col-9">
        <div class="row">
          <div class="col">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <!-- 跳到第一頁 -->
                <li>
                  <a class="page-link" href="?page=<?= 1 ?>" aria-label="Next">
                    <i class="bi bi-chevron-double-left"></i>
                  </a>
                </li>
                <!-- 跳到前一頁 -->
                <li class="page-item">
                  <?php if ($page > 1): ?>
                    <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                      <i class="bi bi-chevron-left"></i>
                    </a>
                  <?php endif ?>
                  <!-- 頁數選擇鍵 -->
                </li>
                <?php if ($page - 2 < 1): ?>
                  <?php for ($i = 1; $i <= 5; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                  <?php endfor ?>
                <?php elseif ($page + 2 > $total_pages): ?>
                  <?php for ($i = $total_pages - 4; $i <= $total_pages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                  <?php endfor ?>
                <?php else: ?>

                  <?php for ($i = $page - 2; $i <= $page + 2; $i++): ?>
                    <?php if ($i >= 1 and $i <= $total_pages): ?>
                      <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endif ?>
                  <?php endfor ?>

                <?php endif ?>
                <!-- 跳到後一頁 -->
                <li class="page-item">
                  <?php if ($page < $total_pages): ?>
                    <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                      <i class="bi bi-chevron-right"></i>
                    </a>
                  <?php endif ?>
                </li>
                <!-- 跳到最後一頁 -->
                <li>
                  <a class="page-link" href="?page=<?= $total_pages ?>" aria-label="Next">
                    <i class="bi bi-chevron-double-right"></i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">編號</th>
                <th scope="col">信箱</th>
                <th scope="col">暱稱</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $r): ?>
                <tr>
                  <td><?= $r["id"] ?></td>
                  <td><?= $r["email"] ?></td>
                  <td><?= $r["nickname"] ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . "/parts/script.php" ?>
<?php include __DIR__ . "/parts/footer.php" ?>