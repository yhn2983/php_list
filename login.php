<?php
require __DIR__ . '/parts/db_link.php';
$title="登入";
$pagename="login";

?>
<?php include __DIR__ . '/parts/header.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
  .form-text{
    color:red;
  }
</style>

<div class="container">
	<div class="row">
		<div class="col-6">
		<div class="card" style="width: 18rem;">
  
  <div class="card-body">
    <h5>登入</h5>
<form name="form1" onsubmit="sendData(event)">
  
	<div class="mb-3">
    <label class="form-label">電郵</label>
    <input type="text" class="form-control" name="email" id="email">
    <div  class="form-text"></div>
  </div>
	
	<div class="mb-3">
    <label class="form-label">密碼</label>
    <input type="password" class="form-control" name="password" id="password">
    <div  class="form-text"></div>
  </div>
	
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    
  </div>
</div>
		</div>
	</div>
</div>

<!-- Modal -->


<div class="modal fade" id="failureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">登入失敗</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert" id="failureInfo">
         帳號或密碼錯誤
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
        <a href="list.php" class="btn btn-primary">跳到列表頁</a>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/parts/script.php' ?>
<script>

const {
    email: emailEl,
    password: passwordEl,
  } = document.form1;



  function sendData(e){
//恢復外觀

const feilds=[emailEl,passwordEl];

for(let el of feilds){
el.style.border="1px solid #CCC";
el.nextElementSibling.innerHTML="";
}
/*
    nameEl.style.border="1px solid #CCC";
  nameEl.nextElementSibling.innerHTML="";
  emailEl.style.border="1px solid #CCC";
  emailEl.nextElementSibling.innerHTML="";
  mobileEl.style.border="1px solid #CCC";
  mobileEl.nextElementSibling.innerHTML="";
*/
  function validateEmail(email){
  const re=  /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(email);
}



e.preventDefault(); //不要讓表單以傳統方式送出
let isPass=true;//表單有無通過檢查
//TODO:檢查各個欄位的資料，有沒有符合規範




if(emailEl.value!=" " && !validateEmail(emailEl.value)){
  isPass=false; //電郵不符規定
  emailEl.style.border="1px solid red";
  emailEl.nextElementSibling.innerHTML="請填寫正確email";
}
if(passwordEl.value.length<1 ){
  isPass=false; //密碼不符規定
  passwordEl.style.border="1px solid red";
  passwordEl.nextElementSibling.innerHTML="請填寫密碼";
}


if(isPass==true){
  const fd=new FormData(document.form1);//沒有外觀的表單物件

    fetch(`login_api.php`,{
      method:"POST",
      body:fd,
    }).then(r=>r.json()).then(result=>{
      console.log(result);
      /*
      if(result.success){
        alert("新增成功");
        location.href="list.php";
      }else{
        alert("失敗\n"+result.error);
      }
      */
     if(result.success){
     location.href= 'index_.php';
     }else{
      document.querySelector("#failureInfo").innerHTML=result.error;
      failureModal.show();
     }
    })}
  }

  const failureModal = new bootstrap.Modal('#failureModal');
</script>

<?php include __DIR__ . '/parts/footer.php' ?>