<?php
session_start();
if ($_SESSION["usernamelogin"]=="เจ้าของร้าน"){
    header( "Location: ../owner.php" );
}elseif($_SESSION["usernamelogin"]=="พนักงาน"){
    
}
else{header( "Location: ./index.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="employee.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocoamore</title>
</head>
<body>

    <form class="container">

    <a href="./7saveinfo2.php"><input class="btn-submit" value="รับคำสั่งซื้อ"></a>
    <input class="btn-submit" type="submit" value="พิมพ์ใบเสร็จรับเงิน">
    <a href="Checkmenu.html"><input class="btn-submit" value="เช็คยอดเมนู"></a>
    <a href="Processphp/logout.php"><input class="btn-submit"  value="Logout"></a>
    </form>
    <img src="./Picture/status_owner.png" class="status-owner">
</body>
</html>