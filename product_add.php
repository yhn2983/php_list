<?php
require __DIR__ . "/parts/admin_required.php";
require __DIR__ . "/parts/db_link.php";
$title = "新增商品";
$pageName = "product_add";

if (isset($_POST["submit"])) {
  $file_name = $_FILES["image"]["name"];
  $tmpname = $_FILES["image"]["tmp_name"];
  $folder = "image/" . $file_name;


  if (move_uploaded_file($tmpname, $folder)) {



    if (!empty($_POST)) {
      $sql = "INSERT INTO `product`(`img`, `product_name`, `price`, `descr` ) VALUES (?,?,?,?)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        $folder,
        $_POST['product_name'],
        $_POST['price'],
        $_POST['descr'],

      ]);
      header("Location: product.php");
    }
  } else {
    echo "upload file false";
  }
}
?>

<?php include __DIR__ . "/parts/header.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<style>
  .form-text {
    color: red;
  }
</style>
<div class="contain">
  <div class="row">
    <div class="col-4">
      <?php include __DIR__ . "/parts/sidebar.php" ?>
    </div>
    <div class="col-8">
      <div class="contain row justify-content-center">

        <h2>新增</h2>
        <div class="row ">
          <div class="col-6">
            <div class="card" style="width: 18rem;">

              <div class="card-body">
                <h5 class="card-title">新增商品</h5>

                <form name="form1" enctype="multipart/form-data" method="post">

                  <div class="mb-3">
                    <label for="product_name" class="form-label">商品名稱 </label>
                    <input type="text" class="form-control" name="product_name" id="product_name" />
                    <div class="form-text"></div>
                  </div>

                  <div class="mb-3">
                    <label for="price" class="form-label">總價 </label>
                    <input type="text" class="form-control" name="price" id="price" />
                    <div class="form-text"></div>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">商品描述 </label>
                    <textarea name="descr" id="descr"></textarea>
                    <div class="form-text"></div>
                  </div>
                  <div class="mb-3">
                    <label for="amount" class="form-label">商品圖片 </label>
                    <input type="file" name="image" id="image">
                    <div class="form-text"></div>
                  </div>

                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include __DIR__ . "/parts/script.php" ?>
<script>



</script>
<?php include __DIR__ . "/parts/footer.php" ?>