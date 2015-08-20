<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 8/10/2015
 * Time: 7:23 AM
 */

session_start();
require('db.php');

$temp = $_SESSION['user'];

if($temp > 0) {
    echo "<div class='right'>";
    echo "<a href='/' style='text-decoration:none;'><b>Home</b> &nbsp;&nbsp;</a>";
    echo "<a href='logout.php' style='text-decoration:none;'>Log Out</a>";
    echo "</div>";
}

    $store = count($_SESSION['cart_items']);

    if(count($_SESSION['cart_items']) > 0) {
    $ids = "";

    foreach ($_SESSION['cart_items'] as $tempid => $value) {
        //get product
        $ids = $ids . $tempid . ",";
    }

    $ids = rtrim($ids, ',');


    $sql = "SELECT id, price,filename, message FROM Images WHERE id IN ($ids)";
    $result = mysqli_query($connect,$sql);

    while($row = mysqli_fetch_row($result)) {

        $itemname = $row[2];
        $itemprice = $row[1];
        $itemmessage = $row[3];

        echo "<img src='uploads/$itemname' width='100' height='100' />";

        echo "&nbsp;&nbsp;&nbsp; $itemmessage <b>$itemprice</b><br>";

        $total += $row[1];

    }
        echo "<br><b>Total: $total</b>";
        global $total;

        echo "<DIV STYLE = ''>";
        echo "<a target='' href='/checkout.php?total=$total'><img src='http://www.mychocolateoffice.com/images/button_checkout.jpg' align='left'></a>";
        echo "</div>";
}
?>