<?php
require __DIR__ . '/parts/db_link.php';
header("Content-Type: application/json");
$output=[
	"success"=>false, #有沒有新增成功
	"postData"=>$_POST,
	"code"=>0, #追蹤程式執行的編號
];

if(empty($_POST["email"])or empty($_POST["password"])){
}else{
	$email=trim($_POST["email"]);
	$password=trim($_POST["password"]);

	$sql="SELECT * FROM members WHERE email=?";
	$stmt=$pdo->prepare($sql);
	$stmt->execute([$email]);
	$row=$stmt->fetch();
	if(empty($row)){
		#帳號錯誤
		$output['code']=410;
}else{
	$output['success']=password_verify($password,$row["password"]);
	$output['code']=$output['success']?200:420;

	if($output['success']){
		$_SESSION['admin']=[
			'id'=>$row['id'],
			'email'=>$email,
			'nickname'=>$row['nickname']
		];
	}
}
}



echo json_encode($output,JSON_UNESCAPED_UNICODE);