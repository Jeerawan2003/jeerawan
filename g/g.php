<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จีรวรรณ์ มาทอ (ส้มจี๊ด)</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{
    background: linear-gradient(120deg,#fdfbfb,#ebedee);
}
.card{
    border: none;
    border-radius: 16px;
}
h2{
    font-weight: 600;
}
</style>
</head>

<body>
<div class="container py-5">

<h2 class="text-center mb-4">📊 Dashboard ยอดขายรายเดือน</h2>

<?php
include_once("connectdb.php");
$sql="SELECT MONTH(p_date) m, SUM(p_amount) total
      FROM popsupermarket
      GROUP BY MONTH(p_date)
      ORDER BY m";
$rs=mysqli_query($conn,$sql);

$month=[]; $total=[];
while($row=mysqli_fetch_assoc($rs)){
    $month[]=$row['m'];
    $total[]=$row['total'];
}
?>

<!-- ตาราง -->
<div class="card shadow-sm mb-4">
<div class="card-body">
<h5 class="mb-3">📋 ตารางยอดขาย</h5>
<table class="table table-hover text-center align-middle">
<thead style="background:#f1f3f5">
<tr>
<th>เดือน</th>
<th>ยอดขาย (บาท)</th>
</tr>
</thead>
<tbody>
<?php foreach($month as $i=>$m){ ?>
<tr>
<td><?= $m ?></td>
<td class="text-end"><?= number_format($total[$i],0) ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>

<!-- กราฟ -->
<div class="row g-4">
<div class="col-md-6">
<div class="card shadow-sm p-3">
<h6 class="text-center">Bar Chart</h6>
<canvas id="barChart"></canvas>
</div>
</div>

<div class="col-md-3">
<div class="card shadow-sm p-3">
<h6 class="text-center">Pie Chart</h6>
<canvas id="pieChart"></canvas>
</div>
</div>

<div class="col-md-3">
<div class="card shadow-sm p-3">
<h6 class="text-center">Doughnut Chart</h6>
<canvas id="doughnutChart"></canvas>
</div>
</div>
</div>

</div>

<script>
const labels = <?= json_encode($month) ?>;
const data = <?= json_encode($total) ?>;

const pastelColors = [
'#A7C7E7','#FBC4AB','#B9FBC0',
'#FFD6E0','#CDB4DB','#FFF1A8'
];

const baseDataset = {
    data: data,
    backgroundColor: pastelColors,
    borderRadius: 12,
    hoverOffset: 10
};

new Chart(barChart, {
    type: 'bar',
    data: { labels, datasets: [{...baseDataset,label:'ยอดขาย'}]},
    options:{plugins:{legend:{display:false}}}
});

new Chart(pieChart, {
    type: 'pie',
    data: { labels, datasets: [baseDataset] }
});

new Chart(doughnutChart, {
    type: 'doughnut',
    data: { labels, datasets: [baseDataset] },
    options:{cutout:'65%'}
});
</script>

</body>
</html>
