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


if ($sortType == "priceSmall") {
	$sql = sprintf("SELECT * FROM order_fake order by total_price LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
} else if ($sortType == "priceBig") {
	$sql = sprintf("SELECT * FROM order_fake order by total_price desc LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
} else if ($sortType == "idBig") {
	$sql = sprintf("SELECT * FROM order_fake order by id desc LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
} else {
	$sql = sprintf("SELECT * FROM order_fake LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
}
//$sql=sprintf("SELECT * FROM order_fake LIMIT %s, %s",($page-1)*$perPage,$perPage);


// 搜尋欄位	
if (isset($_GET["keyword"]) && $_GET["keyword"] != "") {
	$keyword = "%" . $_GET["keyword"] . "%";
	$sql = "SELECT * FROM order_fake WHERE  
			sellername LIKE ? OR
			buyername LIKE ? OR
			total_price LIKE ? OR
			total_amount LIKE ? OR
			shipment_status LIKE ? OR
			shipment_fee LIKE ? OR
			status LIKE ? 
			ORDER BY id DESC";

	$stmt = $pdo->prepare($sql);

	// Bind parameters with data type separately
	$stmt->bindValue(1, $keyword, PDO::PARAM_STR);
	$stmt->bindValue(2, $keyword, PDO::PARAM_STR);
	$stmt->bindValue(3, $keyword, PDO::PARAM_STR);
	$stmt->bindValue(4, $keyword, PDO::PARAM_STR);
	$stmt->bindValue(5, $keyword, PDO::PARAM_STR);
	$stmt->bindValue(6, $keyword, PDO::PARAM_STR);
	$stmt->bindValue(7, $keyword, PDO::PARAM_STR);

	// Execute the statement
	$stmt->execute();

	// Fetch the result or perform other operations
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// Process the result as needed
}
// 
else {
	$rows = $pdo->query($sql)->fetchAll();
}
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

							<!-- 搜尋列 -->
							<form action="list.php" method="GET" id="searchForm" name="searchForm">
								<input type="text" name="keyword" id="keyword">
								<input type="submit" value="搜尋">
							</form>
							<!-- 搜尋列 -->


							<form action="list.php" method="post" id="sortForm" name="sortform">
								<label for="sortType">排序:</label>
								<select name="sortType" id="sortType">
									<option value="idSmall">依編號由小到大</option>
									<option value="idBig">依編號由大到小</option>
									<option value="priceSmall">依價格由小到大</option>
									<option value="priceBig">依價格由大到小</option>
								</select>
								<input type="submit" value="排序">
							</form>
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">評論訂單</th>
										<th scope="col">完成訂單</th>
										<th scope="col">編號</th>
										<th scope="col">賣家</th>
										<th scope="col">買家</th>
										<th scope="col">總價</th>
										<th scope="col">數量</th>
										<th scope="col">運費</th>
										<th scope="col">付款方式</th>
										<th scope="col">寄送方式</th>
										<th scope="col">訂單日期</th>
										<th scope="col">訂單狀態</th>
										<th scope="col">修改</th>
										<th scope="col">刪除</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($rows as $r): ?>
										<tr>
											<td><a href="eval_add.php?sid=<?= $r["id"] ?>"><button type="button" class="btn btn-primary">
														評論</button></a></td>
											<td><a href="javascript: completeIt(<?= $r["id"] ?>)"><button type="button" class="btn btn-success">
														完成</button></a></td>
											<td><?= $r["id"] ?></td>
											<td><?= $r["sellername"] ?></td>
											<td><?= $r["buyername"] ?></td>
											<td><?= $r["total_price"] ?></td>
											<td><?= $r["total_amount"] ?></td>
											<td><?= $r["shipment_fee"] ?></td>
											<td><?= $r["payment_status"] ?></td>
											<td><?= $r["shipment_status"] ?></td>
											<td><?= htmlentities($r["order_date"]) ?></td>
											<td><?= $r["status"] ?></td>
											<td><a href="edit.php?sid=<?= $r["id"] ?>"><i class="bi bi-pencil-square"></i></a></td>
											<td><a href="javascript: deleteIt(<?= $r["id"] ?>)"><i class="bi bi-x-square"></i></a></td>
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
	</script>

	<?php include __DIR__ . "/parts/footer.php" ?>