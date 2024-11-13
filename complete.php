<?php
require __DIR__."/parts/db_link.php";
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
    // 发送 Fetch 请求
    fetch('complete_api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: 'id=<?=$r["id"]?>', // 传递订单ID，假设为1
    })
    .then(response => response.json())
    .then(data => {
        // 处理服务器响应
        console.log(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

</script>
<?php include __DIR__."/parts/footer.php" ?>
