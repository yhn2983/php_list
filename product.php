<?php require __DIR__ . "/parts/db_link.php";
$title = '商品列表';
$pageName = 'product';

$sql = " SELECT * FROM product ";
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
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">編號</th>
              <th scope="col">商品名稱</th>
              <th scope="col">價格</th>
              <th scope="col">描述</th>
              <th scope="col">圖片</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rows as $r): ?>
              <tr>
                <td><?= $r["id"] ?></td>
                <td><?= $r["product_name"] ?></td>
                <td><?= $r["price"] ?></td>
                <td><?= $r["descr"] ?></td>
                <td><img src="<?= $r["img"] ?>" alt="" style="width: 100px; height: 100px;"></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include __DIR__ . "/parts/script.php" ?>
<?php include __DIR__ . "/parts/footer.php" ?>