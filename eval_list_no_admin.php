<?php require __DIR__."/parts/db_link.php";
$title = '評論列表';
$pageName = 'eval_list';

$page=isset($_GET['page']) ? intval($_GET['page']) :1; #用戶選擇進去第幾頁
if($page<1){	
	header("Location: ?page=1");
	exit();
}

$perPage=10; #每一頁筆數
$total_sql="SELECT COUNT(1) FROM comment_fake ";
$total_rows=$pdo->query($total_sql)->fetch(PDO::FETCH_NUM)[0];#總筆數
$total_pages=ceil($total_rows/$perPage);#總頁數
# echo json_encode([$total_rows,$total_pages]);

if($page>$total_pages){
	header("Location: ?page=".$total_pages);
	exit();
}
$sql=sprintf("SELECT * FROM comment_fake LIMIT %s, %s",($page-1)*$perPage,$perPage);
$rows=$pdo->query($sql)->fetchAll();
// echo json_encode($rows);
?>

<?php include __DIR__."/parts/header.php"?>
<?php include __DIR__."/parts/navbar.php"?>

<div class="contain">
	<h2>列表</h2>
	<div class="contain">
		<div class="row">
			<div class="col-3">
			<?php include __DIR__."/parts/sidebar.php"?>
			</div>
			<div class="col-9">
			<div class="contain">
	<div class="row">
		<div class="col">
		<nav aria-label="Page navigation example">
  <ul class="pagination">
		<!-- 跳到第一頁 -->
		<li> 
	  <a class="page-link" href="?page=<?=1?>" aria-label="Next">
		<i class="bi bi-chevron-double-left"></i> 
		</a> 		
	  </li>
    <!-- 跳到前一頁 -->
    <li class="page-item"> 
      <?php if($page>1):?>
      <a class="page-link" href="?page=<?=$page-1?>" aria-label="Previous">
			<i class="bi bi-chevron-left"></i>
      </a>
			<?php endif?>
			<!-- 頁數選擇鍵 -->
    </li>
		<?php for($i=$page-2;$i<=$page+2;$i++):?>
			<!-- <?php if($i>=1 and $i<=$total_pages): ?> -->
    <li class="page-item"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
		<!-- <?php endif ?> -->
    <?php endfor?>
		<!-- 跳到後一頁 -->
    <li class="page-item">
		<?php if($page<$total_pages):?>
      <a class="page-link" href="?page=<?=$page+1?>" aria-label="Next">
			<i class="bi bi-chevron-right"></i>
			</a>
		<?php endif?>
    </li>
		<!-- 跳到最後一頁 -->
		<li>
		<a class="page-link" href="?page=<?=$total_pages?>" aria-label="Next">
		<i class="bi bi-chevron-double-right"></i>
		</a>
		</li>
  </ul>
</nav>
		</div>
	</div>
	<div class="row">
		<div class="col">

		<table class="table table-striped">
  <thead>
    <tr>
		<th scope="col">評論編號</th>
      <th scope="col">訂單編號</th>
      <th scope="col">賣家</th>
      <th scope="col">買家</th>
      <th scope="col">評分</th>
			<th scope="col">評論</th>
			<th scope="col">評論日期</th>
			
    </tr>
  </thead>
  <tbody>
	<?php foreach($rows as $r):?>
	<tr>
	
	<td><?=$r["id"]?></td>
	<td><?=$r["order_id"]?></td>
		<td><?=$r["sellername"]?></td>
      <td><?=$r["buyername"]?></td>
      <td><?=$r["rate"]?></td>
			<td><?=htmlentities($r["comment"])?></td>
			<td><?=$r["creat_at"]?></td>
			
    </tr>
		<?php endforeach ?>
  </tbody>
</table>
<a href="list.php" class="btn btn-primary">回到列表</a>
		</div>
	</div>
</div></div></div></div></div>



<?php include __DIR__."/parts/script.php"?>
<script>

function deleteIt(sid){
	if(confirm(`是否要刪除第${sid}筆評論`)){
		location.href=`eval_del.php?sid=${sid}`;
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
    
<?php include __DIR__."/parts/footer.php"?>