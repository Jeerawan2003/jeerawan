 <!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จีรวรรณ์ มาทอ (ส้มจี๊ด)</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-light">

<div class="container mt-4">
    <h1 class="text-center mb-4">
         จีรวรรณ์ มาทอ (ส้มจี๊ด)
    </h1>

<?php
include_once("connectdb.php");
$sql = "SELECT p_country, SUM(p_amount) AS total 
        FROM popsupermarket 
        GROUP BY p_country";
$rs = mysqli_query($conn, $sql);

$countries = [];
$totals = [];

while ($data = mysqli_fetch_assoc($rs)) {
    $countries[] = $data['p_country'];
    $totals[] = $data['total'];
}
?>

    <!-- กราฟ -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow p-3">
                <canvas id="barChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow p-3">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- ตาราง -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            ตารางสรุปยอดขายตามประเทศ
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ประเทศ</th>
                        <th>จำนวนเงิน</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                mysqli_data_seek($rs, 0);
                while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td><?= $row['p_country']; ?></td>
                        <td class="text-end"><?= number_format($row['total'],0); ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script>
const labels = <?= json_encode($countries); ?>;
const data = <?= json_encode($totals); ?>;

// Bar Chart
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'ยอดขาย',
            data: data
        }]
    }
});

// Pie Chart
new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            data: data
        }]
    }
});
</script>

<?php mysqli_close($conn); ?>

</body>
</html>
