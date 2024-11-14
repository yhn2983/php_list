<?php require __DIR__ . "/parts/db_link.php";
$title = '會員列表';
$pageName = 'member';


$sql = sprintf("SELECT * FROM members ");
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
<?php include __DIR__ . "/parts/script.php" ?>
<script>
  function deleteIt(sid) {
    if (confirm(`是否要刪除第${sid}筆訂單`)) {
      location.href = `member_del.php?sid=${sid}`;
    }
  }
</script>

<?php include __DIR__ . "/parts/footer.php" ?>