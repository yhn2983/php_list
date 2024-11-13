<?php

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
 
	
	</div>
	<div class="mb-3">
    <select for="shipment_status" class="form-label" id="shipment_status" name="shipment_status" onchange="test()">寄送方式 
		<option value="0">請選擇運送方式</option>
    <option value="a">黑貓</option>
		<option value="b">超商寄貨</option>
		<option value="c">面交</option>
	</select>
    <div class="form-text" id="behind"></div>
	
	<div class="mb-3">
    <label for="shipment_fee" class="form-label">運費</label>
    <input type="text" class="form-control" name="shipment_fee" id="shipment_fee" value=""/>
    <div class="form-text"></div>
	</div>
	
	
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

    function test(){
  let mySelect=document.querySelector("#shipment_status");
	let myIndex=mySelect.selectedIndex;
	if(myIndex==0){
		document.querySelector("#shipment_fee").value=40;
	}else if(myIndex==1){
		document.querySelector("#shipment_fee").value=60;
	}if(myIndex==2){
		document.querySelector("#shipment_fee").value=0;
	}
	
}



//回復原本外觀


//用JS 觸發 modal
const myModal = new bootstrap.Modal(document.getElementById('successModal'))
</script>
<?php include __DIR__."/parts/footer.php" ?>