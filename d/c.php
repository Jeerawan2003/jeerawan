<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จีรวรรณ์ มาทอ (ส้มจี๊ด)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container py-5">
    <h1 class="mb-4 text-primary">ฟอร์มรับข้อมูล - จีรวรรณ์ มาทอ (ส้มจี๊ด) Gemini</h1>

    <form method="post" action="">
        
        <div class="mb-3">
            <label for="fullname" class="form-label">ชื่อ-นามสกุล <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="fullname" name="fullname" autofocus required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">เบอร์โทร <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="height" class="form-label">ส่วนสูง <span class="text-danger">*</span> (ซม.)</label>
            <input type="number" class="form-control" id="height" name="height" min="100" max="200" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">ที่อยู่</label>
            <textarea class="form-control" id="address" name="address" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label for="birthaday" class="form-label">วันเดือนปีเกิด</label>
            <input type="date" class="form-control" id="birthaday" name="birthaday">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">สีที่ชอบ</label>
            <input type="color" class="form-control form-control-color" id="color" name="color" value="#000000" title="เลือกสี">
        </div>

        <div class="mb-3">
            <label for="major" class="form-label">สาขาวิชา</label>
            <select class="form-select" id="major" name="major">
                <option value="การบัญชี">การบัญชี</option>
                <option value="การตลาด">การตลาด</option>
                <option value="การจัดการ">การจัดการ</option>
                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
            </select >  
        </div>
        
        <div class="mt-4 d-flex flex-wrap gap-2">
            <button type="submit" name="Submit" class="btn btn-primary">สมัครสมาชิก</button>
            <button type="reset" class="btn btn-secondary">ยกเลิก</button>
            <button type="button" class="btn btn-info text-white" onClick="window.location= 'https://www.msu.ac.th/';">msu</button>
            <button type="button" class="btn btn-warning" onMouseOver="alert('จ๊ะเอ๋!');">Hello</button>
            <button type="button" class="btn btn-success" onClick="window.print() ;">พิมพ์</button>
        </div>
    </form>

    <hr class="my-5">
    
    <?php
    if (isset($_POST['Submit'])){
        $fullname=$_POST['fullname'];
        $phone=$_POST['phone'];	
        $height=$_POST['height'];
        $address=$_POST['address'];	
        $birthaday=$_POST['birthaday'];
        $color=$_POST['color'];
        $major=$_POST['major'];
        
        // ใช้ .card สำหรับแสดงผลลัพธ์ให้ดูเป็นกลุ่ม
        echo '<div class="card shadow-sm">';
        echo '<div class="card-header bg-success text-white">✅ ข้อมูลที่ท่านได้กรอกเข้ามา</div>';
        echo '<div class="card-body">';
        echo "<p><strong>ชื่อ-สกุล:</strong> ".$fullname."</p>";
        echo "<p><strong>เบอร์โทร:</strong> ".$phone."</p>";
        echo "<p><strong>ส่วนสูง:</strong> ".$height." ซม.</p>";
        echo "<p><strong>ที่อยู่:</strong> ".$address."</p>";
        echo "<p><strong>วันเดือนปีเกิด:</strong> ".$birthaday."</p>";
        // แสดงสีที่ชอบในกรอบเล็กๆ
        echo "<p class='d-flex align-items-center'><strong>สีที่ชอบ:</strong> <span class='ms-2'>".$color."</span> <span class='d-inline-block ms-2 border border-secondary rounded' style='background-color:{$color};width:40px;height:20px;' title='{$color}'></span></p>";
        echo "<p><strong>สาขาวิชา:</strong> ".$major."</p>";
        echo '</div>'; // card-body
        echo '</div>'; // card
    }
    ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>