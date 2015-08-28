<?php
require('db.php');

?>

<html>
<head>

    <link rel="stylesheet" type="text/css" href="meltdown/css/meltdown.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="meltdown/js/jquery.meltdown.js"></script>

    <script src="meltdown/js/lib/element_resize_detection.js"></script>
    <script src="meltdown/js/lib/js-markdown-extra.js"></script>
    <script src="meltdown/js/lib/rangyinputs-jquery.min.js"></script>

</head>
<body>

<h1><b>Adding new Article or Post</b></h1><br>
<b>Article</b><br>
<form id='blogpost' action='' method='post' accept-charset='UTF-8'>
    <select name='article'">
        <?php
            $sql = "SELECT id, name FROM Article WHERE parent = '0'";
            $result = mysqli_query($connect, $sql);

            while($row = mysqli_fetch_assoc($result)) {

                $count += count($row[0]);
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
        ?>
        <option value='new'>New Article</option>
    </select>

    <br>

    <input type="text" name="article_name" placeholder="Enter article name" />

    <br><br><br><b>New Post: </b><br>

    <textarea name = 'article_post' cols='50' rows='20' class='meltdown'></textarea>
    <br></br><input type='submit' name='Submit' value='Submit' />
    <br></br><input type='submit' name='Preview' value='Preview' />
</form>


<?php

$sql5 = "SELECT id FROM Article";
$result5 = mysqli_query($connect, $sql5);

while($row5 = mysqli_fetch_row($result5)) {

    $countid += count($row5[0]);
}

$article_id = $_POST['article'];
$article_post = $_POST['article_post'];
$article_name = $_POST['article_name'];


if($_POST['Submit']) {

    if($article_id == 'new'){
        $sql3 = "INSERT INTO Article (parent, name, message, date) VALUES ('0', '$article_name', '$article_post', now())";
        mysqli_query($connect, $sql3);
        $parentid = mysqli_insert_id($connect);

        //$sql4 = "INSERT INTO Article (parent, name, message, date) VALUES ('$parentid', 'Post $new_post', '$article_post', now())";
        //mysqli_query($connect, $sql4);

        //$postid = mysqli_insert_id($connect);

        if ($parentid) {
            echo "Your Article and Post has been created successfully";
            //header( 'refresh:3;url=http://45.55.3.245/article.php');
        }

        else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }

    }

    else{
        $sql7 = "INSERT INTO Article (parent, name, message, date) VALUES ('$article_id', '$article_name', '$article_post', now())";
        $sql8 = "UPDATE Article SET date = now() WHERE id = '$article_id'";

        if (mysqli_query($connect, $sql7) && mysqli_query($connect, $sql8)) {
            echo "Your post been added successfully";
            //header( 'refresh:3;url=http://45.55.3.245/article.php');
        }

        else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    }
}

if($_POST['Preview'])
{
    echo "Test";
}


?>

<script>

    $(document).ready( function() {
        $('textarea').meltdown();
    });
</script>
</body>
</html>


