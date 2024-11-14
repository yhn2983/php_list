<style>
.side-bar {
  width: 310px;
  background-color: lightgrey;
}

.logo {
  width: 30px;
  height: 30px;
  border-radius: 50%;
}

.li-hover :hover {
  background-color: darkblue;
  color: white;
  border-radius: 20px;
}

.member-btn:hover,
.order-btn:hover,
.prod-btn:hover,
.cate-btn:hover,
.cou-btn:hover,
.eval-btn:hover {
  color: darkblue;
}


.sub-li,
.span-font {
  font-family: 'Caveat', cursive;
  font-size: large;
}

.sub-li:hover {
  background-color: lightblue;
  border-radius: 20px;
}

h4 {
  font-family: 'Caveat', cursive;
}
</style>


<div class="side-bar flex-shrink-0 p-3">
  <a href="index_main.php"
    class="d-flex align-items-center justify-content-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
    <img src="logo.png" alt="" class="logo me-2 mb-2">
    <span class="fs-5 fw-semibold span-font pt-1">
      <h2>DEAL CMS</h2>
    </span>
  </a>
  <ul class="list-unstyled ps-0">
    <li class="mb-1 d-flex justify-content-center">
      <a href="member.php">
        <button class="prod-btn btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
          data-bs-target="#Product-collapse" aria-expanded="false" type="button">
          <div class="title d-flex">
            <h5><i class="fa-regular fa-circle-user me-1"></i></h5>
            <h4>Member management</h4>
          </div>
        </button>
      </a>
    </li>
    <hr>
    <li class="mb-1 d-flex justify-content-center">
      <a href="20.index_product.php">
        <button class="prod-btn btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
          data-bs-target="#Product-collapse" aria-expanded="false" type="button">
          <div class="title d-flex">
            <h5><i class="fa-solid fa-toolbox me-1"></i></h5>
            <h4>Product management</h4>
          </div>
        </button>
      </a>
    </li>
    <hr>


    <li class="mb-1 d-flex flex-column">
      <button class="order-btn btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
        data-bs-target="#Order-collapse" aria-expanded="false" type="button">
        <div class="title d-flex align-items-center justify-content-center">
          <h5><i class="fa-solid fa-clipboard me-1"></i></h5>
          <h4>Order management</h4>
          <i class="fa-solid fa-angle-down ms-2"></i>
        </div>
      </button>
      <div class="collapse mt-2 mx-auto" id="Order-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li class="mb-2 sub-li"><a href="40.index_order-normal.php" class=" text-decoration-none rounded ">Normal
              orders</a></li>
          <li class="mb-2 sub-li"><a href="40.index_order-barter.php" class=" text-decoration-none rounded ">Barter
              orders</a></li>
          <li class="sub-li"><a href="40.index_order-bargain.php" class="text-decoration-none rounded ">Bargain
              orders</a></li>
        </ul>
      </div>
    </li>
    <hr>


    <li class="mb-1 d-flex flex-column">
      <button class="eval-btn btn btn-toggle rounded collapsed" data-bs-toggle="collapse"
        data-bs-target="#Evaluation-collapse" aria-expanded="false" type="button">
        <div class="title d-flex align-items-center justify-content-center">
          <h5><i class="fa-regular fa-star-half-stroke me-1"></i></h5>
          <h4>Evaluation management</h4>
          <i class="fa-solid fa-angle-down ms-2"></i>
        </div>
      </button>
      <div class="collapse mt-2 mx-auto" id="Evaluation-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <li class="mb-2 sub-li"><a href="60.index_evaluation-normal.php"
              class="text-decoration-none rounded sub-li ">Form normal orders</a></li>
          <li class="mb-2 sub-li"><a href="60.index_evaluation-barter.php"
              class="text-decoration-none rounded sub-li">From barter orders</a></li>
          <li class=" sub-li"><a href="60.index_evaluation-bargain.php"
              class=" text-decoration-none rounded sub-li">From bargain orders</a></li>
        </ul>
      </div>
    </li>
  </ul>
</div>