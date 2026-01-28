    <?php
      $host ="localhost";
        $user ="root";
        $pwd ="";
        $db ="4136db";
        $conn = mysqli_connect ($host,$user,$pwd,$db)or die ("เชื่อมต่อฐานข้อมูลไม่ได้");
        mysqli_query($conn,"set NAMES utf8");
    ?>

