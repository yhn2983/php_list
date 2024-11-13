<?php
require __DIR__ ."/parts/admin_required.php";
require __DIR__."/parts/db_link.php";
$title="新增訂單";
$pageName="add";
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
<div class="col-8">
<div class="contain row justify-content-center" >
    
	<h2>新增</h2>
	<div class="row ">
        <div class="col-6">
	<div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title">新增訂單</h5>

	<form name="form1" method="post" onsubmit="sendData(event)">
 
	<div class="mb-3">
    <label for="seller" class="form-label">賣家 </label>
    <input type="text" class="form-control" name="seller" id="seller"/>
    <div class="form-text"></div>
	</div>
	<div class="mb-3">
    <label for="buyer" class="form-label">買家 </label>
    <input type="text" class="form-control" name="buyer" id="buyer"/>
    <div class="form-text"></div>
	</div>
	<div class="mb-3">
    <label for="price" class="form-label">總價 </label>
    <input type="text" class="form-control" name="price" id="price"/>
    <div class="form-text"></div>
	</div>
	<div class="mb-3">
    <label for="amount" class="form-label">總數 </label>
    <input type="text" class="form-control" name="amount" id="amount"/>
    <div class="form-text"></div>
	</div>
    <div class="mb-3">
    <label for="shipment_status" class="form-label">寄送方式 </label><br>
    <select for="shipment_status" class="form-label" id="shipment_status" name="shipment_status" onchange="shipment_cal()">
		<option value="0">請選擇運送方式</option>
    <option value="黑貓">黑貓</option>
		<option value="超商寄貨">超商寄貨</option>
		<option value="面交">面交</option>
	</select>
    <div class="form-text" id="behind"></div>
	</div>
	<div class="mb-3">
    <label for="shipment_fee" class="form-label">運費</label>
    <input type="text" class="form-control" name="shipment_fee" id="shipment_fee" value="" readonly/>
    <div class="form-text"></div>
	</div>
	
    <div class="mb-3">
	<label for="payment_status" class="form-label">付款方式 </label>
	<input type="text" class="form-control" name="payment_status" id="payment_status"/>
    <div class="form-text"></div>
	</div>
    <div class="mb-3">
	<label for="order_date" class="form-label">訂單日期 </label>
	<textarea type="text" class="form-control" name="order_date" id="order_date"><?=date("Y-m-d")?></textarea>
    <div class="form-text"></div>
    <div class="mb-3">
	<label for="status" class="form-label">訂單狀態 </label>
	<input type="text" class="form-control" name="status" id="status" value="未完成" readonly/>
    <div class="form-text"></div>
	</div>
</div>
    
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
</div></div>
</div>
	</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">新增結果</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="alert alert-info" role="alert">
  新增成功
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="list.php" class="btn btn-primary">回到列表</a>
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
fetch(`add_api.php`,{
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

function shipment_cal(){
  let mySelect=document.querySelector("#shipment_status");
	let myIndex=mySelect.selectedIndex;
	if(myIndex==1){
		document.querySelector("#shipment_fee").value=40;
	}else if(myIndex==2){
		document.querySelector("#shipment_fee").value=60;
	}if(myIndex==3){
		document.querySelector("#shipment_fee").value=0;
	}
	
}
//用JS 觸發 modal
const myModal = new bootstrap.Modal(document.getElementById('successModal'))
</script>
<?php include __DIR__."/parts/footer.php" ?>
