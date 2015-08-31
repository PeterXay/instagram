<?php
session_start();
require('db.php');

?>

<html>
<head>

    <style type='text/css'>

        #years, #months, #posts{
            cursor:pointer;
        }

        .archive_article {
            font-size: large;
            font-weight: bold;
            cursor: pointer;
        }
        .archive_posts {
            margin-left: -1em;
            margin-top: 0;
            list-style: square url('http://www.webbossuk.com/admin/images/reply-arrow.png');
            font-weight: normal;
            cursor: pointer;
        }

        h.pos_left {
            position: absolute;
            left: 350px;
            top: 3px;
        }
    </style>


<body>

<div style='text-align:right'>
    <a href='http://45.55.3.245/addpost.php' STYLE='text-decoration: none'><b> Add new Article or Post</b></a>
</div>

<table style='width:20%'>
<ul class='archive_article'>


<?php
$sql = "SELECT id, name, message, date FROM Article WHERE parent = '0' ORDER BY date DESC";

$result = mysqli_query($connect, $sql);

while ($row = mysqli_fetch_row($result)) {
    $id = $row[0];
    $name = $row[1];
    $message = $row[2];

    echo "<tr><td valign='center'><li class='article'><a href='/test.php?id=$id'><b>$name</b></a>";
    echo "<ul class='archive_posts'>";

    $sql2 = "SELECT id, name, message, date, parent FROM Article WHERE parent = '$id' ORDER BY date ASC";
    $result2 = mysqli_query($connect, $sql2);

    while ($row2 = mysqli_fetch_row($result2)) {
        $parentid = $row2[5];
        $post = $row2[1];

        echo "<form action='' method='post'>";
        if($post == $_GET['post']){
            echo "<li class='post'><a href='/test.php?id=$id#$row2[0]' STYLE='text-decoration: none'><b><h3>$post *</h3></b></a></li>";
        }
        else {
            echo "<li class='post'><a href='/test.php?id=$id#$row2[0]' STYLE='text-decoration: none'>$post</a></li>";
        }
        echo "</form>";
    }
    echo "</td>";
    echo "</ul></li>";
}

echo "</ul>";

echo "</table>";

$id = $_GET['id'];

//If nothing is selected display the most recent post
if(!empty($id)){

    echo "<h class='pos_left'>";

    $sql = "SELECT parent,name, message, id FROM Article WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_row($result);;

    $parent = ( !empty($row[0]) )? $row[0] : $id;
    $main_id = $row[3];
    $name = $row[1];
    $message = $row[2];

    $sql2 = "SELECT name, message, id FROM Article WHERE parent = '$id'";
    $result2 = mysqli_query($connect, $sql2);

    echo "<div style='padding:10px; margin-bottom:5px;' id ='$main_id'>";

    echo "<h1>$name</h1>";
    echo "$message";
    echo "</div>";

    while($row2 = mysqli_fetch_row($result2)) {

        $c_id = $row2[2];

        echo "<div style='padding:10px; margin-bottom:5px;' id='$c_id'>";
        echo "<h2>$row2[0]</h2> $row2[1]";
        echo "</div>";
    }

    echo "</h>";
}

//Else display the selected article or post
else {
    echo "<h class='pos_left'>";

    $sql3 = "SELECT id, parent, name FROM Article WHERE parent = '0' ORDER BY date DESC";
    $result3 = mysqli_query($connect, $sql3);

    $row3 = mysqli_fetch_row($result3);
    $main_id = $row3[0];
    $parent_id = $row3[1];
    $article_name = $row3[2];

    echo "<h1>$name</h1>";

    $sql4 = "SELECT id, parent, name, message FROM Article WHERE parent = '$main_id' ORDER BY date DESC";
    $result4 = mysqli_query($connect, $sql4);

    $row4 = mysqli_fetch_row($result4);

    echo "<h3>$row4[2]</h3>$row4[3]";

    echo "</h>";
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

    var container = $('div'),
        scrollTo = $('$c_id');


     $('.archive_article ul').hide();

     $('.article').click(function() {
     $(this).find('ul').slideToggle();
     });

</script>

</body>

</head>
</html>