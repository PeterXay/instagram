<?php

require('db.php');
session_start();

$tempuser = $_SESSION['user'];

$fname = $_POST['fname'];
$lname = $_POST{'lname'};
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode'];

$cname = $_POST['cfname'];
$clname = $_POST['clname'];
$caddress = $_POST['caddress'];
$ccity = $_POST['ccity'];
$cstate = $_POST['cstate'];
$czip = $_POST['czipcode'];

if($_POST['submit'] && empty($fname) && empty($lname) && empty($address) && empty($city) && empty($state) && empty($zipcode)){
    echo "<font color='red'><b>You forgot to fill out all of the personal information and address field </b></font><br>";
}

$_SESSION['cname'] = $_POST['cfname'];

if(!empty($_POST['amex'])){
    $_SESSION['amex'] = $_POST['amex'];
}

echo "$cname--$clname--$caddress--$ccity--$cstate--$czip";


/*if($_POST['submit']) {
    $random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
    echo "Success Confirmation#: <b>$random_hash</b><br><br><br><br>";


    echo "<b>Purchase Summary</b>: <br>";
    $store = count($_SESSION['cart_items']);

    if(count($_SESSION['cart_items']) > 0) {
        $ids = "";

        foreach ($_SESSION['cart_items'] as $tempid => $value) {
            //get product
            $ids = $ids . $tempid . ",";
        }

        $ids = rtrim($ids, ',');


        $sql = "SELECT id, price,filename FROM Images WHERE id IN ($ids)";
        $result = mysqli_query($connect, $sql);

        while ($row = mysqli_fetch_row($result)) {

            $itemname = $row[2];
            $itemprice = $row[1];

            echo "<img src='uploads/$itemname' width='100' height='100' />";

            echo "&nbsp;&nbsp;&nbsp <b>$itemprice</b><br>";

            $total += $row[1];

        }
        echo "<br><b>Total: $total</b>";
    }

    echo "<form action='' method='post'>";
    echo "<input name='goback' type='submit' value=' Return to Main Page '></form>";;

}*/

if($_POST['goback']){
    unset($_SESSION['cart_items']);
    echo "<meta http-equiv='refresh' content='0;/' />";
}

else if($tempuser > 0 ) {

    echo "<div id='main'>";

    echo "<form action='' method='post'>";
    echo "<b>Personal Information:</b><br>";

    if(empty($fname) && $_POST['submit']){
        echo "<br><font color='red'><b> First Name: </b></font>";
        echo "<br><input id='name' name='fname' placeholder='First Name' type='text'>";
    }
    else {
        echo "<br><input id='name' name='fname' placeholder='First Name' type='text'>";
    }
    echo "&nbsp; <input id='middle' name='mname' placeholder='Middle Name' type='text'>";

    if(empty($lname) && $_POST['submit']) {
        echo "<font color='red'><b> Last Name: </b></font>";
        echo "&nbsp; <input id='lname' name='lname' placeholder='Last Name' type='text'>";
    }
    else {
        echo "&nbsp; <input id='lname' name='lname' placeholder='Last Name' type='text'>";
    }

    echo "<br><br><b>Enter your address:</b><br><br>";
    if(empty($address) && $_POST['submit']) {
        echo "<font color='red'><b> Address: </b></font>";
        echo "<input id='address' name='address' placeholder='Address' type='text'>";
    }
    else {
        echo "<input id='address' name='address' placeholder='Address' type='text'>";
    }

    if(empty($city) && $_POST['submit']) {
        echo "<font color='red'><b> City: </b></font>";
        echo "&nbsp; &nbsp;<input id='city' name='city' placeholder='City' type='text'><br>";
    }
    else{
        echo "&nbsp; &nbsp;<input id='city' name='city' placeholder='City' type='text'><br>";
    }
    echo "<input id='state' name='state' placeholder='State' type='text' maxlength='2' size='4'>";
    echo "&nbsp; <input id='zipcode' name='zipcode' placeholder='Zipcode' type='text' maxlength='5' size='7'><br>";

    echo "<br><b>Select your payment: </b><br><br>";

    echo "<form action='' method='post'>";

    echo "<input type='image' src='http://2.bp.blogspot.com/-Aj00BsuZeUI/VAU1EqgY-MI/AAAAAAAANt0/PrSGPrP_QHk/s1600/Amex.png' name='amex' value='amex' width='50' height='50'>";
    echo "<input type='image' src='http://www.flashhaiti.com/public/business_image/1372634777buh_mastercard-ad9.gif' name='master' value='master' width='50' height='50'>";
    echo "<input type='image' src='http://www.stlouiscountymn.gov/Portals/0/library/land-property/taxes/cc%20visa.jpg' name='visa' value='visa' width='50' height='50'>";
    echo "<input type='image' src='http://www.credit-card-logos.com/images/discover_credit-card-logos/discover_network2.jpg' name='discover' value='discover' width='50' height='50'><br><br>";
    //echo "<input type='image' src='http://linvio.com/wp-content/uploads/2014/04/paypal_logo.jpg' name='paypal' value='paypal' width='50' height='50'><br><br>";

    if($_POST['amex']) {
        echo "AMEX Card #: ";
        echo "<input id='ccard' name='amexcard' placeholder='####-######-#####' maxlength='18' type='text' size='18'>";
        echo "&nbsp; &nbsp; Security Code:";
        echo "<input id='scode' name='scode' placeholder='####' type='text' maxlength='4' size='4'><br>";
        echo "Exp Date: Month ";
        echo "<input id='expmonth' name='expmonth' placeholder='##' type='text' maxlength='2' size='3'>";
        echo "&nbsp; Year ";
        echo "&nbsp;<input id='expyear' name='expyear' placeholder='##' type='text' maxlength='4' size='3'><br>";
    }

    else if($_POST['master']){
        echo "Master Card #: ";
        echo "<input id='ccard' name='mcard' placeholder='####-####-####-####' type='text' size='19'>";
        echo "&nbsp; &nbsp; Security Code:";
        echo "<input id='scode' name='scode' placeholder='###' type='text' maxlength='3' size='3'><br>";
        echo "Exp Date: Month ";
        echo "<input id='expmonth' name='expmonth' placeholder='##' type='text' maxlength='2' size='3'>";
        echo "&nbsp; Year ";
        echo "&nbsp;<input id='expyear' name='expyear' placeholder='##' type='text' maxlength='4' size='3'><br>";
    }

    else if($_POST['visa']){
        echo "Visa Card #: ";
        echo "<input id='ccard' name='vcard' placeholder='####-####-####-####' type='text' size='19'>";
        echo "&nbsp; &nbsp; Security Code:";
        echo "<input id='scode' name='scode' placeholder='###' type='text' maxlength='3' size='3'><br>";
        echo "Exp Date: Month ";
        echo "<input id='expmonth' name='expmonth' placeholder='##' type='text' maxlength='2' size='3'>";
        echo "&nbsp; Year ";
        echo "&nbsp;<input id='expyear' name='expyear' placeholder='##' type='text' maxlength='4' size='3'><br>";
    }

    else if($_POST['discover']){
        echo "Discover Card #: ";
        echo "<input id='ccard' name='dcard' placeholder='####-####-####-####' type='text' size='19'>";
        echo "&nbsp; &nbsp; Security Code:";
        echo "<input id='scode' name='scode' placeholder='###' type='text' maxlength='3' size='3'><br>";
        echo "Exp Date: Month ";
        echo "<input id='expmonth' name='expmonth' placeholder='##' type='text' maxlength='2' size='3'>";
        echo "&nbsp; Year ";
        echo "&nbsp;<input id='expyear' name='expyear' placeholder='##' type='text' maxlength='4' size='3'><br>";
    }

    else if($_POST['paypal']) {
        echo "<input type='image' src='http://www.theoldlodgemalton.co.uk/images/paypal-button.png' name='ppaypal' value='amex'>";
    }

    if($_POST['amex'] || $_POST['master'] || $_POST['visa'] || $_POST['discover']) {
        echo "<br><b>Name on Card</b><br>";
        echo "<br><input id='cname' name='cfname' placeholder='First Name' type='text'>";
        echo "&nbsp; &nbsp;<input id='clname' name='clname' placeholder='Last Name' type='text'>";

        echo "<br><br><b>Address:</b><br>";
        echo "<br><input id='caddress' name='caddress' placeholder='Address' type='text'>";
        echo "&nbsp; &nbsp;<input id='ccity' name='ccity' placeholder='City' type='text'>";
        echo "<br><input id='cstate' name='cstate' placeholder='State' type='text' maxlength='2' size='4'>";
        echo "&nbsp; <input id='czipcode' name='czipcode' placeholder='Zipcode' type='text' maxlength='5' size='7'>";

    }
    echo "</div>";

    $total = $_GET['total'];
    echo "<br><b>Total: $total</b> <br><br>";

    echo "<input name='submit' type='submit' value=' Submit '></form>";
}
?>