<?php require __DIR__."/parts/db_link.php"?>

<?php include __DIR__."/parts/header.php"?>
<?php include __DIR__."/parts/navbar.php"?>

<div class="contain">
	<div class="row">
		<div class="col">

		<table class="table">
  <thead>
    <tr>
      <th scope="col">編號</th>
      <th scope="col">賣家</th>
      <th scope="col">買家</th>
      <th scope="col">總價</th>
			<th scope="col">數量</th>
			<th scope="col">運費</th>
			<th scope="col">付款方式</th>
			<th scope="col">寄送方式</th>
			<th scope="col">訂單日期</th>
    </tr>
  </thead>
  <tbody>
    
  </tbody>
</table>

		</div>
	</div>
</div>



<?php include __DIR__."/parts/script.php"?>
<script>

const tableRow=(r)=>{
	return`
	<tr>
		<td>${r.id}</td>
		<td>${r.sellername}</td>
      <td>${r.buyername}</td>
      <td>${r.total_price}</td>
			<td>${r.total_amount}</td>
			<td>${r.shipment_fee}</td>
			<td>${r.payment_status}</td>
			<td>${r.shipment_status}</td>
			<td>${r.order_date}</td>
    </tr>
`;
}

      fetch("parts/db_link.php")
        .then((r) => r.json())
        .then((data) => {
          console.log(data);
					let str=" ";
				for(let item of data){
        str+=tableRow(item);
				}
				document.querySelector("tbody").innerHTML=str;
        })
        .catch((ex) => console.log(ex));</script>   
    <script> </script>
<?php include __DIR__."/parts/footer.php"?>