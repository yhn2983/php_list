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
$sql="INSERT INTO `order_fake`(`sellername`, `buyername`, `total_price`, `total_amount`, `shipment_fee`, `payment_status`, `shipment_status`,`order_date`,`status`) VALUES (?,?,?,?,?,?,?,?,?)";
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
$_POST['status'],
]);


$output['success']=boolval($stmt->rowCount());
}




 header("Content-Type: application/json");

 echo json_encode($output,JSON_UNESCAPED_UNICODE);
