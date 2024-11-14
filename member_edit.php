<?php
require __DIR__ . "/parts/admin_required.php";
require __DIR__ . "/parts/db_link.php";
$title = "修改訂單";
$pageName = "member_edit";

$sid = isset($_GET["sid"]) ? intval($_GET["sid"]) : 0;
if (empty($sid)) {
  header("Location: member.php");
  exit;
}

$sql = "SELECT * FROM members where id=$sid";
$r = $pdo->query($sql)->fetch();
if (empty($r)) {
  header("Location: member.php");
  exit;
}

?>

<?php include __DIR__ . "/parts/header.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>
<style>
  .form-text {
    color: red;
  }
</style>
<div class="contain">
  <div class="row">
    <div class="col-4">
      <?php include __DIR__ . "/parts/sidebar.php" ?>
    </div>
    <div class="col-8">
      <div class="contain row justify-content-center">
        <h2>修改</h2>
        <div class="row ">
          <div class="col-6">
            <div class="card" style="width: 18rem;">

              <div class="card-body">
                <h5 class="card-title">修改會員資料</h5>

                <form name="form1" id="form1" method="post" onsubmit="sendData(event)">

                  <input type="hidden" name="sid" value="<?= $r["id"] ?>">

                  <div class="mb-3">
                    <label for="name" class="form-label">姓名 </label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= $r["name"] ?>" />
                    <div class="form-text"></div>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">信箱 </label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $r["email"] ?>" />
                    <div class="form-text"></div>
                  </div>
                  <div class="mb-3">
                    <label for="nickname" class="form-label">暱稱 </label>
                    <input type="text" class="form-control" name="nickname" id="nickname"
                      value="<?= $r["nickname"] ?>" />
                    <div class="form-text"></div>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">密碼 </label>
                    <input type="text" class="form-control" name="password" id="password" value="<?= $r["password"] ?>"
                      readonly />
                    <div class="form-text"></div>
                  </div>


                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
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
        <h5 class="modal-title" id="exampleModalLabel">結果</h5>
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

<?php include __DIR__ . "/parts/script.php" ?>
<script>
  const {
    email: emailEl,
    name: nameEl,
    nickname: nicknameEl,
    password: passEl
  } = document.form1;




  function sendData(e) {
    e.preventDefault(); //不要讓表單送出

    //回復原本外觀
    const feilds = [emailEl, nameEl, nicknameEl, passEl];
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
    if (nameEl.value.length < 1) {
      isPass = false;
      nameEl.style.border = "1px solid red";
      nameEl.nextElementSibling.innerHTML = "請填寫正確資料";
    }
    if (nicknameEl.value.length < 1) {
      isPass = false;
      nicknameEl.style.border = "1px solid red";
      nicknameEl.nextElementSibling.innerHTML = "請填寫正確資料";
    }
    if (emailEl.value != " " && !validateEmail(emailEl.value)) {
      isPass = false; //電郵不符規定
      emailEl.style.border = "1px solid red";
      emailEl.nextElementSibling.innerHTML = "信箱格式不符";
    }

    if (isPass == true) { //有通過檢查才發送
      const fd = new FormData(document.form1); //沒外觀的表單物件
      fetch(`member_edit_api.php`, {
        method: "POST",
        body: fd,
      }).then(r => r.json()).then(data => {
        console.log(data);
        if (data.success) {
          myModal.show();
        } else {

        }
      })


    }
  }

  //用JS 觸發 modal
  const myModal = new bootstrap.Modal(document.getElementById('successModal'));
</script>
<?php include __DIR__ . "/parts/footer.php" ?>