<?php
require __DIR__ ."/parts/admin_required.php";
require __DIR__."/parts/db_link.php";
 $output=[
	"success"=>false,
	"postData"=>$_POST,
	"error"=>" ",
	"code"=>0,
 ];
//echo json_encode($output, JSON_UNESCAPED_UNICODE);
//TODO:檢查個欄位的資料

if(!empty($_POST)&& !empty($_POST["sid"])){
$sql="UPDATE `order_fake` SET
 `sellername`=?,
 `buyername`=?,
 `total_price`=?,
 `total_amount`=?,
 `shipment_fee`=?,
 `payment_status`=?,
 `shipment_status`=?,
 `order_date`=? 
 WHERE `id`=?";
$stmt=$pdo->prepare($sql);
$stmt->execute([
	$_POST['seller'],
$_POST['buyer'],
$_POST['price'],
$_POST['amount'],
$_POST['shipment_fee'],
$_POST['payment_status'],
$_POST['shipment_status'],
$_POST['order_date'],
$_POST['sid']
]);

$output['code'] = 200;
$output['success']=boolval($stmt->rowCount());
}




 header("Content-Type: application/json");

 echo json_encode($output,JSON_UNESCAPED_UNICODE);
