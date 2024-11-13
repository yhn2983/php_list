<?php
require __DIR__ ."/parts/admin_required.php";
require __DIR__."/parts/db_link.php";
 $output=[
	"success"=>false,
	"postData"=>$_POST,
	"error"=>" ",
	"code"=>0,
 ];

//TODO:檢查個欄位的資料

if(!empty($_POST)){
$sql="INSERT INTO `comment_fake`(`order_id`,`sellername`, `buyername`, `rate`, `comment`, `creat_at`) VALUES (?,?,?,?,?,NOW())";
$stmt=$pdo->prepare($sql);
$stmt->execute([
	$_POST['order_id'],
	$_POST['seller'],
$_POST['buyer'],
$_POST['rate'],
$_POST['comment'],
]);


$output['success']=boolval($stmt->rowCount());
}




 header("Content-Type: application/json");

 echo json_encode($output,JSON_UNESCAPED_UNICODE);
