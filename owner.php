<?php
session_start();
if ($_SESSION["usernamelogin"]=="เจ้าของร้าน"){

}elseif($_SESSION["usernamelogin"]=="พนักงาน"){
    header( "Location: ./employee.html" );
}
else{header( "Location: ./index.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="owner.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocoamore</title>
</head>
<body>

    <form class="container">

    <a href="./monthly_sum.html"><input class="btn-submit"  value="สรุปยอดขายข้อมูล"></a>
    <a href="./monthly_sumeditable.html"><input class="btn-submit"  value="แก้ไขข้อมูล"></a>
    <a href="Processphp/logout.php"><input class="btn-submit"  value="Logout"></a>
    </form>
    <img src="./Picture/status_owner.png" class="status-owner">
    
</body>
</html>