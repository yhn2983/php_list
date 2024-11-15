<?php require __DIR__ . "/parts/db_link.php";
$title = '會員列表';
$pageName = 'member';

//頁碼製作
$page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
if ($page < 1) {
  header("Location:?page=1");
  exit();
}
$perpage = 10;  #每頁有幾筆
$total_sql = " SELECT count(1) FROM members ";
$total_rows = $pdo->query($total_sql)->fetch(PDO::FETCH_NUM)[0]; #計算總筆數
$total_pages = ceil($total_rows / $perpage); #總頁數

if ($page > $total_pages) {
  header("Location:?page=" . $total_pages);
  exit();
}
if (session_status() == PHP_SESSION_NONE) {
  session_start();
  #如果session未啟動，則啟動session
}

$sql = sprintf("SELECT * FROM members  LIMIT %s,%s ", ($page - 1) * $perpage, $perpage);
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include __DIR__ . "/parts/header.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>
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
        <div class="col-9">
          <table class="table table-striped">
            <thead>
              <tr>

                <th scope="col">編號</th>
                <th scope="col">姓名</th>
                <th scope="col">信箱</th>
                <th scope="col">暱稱</th>
                <th scope="col">密碼</th>

                <th scope="col">修改</th>
                <th scope="col">刪除</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $r): ?>
                <tr>

                  <td><?= $r["id"] ?></td>
                  <td><?= $r["name"] ?></td>
                  <td><?= $r["email"] ?></td>
                  <td><?= $r["nickname"] ?></td>
                  <td><?= $r["password"] ?></td>


                  <td><a href="member_edit.php?sid=<?= $r["id"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a href="javascript: deleteIt(<?= $r["id"] ?>)"><i class="bi bi-x-square"></i></a></td>
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
<script>
  function deleteIt(sid) {
    if (confirm(`是否要刪除第${sid}筆訂單`)) {
      location.href = `member_del.php?sid=${sid}`;
    }
  }
</script>

<?php include __DIR__ . "/parts/footer.php" ?>