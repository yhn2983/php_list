<?php require __DIR__ . "/parts/db_link.php";
$title = '訂單列表';
$pageName = 'list';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1; #用戶選擇進去第幾頁
if ($page < 1) {
	header("Location: ?page=1");
	exit();
}

$perPage = 10; #每一頁筆數
$total_sql = "SELECT COUNT(1) FROM order_fake ";
$total_rows = $pdo->query($total_sql)->fetch(PDO::FETCH_NUM)[0]; #總筆數
$total_pages = ceil($total_rows / $perPage); #總頁數
# echo json_encode([$total_rows,$total_pages]);

if ($page > $total_pages) {
	header("Location: ?page=" . $total_pages);
	exit();
}

//表單排序選擇
if (session_status() == PHP_SESSION_NONE) {
	// 如果會話未啟動，啟動會話
	session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$sortType = $_POST["sortType"];

	$_SESSION["sortType"] = $sortType;
}
if (isset($_SESSION["sortType"])) {
	$sortType = $_SESSION["sortType"];
} else {
	$sortType = "idSmall";
}


if ($sortType == "idBig") {
	$sql = sprintf("SELECT * FROM order_fake order by id desc LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
} else {
	$sql = sprintf("SELECT * FROM order_fake LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
}
//$sql=sprintf("SELECT * FROM order_fake LIMIT %s, %s",($page-1)*$perPage,$perPage);
$rows = $pdo->query($sql)->fetchAll();
// echo json_encode($rows);
?>

<?php include __DIR__ . "/parts/header.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<div class="contain">
	<h2><?= $title ?></h2>
	<div class="contain">
		<div class="row">
			<div class="col-3">
				<?php include __DIR__ . "/parts/sidebar.php" ?>
			</div>
			<div class="col-9">
				<div class="contain">
					<div class="row">
						<div class="col">
							<nav aria-label="Page navigation example">
								<ul class="pagination">
									<!-- 跳到第一頁 -->
									<li>
										<a class="page-link" href="?page=<?= 1 ?>" aria-label="Next">
											<i class="bi bi-chevron-double-left"></i>
										</a>
									</li>
									<!-- 跳到前一頁 -->
									<li class="page-item">
										<?php if ($page > 1): ?>
											<a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
												<i class="bi bi-chevron-left"></i>
											</a>
										<?php endif ?>
										<!-- 頁數選擇鍵 -->
									</li>
									<?php if ($page - 2 < 1): ?>
										<?php for ($i = 1; $i <= 5; $i++): ?>
											<li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
										<?php endfor ?>
									<?php elseif ($page + 2 > $total_pages): ?>
										<?php for ($i = $total_pages - 4; $i <= $total_pages; $i++): ?>
											<li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
										<?php endfor ?>
									<?php else: ?>
										<?php for ($i = $page - 2; $i <= $page + 2; $i++): ?>
											<?php if ($i >= 1 and $i <= $total_pages): ?>
												<li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
											<?php endif ?>
										<?php endfor ?>
									<?php endif ?>
									<!-- 跳到後一頁 -->
									<li class="page-item">
										<?php if ($page < $total_pages): ?>
											<a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
												<i class="bi bi-chevron-right"></i>
											</a>
										<?php endif ?>
									</li>
									<!-- 跳到最後一頁 -->
									<li>
										<a class="page-link" href="?page=<?= $total_pages ?>" aria-label="Next">
											<i class="bi bi-chevron-double-right"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					<div class="row">
						<div class="col">

							<form action="list.php" method="post" id="sortForm" name="sortform">
								<label for="sortType">排序:</label>
								<select name="sortType" id="sortType">
									<option value="idSmall">依編號由小到大</option>
									<option value="idBig">依編號由大到小</option>

								</select>
								<input type="submit" value="排序">
							</form>
							<table class="table table-striped">
								<thead>
									<tr>

										<th scope="col">編號</th>
										<th scope="col">賣家</th>
										<th scope="col">買家</th>


										<th scope="col">訂單日期</th>
										<th scope="col">訂單狀態</th>

									</tr>
								</thead>
								<tbody>
									<?php foreach ($rows as $r): ?>
										<tr>

											<td><?= $r["id"] ?></td>
											<td><?= $r["sellername"] ?></td>
											<td><?= $r["buyername"] ?></td>

											<td><?= htmlentities($r["order_date"]) ?></td>
											<td><?= $r["status"] ?></td>

										</tr>
									<?php endforeach ?>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php include __DIR__ . "/parts/script.php" ?>
<script>
	function deleteIt(sid) {
		if (confirm(`是否要刪除第${sid}筆訂單`)) {
			location.href = `del.php?sid=${sid}`;
		}

	}

	function completeIt(sid) {
		if (confirm(`是否已完成第${sid}筆訂單`)) {
			location.href = `complete_api.php?sid=${sid}`;
		}

	}

	// fetch("parts/db_link.php")
	//   .then((r) => r.json())
	//   .then((data) => {
	//     console.log(data);
	// 		let str=" ";
	// 	for(let item of data){
	//   str+=tableRow(item);
	// 	}
	// 	document.querySelector("tbody").innerHTML=str;
	//   })
	//   .catch((ex) => console.log(ex));

	document.getElementById("completeOrderBtn").addEventListener("click", function() {
		// 獲取訂單ID
		var orderId = event.target.closest("tr").querySelector("td:first-child").textContent;

		// 使用 fetch 發送 POST 請求
		fetch("complete_api.php", {
				method: "POST",
				headers: {
					"Content-Type": "application/x-www-form-urlencoded"
				},
				body: "orderId=" + orderId
			})
			.then(response => response.json())
			.then(data => {
				if (data.success) {
					alert("訂單已完成");
				} else {
					alert("訂單完成失敗：" + data.message);
				}
			})
			.catch(error => {
				console.error("Error:", error);
				alert("發生錯誤");
			});
	});
</script>

<?php include __DIR__ . "/parts/footer.php" ?>