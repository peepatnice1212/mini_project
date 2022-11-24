<?php

session_start();
if(empty($_SESSION["username"])){
    header("location:../beforehome.html");
}

if(!empty($_GET["action"])){
    if ($_GET["action"]=="add") {

        $name = $_GET['ชื่อ_CD_DVD'];

        $cart_item = array(
            'id' => $_GET['รหัส_CD_DVD'],
            'name' => $_GET['ชื่อ_CD_DVD'],
            'price' => $_GET['ราคา_CD_DVD'],
            'qty' => $_GET['qty']
        );

        if(empty($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
            
        if(array_key_exists($name, $_SESSION['cart']))
            $_SESSION['cart'][$name]['qty'] += $_GET['qty'];
    
        else
            $_SESSION['cart'][$name] = $cart_item;

            header("location: ../cart.php");
    } else if ($_GET["action"]=="update") {
        if(isset($_GET["ชื่อ_CD_DVD"]) && isset($_GET["qty"])){
            $name = $_GET["ชื่อ_CD_DVD"];     
                    $qty = $_GET["qty"];
                    $_SESSION['cart'][$name]['qty'] = $qty;        
        }
        $sum = 0;
        $total = 0;
        foreach ($_SESSION["cart"] as $item) {
            $sum += $item["price"] * $item["qty"];
            $total += $item["qty"];
        }
        echo $sum."-".$total;  
    } else if ($_GET["action"]=="delete") {
        
        $name= $_GET['ชื่อ_CD_DVD'];
        unset($_SESSION['cart'][$name]);
        header("location: ../cart.php");
    }
 
}
?>