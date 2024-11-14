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
<?php include __DIR__ . "/parts/script.php" ?>
<?php include __DIR__ . "/parts/footer.php" ?>