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

        h5.pos_right {
            position: relative;
            left: 20px;
        }

    </style>


<body>

<?php
session_start();
require('db.php');

$sql = "SELECT id, name, message, date FROM Article WHERE parent = '0' ORDER BY date DESC";

$result = mysqli_query($connect, $sql);

echo "<table style='width:20%'>";

echo "<ul class='archive_article'>";

while ($row = mysqli_fetch_row($result)) {
    $id = $row[0];
    $name = $row[1];
    $message = $row[2];

    echo "<tr><td valign='center'><li class='article'><b>$name</b>";
    echo "<ul class='archive_posts'>";

    $sql2 = "SELECT id, name, message, date, parent FROM Article WHERE parent = '$id' ORDER BY date DESC";
    $result2 = mysqli_query($connect, $sql2);

    while ($row2 = mysqli_fetch_row($result2)) {
        $parentid = $row2[5];
        $post = $row2[1];
        $post2[] = $row2[1];
        $postmessage[] = $row2[2];

        echo "<form action='' method='post'>";
        if($post == $_GET['post']){
            echo "<li class='post'><a href='http://45.55.3.245/article.php?post=$post' STYLE='text-decoration: none'><b><h3>$post *</h3></b></a></li>";
        }
        else {
            echo "<li class='post'><a href='http://45.55.3.245/article.php?post=$post' STYLE='text-decoration: none'>$post</a></li>";
        }
        echo "</form>";
    }
    echo "</td>";
    echo "</ul></li>";
}

echo "</ul>";

echo "</table>";

$temp = $_GET['post'];

if(!empty($temp)){

    echo "<h class='pos_left'>";

    $sql = "SELECT parent,name, message FROM Article WHERE name = '$temp'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_row($result);;

    $parent = $row[0];
    $name = $row[1];
    $message = $row[2];

    $sql2 = "SELECT name FROM Article WHERE id = '$parent'";
    $result2 = mysqli_query($connect, $sql2);

    $row2 = mysqli_fetch_row($result2);

    echo "<h1>$row2[0]</h1>";
    echo "<h3>$name</h3>$message";

    echo "</h>";


}
else {
    $temp = count($post2);

    echo "<h class='pos_left'>";

    $sql3 = "SELECT id, parent, name FROM Article WHERE parent = '0' ORDER BY date DESC";
    $result3 = mysqli_query($connect, $sql3);

    $row3 = mysqli_fetch_row($result3);
    $m_id = $row3[0];
    $p_id = $row3[1];
    $name = $row3[2];

    echo "<h1>$name</h1>";

    $temp = $_GET['post'];
    $_SESSION['post'] = $temp;
    $selected = $_SESSION['post'];

    $sql4 = "SELECT id, parent, name, message FROM Article WHERE parent = '$m_id' ORDER BY date DESC";
    $result4 = mysqli_query($connect, $sql4);

    $row4 = mysqli_fetch_row($result4);

    echo "<h3>$row4[2]</h3>$row4[3]";

    echo "</h>";
}

echo "<div style='text-align:right'>";
echo "<a href='http://45.55.3.245/addpost.php' STYLE='text-decoration: none'><b> Add new Article or Post</b></a>";
echo "</div>";

?>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

    $('.archive_article ul').hide();

    $('.article').click(function() {
        $(this).find('ul').slideToggle();
    });

</script>

</head>
</html>