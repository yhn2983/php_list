<?php
require __DIR__ . '/parts/db_link.php';
$title = "註冊";
$pagename = "register";
?>
<?php include __DIR__ . '/parts/header.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
  .form-text {
    color: red;
  }
</style>

<div class="container">
  <div class="row">
    <div class="col-6">
      <div class="card" style="width: 18rem;">

        <div class="card-body">
          <h5>註冊</h5>
          <form name="f1" onsubmit="sendData(event)" method="post">
            <div class="mb-3">
              <label class="form-label">名字</label>
              <input type="text" class="form-control" name="name" id="name">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label class="form-label">暱稱</label>
              <input type="text" class="form-control" name="nickname" id="nickname">
              <div class="form-text"></div>
            </div>
            <div class="mb-3">
              <label class="form-label">電郵</label>
              <input type="text" class="form-control" name="email" id="email">
              <div class="form-text"></div>
            </div>

            <div class="mb-3">
              <label class="form-label">密碼</label>
              <input type="password" class="form-control" name="password" id="password">
              <div class="form-text"></div>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include __DIR__ . '/parts/script.php' ?>

<script>
  const {
    name: nameEl,
    nickname: nicknameEl,
    email: emailEl,
    password: passEl
  } = document.f1;

  const sendData = (e) => {
    e.preventDefault();
    const feilds = [nameEl, nicknameEl, emailEl, passEl];
    for (let el of feilds) {
      el.style.border = "1px solid #CCC";
      el.nextElementSibling.innerHTML = "";
    }

    function validateEmail(email) {
      const re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }



    let isPass = true;
    if (emailEl.value != " " && !validateEmail(emailEl.value)) {
      isPass = false; //電郵不符規定
      emailEl.style.border = "1px solid red";
      emailEl.nextElementSibling.innerHTML = "信箱格式不符";
    }
    if (passEl.value.length < 1) {
      isPass = false; //密碼不符規定
      passEl.style.border = "1px solid red";
      passEl.nextElementSibling.innerHTML = "請填寫密碼";
    }
    if (nameEl.value.length < 1) {
      isPass = false; //不符規定
      nameEl.style.border = "1px solid red";
      nameEl.nextElementSibling.innerHTML = "請填寫姓名";
    }
    if (nicknameEl.value.length < 1) {
      isPass = false; //不符規定
      nicknameEl.style.border = "1px solid red";
      nicknameEl.nextElementSibling.innerHTML = "請填寫暱稱";
    }
    if (isPass == true) {
      const fd = new FormData(document.f1); //沒有外觀的表單物件

      fetch("register_api.php", {
        method: "POST",
        body: fd,
      }).then(r => r.json()).then(result => {
        console.log(result);

        if (result.success) {
          alert("新增成功");
          location.href = "list.php";
        } else {
          alert("失敗\n" + result.error);
        }

        // if (result.success) {
        //   location.href = 'index_.php';
        // } else {
        //   document.querySelector("#failureInfo").innerHTML = result.error;
        //   failureModal.show();
        //}
      }).catch(error => {
        console.error("Fetch error:", error);
        alert("请求失败，请稍后重试");
      })
    }
  }
</script>

<?php include __DIR__ . '/parts/footer.php' ?>