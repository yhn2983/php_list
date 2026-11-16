<?php
require __DIR__ ."/parts/admin_required.php";
require __DIR__."/parts/db_link.php";
require __DIR__."/parts/csrf.php";
$title="新增評論";
$pageName="eval_add";

$sid=isset($_GET["sid"])? intval($_GET["sid"]):0;
if(empty($sid)){
  header("Location: list.php");
  exit;
}

$sql="SELECT * FROM order_fake where id=$sid";
$r=$pdo->query($sql)->fetch();
if(empty($r)){
  header("Location: list.php");
  exit;
}

?>

<?php include __DIR__."/parts/header.php" ?>
<?php include __DIR__."/parts/navbar.php" ?>

<button class="btn btn-primary"  onclick="history.back()">取消</button>
<button class="btn btn-primary"  id="completeBtn">完成訂單</button>
<script>


document.getElementById('completeBtn').addEventListener('click', function() {
    if (!confirm('是否已完成第<?= intval($r["id"]) ?>筆訂單')) {
        return;
    }
    // 用 POST 送出訂單 ID 與 CSRF token
    const fd = new FormData();
    fd.append('sid', '<?= intval($r["id"]) ?>');
    fd.append('csrf_token', '<?= htmlspecialchars($_SESSION["csrf_token"]) ?>');
    fetch('complete_api.php', {
        method: 'POST',
        body: fd,
    })
    .then(response => {
        // complete_api.php 完成後會轉址回列表
        location.href = 'list.php';
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script>
<?php include __DIR__."/parts/footer.php" ?>
