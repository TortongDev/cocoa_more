<?php
session_start();
if ($_SESSION["Status_Insert"]=="บันทึกสำเร็จ!"){
    echo "<script>alert('บันทึกสำเร็จ!')</script>"; 
    // session_unset($_SESSION["Status_Insert"]);
    session_destroy();

}
include('./Processphp/config.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="saveinfo2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocoamore</title>
</head>
<body>
    
    <div class="main">
    <div class="box1">
            <div class="table_component" role="region" tabindex="0">
            <table>
                <tbody>
                <form action="Processphp/list_order_info.php" method='POST'>
                    <tr>
                        <td><input class="date1" type="date" name="date2" value='<?php echo $_SESSION['DATE1']; ?>'></td>
                        <td>สถานะ
                            <?php if(@$_SESSION['RADIO'] == 'ทานที่ร้าน'){ ?>
                                <input class="status" type="radio" checked name="radiostatus" value="ทานที่ร้าน"> ทานที่ร้าน
                                <input class="status" type="radio" name="radiostatus" value="กลับบ้าน"> กลับบ้าน</td>
                            <?php }else{ ?>
                            <input class="status" type="radio" name="radiostatus" value="ทานที่ร้าน"> ทานที่ร้าน
                            <input class="status" type="radio" checked name="radiostatus" value="กลับบ้าน"> กลับบ้าน</td>
                            <?php } ?>
                    </tr>
                    <tr>
                        <td>เลขโต๊ะ
                            <select name="tablenum" id="">
                                <?php if(!empty($_SESSION['TABLENUMBER'])){ ?>
                                    <option value="<?=$_SESSION['TABLENUMBER'];?>"><?=$_SESSION['TABLENUMBER'];?></option>
                                <?php }else{ ?>
                                <option value="1">1</option><option value="2">2</option>
                                <option value="3">3</option><option value="4">4</option>
                                <option value="5">5</option><option value="6">6</option>
                                <option value="7">7</option><option value="8">8</option>
                                <?php } ?>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>เมนู
                            <select name="menu" id="">
                            <?php
                                $query = $conn->query("SELECT `id`, `food_name`, `price` FROM `me_nu` WHERE 1");
                                 while($row = $query->fetch()){
                            ?>
                            <option value="<?php echo $row['food_name']; ?>"> 
                                <?php echo $row['food_name']; ?> 
                            </option>

                            <!-- <input type="hidden" value="<?php echo $row['price'];?>" name="price" /> -->

                            <?php } ?>
                            </select>จำนวน
                            <select name="qaunt" id="">
                                <option value="1">1</option><option value="2">2</option>
                                <option value="3">3</option><option value="4">4</option>
                                <option value="5">5</option><option value="6">6</option>
                                <option value="7">7</option><option value="8">8</option>
                            </select></td>
                        <td><input class="submit" type="submit" value="เพิ่มเมนู"></td>
                    </tr>
                    </form>
                    <form action="./Processphp/save_order.php" method="post">
                        <tr>
                            <input class="" type="hidden" name="date2" value='<?php echo $_SESSION['DATE1']; ?>'>
                            <input class="" type="hidden" name="radio2" value='<?php echo $_SESSION['RADIO']; ?>'>
                            <input class="" type="hidden" name="tablenumber2" value='<?php echo $_SESSION['TABLENUMBER']; ?>'>
                        
                            <td><input class="submit" type="reset" value="ยกเลิก"></td>
                            <td><input class="submit" type="submit" value="บันทึก"></td>
                        </tr>
                    </form>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th style="width: 100px;">#</th>
                        <th>เมนู</th>
                        <th>จำนวน</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $number = 1;
                $cart = @$_SESSION['CART']; 
                if($cart == null){
                   exit;
                }else{

                }
                foreach ($cart as $key => $value) {
                    $menu = $value["menu"];
                    $qaun = $value["qaunt"];
                ?>
                    <tr>
                        <td><?=$number++?></td>
                        <td><?=$menu?></td>
                        <td><?=$qaun?> หน่วย</td>
                    </tr>
                    
                <?php } ?>
                </tbody>
            </table>

         
    </div>
    </div>

</body>
</html> 