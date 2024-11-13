<?php
require __DIR__ ."/parts/admin_required.php";
require __DIR__."/parts/db_link.php";
$title="修改評論";
$pageName="eval_edit";

$sid=isset($_GET["sid"])? intval($_GET["sid"]):0;
if(empty($sid)){
  header("Location: eval_list.php");
  exit;
}

$sql="SELECT * FROM comment_fake where id=$sid";
$r=$pdo->query($sql)->fetch();
if(empty($r)){
  header("Location: list.php");
  exit;
}

?>

<?php include __DIR__."/parts/header.php" ?>
<?php include __DIR__."/parts/navbar.php" ?>
<style>
    .form-text{
        color: red;
    }
</style>
<div class="contain">
    <div class="row">
        <div class="col-4">
<?php include __DIR__."/parts/sidebar.php"?>
</div>
<div class="contain row justify-content-center" >
	<h2>新增</h2>
	<div class="row ">
        <div class="col-6">
	<div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">新增訂單</h5>

	<form name="form1" id="form1" method="post" onsubmit="sendData(event)">
   
<input type="hidden" name="sid" value="<?=$r["id"]?>">

<div class="mb-3">
    <label for="seller" class="form-label">訂單編號 </label>
    <input type="text" class="form-control" name="order_id" id="order_id" value="<?=$r["id"]?>" readonly/>
    <div class="form-text"></div>
	</div>
	<div class="mb-3">
    <label for="seller" class="form-label">賣家 </label>
    <input type="text" class="form-control" name="seller" id="seller" value="<?=$r["sellername"]?>"readonly/>
    <div class="form-text"></div>
	</div>
	<div class="mb-3">
    <label for="buyer" class="form-label">買家 </label>
    <input type="text" class="form-control" name="buyer" id="buyer" value="<?=$r["buyername"]?>"readonly/>
    <div class="form-text"></div>
	</div>
	<div class="mb-3">
    <label for="price" class="form-label">評分 </label>
    <input type="number" class="form-control" name="rate" id="rate" value="<?= $r["rate"]?>" min="1" max="10" />
    <div class="form-text"></div>
	</div>
	<div class="mb-3">
    <label for="amount" class="form-label"> 評論 </label>
    <textarea name="comment" id="comment" cols="30" rows="10" ><?= $r["comment"]?></textarea>
    <div class="form-text"></div>
	</div>
    
  <button type="submit" class="btn btn-primary">修改</button>
	<a href="eval_list.php"><button type="button" class="btn btn-primary">取消</button></a>
</form>
  </div>
</div>
</div></div></div></div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改結果</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="alert alert-info" role="alert">
  修改成功
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" onclick="history.back()">回到列表</button>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__."/parts/script.php" ?>
<script>
const{email:emailEl,
    seller:sellerEl,
    buyer:buyerEl}=document.form1;

    
    

function sendData(e){
 e.preventDefault();//不要讓表單送出

//回復原本外觀
const feilds=[sellerEl];
    for(let el of feilds){
        el.style.border="1px solid #CCC";
        el.nextElementSibling.innerHTML="";
    }

    let isPass=true;
if(sellerEl.value.length<1){
        isPass=false; 
        sellerEl.style.border="1px solid red";
        sellerEl.nextElementSibling.innerHTML="請填寫正確資料";
    }
    if(buyerEl.value.length<1){
        isPass=false; 
        buyerEl.style.border="1px solid red";
        buyerEl.nextElementSibling.innerHTML="請填寫正確資料";
    }

    if(isPass==true){ //有通過檢查才發送
const fd=new FormData(document.form1);//沒外觀的表單物件
fetch(`eval_edit_api.php`,{
    method:"POST",
    body:fd,
}).then(r=>r.json()).then(data=>{
    console.log(data);
    if(data.success){
      myModal.show();
    }else{
      
    }
})


}  
}

//用JS 觸發 modal
const myModal = new bootstrap.Modal(document.getElementById('successModal'));
</script>
<?php include __DIR__."/parts/footer.php" ?>
