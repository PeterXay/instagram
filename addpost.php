<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 8/27/2015
 * Time: 11:41 AM
 */
require('db.php');

echo "<h1><b>Adding new Article or Post</b></h1><br>";

echo "<b>Article</b><br>";

echo "<form id='blogpost' action='' method='post' accept-charset='UTF-8'>";
echo "<select name='article'>";

$sql = "SELECT name FROM Article WHERE parent = '0'";
$result = mysqli_query($connect, $sql);

while($row = mysqli_fetch_row($result)) {

    $count += count($row[0]);
    echo "<option value='$row[0]'>$row[0]</option>";
}

echo "<option value='new'>New Article</option>";

echo "</select>";

echo "<br><br><br><b>New Post: </b><br>";

echo "<input type='text' name='article_post'><br/>";
echo "<br></br><input type='submit' name='Submit' value='Submit' />";
echo "</form>";

$sql5 = "SELECT id FROM Article";
$result5 = mysqli_query($connect, $sql5);

while($row5 = mysqli_fetch_row($result5)) {

    $countid += count($row5[0]);
}

$temp = $_POST['article'];
$temp2 = $_POST['article_post'];

if($_POST['Submit']) {
    $sql2 = "SELECT id FROM Article WHERE parent != '0'";
    $result2 = mysqli_query($connect, $sql2);
    while ($row2 = mysqli_fetch_row($result2)) {

        //echo "$row2[0]";
        $count2 += count($row2[0]);
    }

    $new_article = $count + 1;
    $new_post = $count2 + 1;
    $new_row = $countid + 1;

    if($temp == 'new'){
        $sql3 = "INSERT INTO Article (parent, name, date) VALUES ('0', 'Article $new_article', now())";
        $sql4 = "INSERT INTO Article (parent, name, message, date) VALUES ('$new_row', 'Post $new_post', '$temp2', now())";

        if (mysqli_query($connect, $sql3) && mysqli_query($connect, $sql4)) {
            echo "Your Article and Post has been created successfully";
            header( 'refresh:3;url=http://45.55.3.245/article.php');
        }

        else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }

    }

    else{
        $sql6 = "SELECT id FROM Article WHERE name = '$temp'";
        $result6 = mysqli_query($connect, $sql6);
        $row6 = mysqli_fetch_row($result6);

        $articleid = $row6[0];

        $sql7 = "INSERT INTO Article (parent, name, message, date) VALUES ('$articleid', 'Post $new_post', '$temp2', now())";
        $sql8 = "UPDATE Article SET date = now() WHERE id = '$articleid'";

        if (mysqli_query($connect, $sql7) && mysqli_query($connect, $sql8)) {
            echo "Your post been added successfully";
            header( 'refresh:3;url=http://45.55.3.245/article.php');
        }

        else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    }

}

?>