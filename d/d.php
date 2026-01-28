<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>จีรวรรณ์ มาทอ (ส้มจี๊ด)</title>

<!-- Bootstrap 5.3 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{
        background:#f5f6fa;
    }
    .card{
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1{
        text-align:center;
        margin-top:20px;
        margin-bottom:20px;
        font-weight:bold;
    }
</style>

</head>

<body>

<h1>ฟอร์มรับข้อมูล - จีรวรรณ์ มาทอ (ส้มจี๊ด) ChatGPT</h1>

<div class="container" style="max-width:650px;">
    <div class="card p-4">

        <form method="post" action="">
            
            <div class="mb-3">
                <label class="form-label">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" name="fullname" autofocus required>
            </div>

            <div class="mb-3">
                <label class="form-label">เบอร์โทร</label>
                <input type="text" class="form-control" name="phone" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ส่วนสูง (ซม.)</label>
                <input type="number" class="form-control" name="height" min="100" max="200" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ที่อยู่</label>
                <textarea class="form-control" name="address" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">วันเดือนปีเกิด</label>
                <input type="date" class="form-control" name="birthaday">
            </div>

            <div class="mb-3">
                <label class="form-label">สีที่ชอบ</label>
                <input type="color" class="form-control form-control-color" name="color">
            </div>

            <div class="mb-3">
                <label class="form-label">สาขาวิชา</label>
                <select class="form-select" name="major">
                    <option value="การบัญชี">การบัญชี</option>
                    <option value="การตลาด">การตลาด</option>
                    <option value="การจัดการ">การจัดการ</option>
                    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" name="Submit" class="btn btn-success">สมัครสมาชิก</button>
                <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                <button type="button" class="btn btn-primary" onclick="window.location='https://www.msu.ac.th/';">MSU</button>
                <button type="button" class="btn btn-warning" onMouseOver="alert('จ๊ะเอ๋!');">Hello</button>
                <button type="button" class="btn btn-dark" onclick="window.print();">พิมพ์</button>
            </div>

        </form>

    </div>
</div>

<hr class="my-4">

<div class="container" style="max-width:650px;">
<?php
if (isset($_POST['Submit'])){
    $fullname=$_POST['fullname'];
    $phone=$_POST['phone'];    
    $height=$_POST['height'];
    $address=$_POST['address'];    
    $birthaday=$_POST['birthaday'];
    $color=$_POST['color'];
    $major=$_POST['major'];
    
    echo "<div class='alert alert-info p-4'><h4>ผลลัพธ์ที่คุณกรอก</h4>";
    echo "<strong>ชื่อ-สกุล:</strong> ".$fullname."<br>";
    echo "<strong>เบอร์โทร:</strong> ".$phone."<br>";
    echo "<strong>ส่วนสูง:</strong> ".$height." ซม.<br>";
    echo "<strong>ที่อยู่:</strong> ".$address."<br>";
    echo "<strong>วันเดือนปีเกิด:</strong> ".$birthaday."<br>";
    echo "<strong>สีที่ชอบ:</strong> <div style='background-color:{$color};width:150px;height:30px;border-radius:5px;'></div><br>";
    echo "<strong>สาขาวิชา:</strong> ".$major."<br>";
    echo "</div>";
}
?>
</div>

</body>
</html>
